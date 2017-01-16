<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

define('CODESTATUS_CLOSE', '0');

include ('YinXiangMaLib.php');

class plugin_yinxiangma {

	var $codestatus = array();

	function plugin_yinxiangma() {
		global $_G;
		$this->reply = $_G['cache']['plugin']['yinxiangma']['reply'];
		$this->open = $_G['cache']['plugin']['yinxiangma']['status'];
		$groups = (array)unserialize($_G['cache']['plugin']['yinxiangma']['groups']);
		$this->ingroup = in_array($_G['groupid'], $groups) ? TRUE : FALSE;
		$this->codestatus = (array)unserialize($_G['cache']['plugin']['yinxiangma']['codestatus']);
		$this->codestatus = ($_G['setting']['bbclosed'] || in_array(CODESTATUS_CLOSE, $this->codestatus) || !$this->ingroup) ? array() : $this->codestatus;
	}

	function _code_output() {
		global $_G;

		$output = '';
		if($this->open && in_array(CURMODULE, $this->codestatus)) {
			$lang_obtain = '&#39564;&#35777;&#30721;';
			if(CURMODULE == 'post') {
				$output = <<<EOF
<div class="mtm">
<span class="rq">*</span>
<span id="seccodexyz_p">$lang_obtain:</span>
<span id="checkseccodeverify_xyz_p"><img src="static/image/common/none.gif" width="16" height="16" class="vm"></span>
EOF;
				$output .= YinXiangMa_GetYinXiangMaWidget();
				$output .= <<<EOF
</div>
EOF;
			} else {
				$output = <<<EOF
<div class="rfm"><table><tbody>
<tr><th><span class="rq">*</span></th><td>
<span id="seccodexyz_p">$lang_obtain:</span>
<span id="checkseccodeverify_xyz_p"><img src="static/image/common/none.gif" width="16" height="16" class="vm"></span>
EOF;

			$output .= YinXiangMa_GetYinXiangMaWidget();
			$output .= <<<EOF
</td></tr>
</tbody></table>

</div>
EOF;
			}
			$output .= <<<EOF
<script type="text/javascript">
	function YXM_valided_true()
	{
		document.getElementById('checkseccodeverify_xyz_p').innerHTML = '<img src="'+ IMGDIR + '/check_right.gif" width="16" height="16" class="vm" />';
	}
	function YXM_valided_false()
	{
		document.getElementById('checkseccodeverify_xyz_p').innerHTML = '<img src="'+ IMGDIR + '/check_error.gif" width="16" height="16" class="vm" />';
	}
</script>
EOF;
		}
		return $output;
	}

}

	
class plugin_yinxiangma_member extends plugin_yinxiangma {

	function register_code() {
		global $_G;
		if(in_array(CURMODULE, $this->codestatus) && submitcheck('regsubmit', 0, $seccodecheck, $secqaacheck)) {
				$YinXiangMa_response = ValidResult($_G['gp_YinXiangMa_challenge'], $_G['gp_YXM_level'][0],$_G['gp_YXM_input_result']);
				if($YinXiangMa_response != "true") { 
				showmessage('submit_seccode_invalid');
			}
		}
	}
	
	function logging_code() {
		global $_G;
		if(in_array(CURMODULE, $this->codestatus) && submitcheck('loginsubmit', 1, $seccodestatus) && $this->open) {
			if(!empty($_G['gp_lssubmit'])) {
				if(!empty($_G['gp_auth'])) {
					list($_G['gp_username'], $_G['gp_password']) = daddslashes(explode("\t", authcode($_G['gp_auth'], 'DECODE')));
				}

				if(!($_G['member_loginperm'] = logincheck($_G['gp_username']))) {
					showmessage('login_strike');
				}
				if($_G['gp_fastloginfield']) {
					$_G['gp_loginfield'] = $_G['gp_fastloginfield'];
				}
				$_G['uid'] = $_G['member']['uid'] = 0;
				$_G['username'] = $_G['member']['username'] = $_G['member']['password'] = '';
				if(!$_G['gp_password'] || $_G['gp_password'] != addslashes($_G['gp_password'])) {
					showmessage('profile_passwd_illegal');
				}
				$result = userlogin($_G['gp_username'], $_G['gp_password'], $_G['gp_questionid'], $_G['gp_answer'], $_G['setting']['autoidselect'] ? 'auto' : $_G['gp_loginfield']);
				$this->_logging_more($result['ucresult']['uid'] == -3);
			}
			$YinXiangMa_response =ValidResult($_G['gp_YinXiangMa_challenge'], $_G['gp_YXM_level'][0],$_G['gp_YXM_input_result']);
			if($YinXiangMa_response != "true") { 
				showmessage('submit_seccode_invalid');
			}
		
		}
	}

	function _logging_more($questionexist) {
		global $_G;
		if(empty($_G['gp_lssubmit'])) {
			return;
		}
		$auth = authcode($_G['gp_username']."\t".$_G['gp_password']."\t".($questionexist ? 1 : 0), 'ENCODE');
		$js = '<script type="text/javascript">showWindow(\'login\', \'member.php?mod=logging&action=login&auth='.rawurlencode($auth).'&referer='.rawurlencode(dreferer()).(!empty($_G['gp_cookietime']) ? '&cookietime=1' : '').'\')</script>';
		showmessage('location_login', '', array('type' => 1), array('extrajs' => $js));
	}

	function register_input() {
		if($this->open && in_array(CURMODULE, $this->codestatus)) {
				$output = $this->_code_output();
			return $output;
		}
	}

	function logging_input() {
		if($this->open && in_array(CURMODULE, $this->codestatus)) {
			if(strstr($_SERVER['REQUEST_URI'], 'messagelogin') || strstr($_SERVER['REQUEST_URI'], 'guestmessage')) {
				showmessage('&#24744;&#27809;&#26377;&#26435;&#38480;&#36827;&#34892;&#27492;&#25805;&#20316'.','.'&#28857;&#20987<a href="member.php?mod=logging&action=login">&#30331;&#24405</a>');
			} else {
				$output = $this->_code_output();
			}
			return $output;
		}
	}
}

class plugin_yinxiangma_forum extends plugin_yinxiangma {
	
	function forumdisplay_fastpost_btn_extra () {
		if (CURMODULE == 'forumdisplay') {
			$ispost = 'post';
		}
		$sechash = 'S'.($_G['inajax'] ? 'A' : '').$_G['sid'];
		if(in_array($ispost, $this->codestatus)) {
		$lang_obtain = '&#39564;&#35777;&#30721;';
		$output = <<<EOF
<div class="mtm">
<span class="rq">*</span>
<span id="seccodexyz_p">$lang_obtain:</span>
<span id="checkseccodeverify_xyz_p"><img src="static/image/common/none.gif" width="16" height="16" class="vm"></span>
EOF;
		$output .= YinXiangMa_GetYinXiangMaWidget();
		$output .= <<<EOF
</div>
<script type="text/javascript">
	function YXM_valided_true()
	{
		document.getElementById('checkseccodeverify_xyz_p').innerHTML = '<img src="'+ IMGDIR + '/check_right.gif" width="16" height="16" class="vm" />';
	}
	function YXM_valided_false()
	{
		document.getElementById('checkseccodeverify_xyz_p').innerHTML = '<img src="'+ IMGDIR + '/check_error.gif" width="16" height="16" class="vm" />';
	}

</script>
EOF;
		}
		return $output;
	}

	function viewthread_fastpost_btn_extra () {
		if (CURMODULE == 'viewthread') {
			$ispost = 'post';
		}
		if(in_array($ispost, $this->codestatus)) {
		$lang_obtain = '&#39564;&#35777;&#30721;';
		$output = <<<EOF
<div class="mtm">
<span class="rq">*</span>
<span id="seccodexyz_p">$lang_obtain:</span>
<span id="checkseccodeverify_xyz_p"><img src="static/image/common/none.gif" width="16" height="16" class="vm"></span>
EOF;
		$output .= YinXiangMa_GetYinXiangMaWidget();
		$output .= <<<EOF
</div>
<script type="text/javascript">
	function YXM_valided_true()
	{
		document.getElementById('checkseccodeverify_xyz_p').innerHTML = '<img src="'+ IMGDIR + '/check_right.gif" width="16" height="16" class="vm" />';
	}
	function YXM_valided_false()
	{
		document.getElementById('checkseccodeverify_xyz_p').innerHTML = '<img src="'+ IMGDIR + '/check_error.gif" width="16" height="16" class="vm" />';
	}

</script>
EOF;
		}
		return $output;
	}

	function post_rccode() {
		global $_G;
		if($this->open && in_array(CURMODULE, $this->codestatus) || $this->reply) {
			if((submitcheck('topicsubmit', 0, $seccodecheck, $secqaacheck) && in_array(CURMODULE, $this->codestatus)) || (submitcheck('replysubmit', 0, $seccodecheck, $secqaacheck) && in_array(CURMODULE, $this->codestatus))) {
				$YinXiangMa_response = ValidResult($_G['gp_YinXiangMa_challenge'], $_G['gp_YXM_level'][0],$_G['gp_YXM_input_result']);
				if($YinXiangMa_response != "true") { 
					showmessage('submit_seccode_invalid');
				}
			}
		}
	}

	function post_middle() {
		global $_G;
		if($this->open && in_array(CURMODULE, $this->codestatus)) {
				$output = $this->_code_output();
			return $output;
		}
	}
}
?>