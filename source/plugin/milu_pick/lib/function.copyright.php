<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
define('V_D', 20130216);

define('VIP', strexists(strtolower(PICK_VERSION), 'vip') ? TRUE : FALSE);
define('GET_URL', 'http://www.56php.com/');
$check_arr = array('picker_manage', 'fast_pick', 'system_rules', 'picker_create');
if(in_array($_GET['pmod'], $check_arr) && $_GET['pmod'] && $_GET['identifier'] == 'milu_pick') ck();

function CK($t=0) {
	global $_G;
	if(!function_exists('fsockopen') && !function_exists('pfsockopen') && !function_exists('file_get_contents')){
		cpmsg_error(milu_lang('close_func'));
	}
	require_once libfile('function/misc');
	if(strtoupper(convertip($_G['clientip'])) == '- LAN') return false;
	if(!VIP) return FALSE;//不是vip检测
	$host_info = get_client_info();
	$domain = $host_info['domain'];
	if(!$domain) return FALSE;
	$info['domain'] = $domain;
	$info['dateline'] = $_G['timestamp'];
	$site = urlencode($_G['siteurl']);
	$url = GET_URL.'plugin.php?id=pick_user:pick_user&myac=auth&domain='.urlencode($domain).'&siteurl='.$site.'&dxc_version='.PICK_VERSION.'&discuz_version='.DISCUZ_VERSION.'&discuz_release='.DISCUZ_RELEASE.'&dxc_release='.V_D.'sitename='.urlencode($_G['setting']['bbname']);
	$file_name =  PICK_DIR.'/data/pick_auth.txt';  
	if(!file_exists($file_name)){//如果不存在验证文件
		$se_msg = getcookie('pick_auth');
		if(!$se_msg){
			$msg = get_contents($url, array('cache' => -1));
			if($msg < 0) return;
		}else{
			$msg = $se_msg;
		}
		if(!$msg)  cpmsg_error(milu_lang('no_conn_server'));
		if(!$se_msg) dsetcookie('pick_auth', $msg, 3600*2);
		if($msg == 'succeed'){
			$info['status'] = 1;
			$fp = fopen($file_name, "w");
			fwrite($fp,authcode(serialize($info),'d', 'milu_pick'));
			fclose($fp);
		}else if($msg == 'timeout'){
			show_c(1);
			cpmsg_error(milu_lang('no_free'));
		}else if($msg == 'free'){//如果是免费版本
					
		}else if($msg == 'error'){
			cpmsg_error(milu_lang('unknow_err'));
		}
	}else{
		$fp = fopen($file_name, 'r');
		$data = fread($fp,filesize($file_name));
		$arr = dunserialize(authcode($data, 'DECODE', 'milu_pick'));
		fclose($fp);
		if($arr['domain'] != $domain){
			//cpmsg_error('抱歉，此采集器已被使用.请购买商业授权!');
			@unlink($file_name);
		}else if(($info['dateline'] - $arr['dateline']) > 3600*24*15){
			@unlink($file_name);
		}
	}
		
}

function show_c($t=0,$arg = array()){
	global $_G;
	echo "<script>var disallowfloat = 'newthread';showWindow('article_detail', 'admin.php?".PICK_GO."picker_manage&show_window=1');</script>";
	if($_G['gp_show_window']){
		$arg = $arg ? $arg : array('w' => 380,'h' => '270','f' => 1,'y' => 1);
		show_pick_window(milu_lang('time_out_notice'), '<style>.notice p{ line-height:25px;}</style><div class="notice"><p>1.'.milu_lang('t_o_n_1').'</p><p>2.'.milu_lang('bug_notice').':<a target="_blank" href="http://item.taobao.com/item.htm?id=12717326387">http://item.taobao.com/item.htm?id=12717326387</a></p><p>3.'.milu_lang('ask_url').':<a target="_blank" href="http://www.56php.com/forum-79-1.html">http://www.56php.com/forum-79-1.html</a></p></div>', $arg);
	}
	if($t == 1) dexit();
}


function get_client_info(){
	global $_G;
	require_once libfile('function/misc');
	if(strtoupper(convertip($_G['clientip'])) == '- LAN') return FALSE;
	$re['siteurl'] = $_G['siteurl'];
	$re['domain'] = get_domain($re['siteurl']);
	if(!$re['domain']) return FALSE;
	$re['sitename'] = $_G['setting']['bbname'];
	$re['siteurl'] = $_G['siteurl'];
	$re['dxc_version'] = PICK_VERSION;
	$re['dxc_release'] = V_D;
	$re['discuz_version'] = DISCUZ_VERSION;
	$re['discuz_release'] = DISCUZ_RELEASE;
	return $re;
}

function GetHostInfo($gurl){
    $gurl = preg_replace("/^http:\/\//i", "", trim($gurl));
    $garr['host'] = preg_replace("/\/(.*)$/i", "", $gurl);
    $garr['query'] = "/".preg_replace("/^([^\/]*)\//i", "", $gurl);
    return $garr;
}

function get_domain($url){
	if(empty($url)) return;
	$d = RootDomain::instace();
	$d->setUrl($url);
	return $d->getDomain();
}




//输出头部
function pick_header_output($header_arr, $head_url = '', $args = array()){
	global $header_config,$head_url;
	$myac = $_GET['myac'];
	if(!$myac) $myac = $header_arr[0];
	$str = '<div class="itemtitle"><ul class="tab1" style="margin-top:8px;">';
	foreach($header_arr as $k => $v){	
		$current = $v == $myac || $args['current'] == $v ? 'class="current"' : ''; 
		$str .= '<li '.$current.'><a href="'.$head_url.$v.'"><span>'.milu_lang($v).'</span></a></li>';
	}
	$str .='</ul></div>';
	return $str;
}


function get_user_pick_info(){
	$c_info = get_client_info();
	$url = GET_URL.'plugin.php?id=pick_user:pick_user&myac=auth&detail=1&domain='.urlencode($c_info['domain']).'&siteurl='.urlencode($c_info['siteurl']).'&dxc_version='.PICK_VERSION.'&discuz_version='.DISCUZ_VERSION.'&discuz_release='.DISCUZ_RELEASE.'&dxc_release='.V_D.'&sitename='.urlencode($c_info['sitename']);
	return get_contents($url, array('cache' => -1));
}


function get_user_level(){
	global $_G;
	$status = 0;
	$name = milu_lang('free_user');
	$file_name =  PICK_DIR.'/data/pick_auth.txt'; 
	$msg_arr = array(); 
	$vip_show = '<img  border="0" src="'.PICK_URL.'/static/image/vip.gif" /> '.milu_lang('vip_user').' ';
	
	$msg_arr = get_user_pick_info();
	if($msg_arr < 0){
		$status = -1;
		$name = milu_lang('no_query_info');
	}

	$msg_arr = unserialize($msg_arr);
	extract($msg_arr);
	$show_use_time = $exp_dateline ? " ".milu_lang('no_user_dateline').":<font style='color:#09C'>".dgmdate($exp_dateline).'</font>' : '';
	if($msg == 'succeed'){
		dsetcookie('pick_auth', $msg, -1);
		$show_use_time = $show_use_time ? $show_use_time : milu_lang('forever_use');
		$name = $vip_show.$show_use_time;
		$status = 1;
	}else if($msg == 'timeout'){
		@unlink($file_name);
		$name = milu_lang('no_free_use');
		$status = -2;
	}else if($msg == 'free' || $msg == 'first'){//如果是免费版本
		if(VIP){
			$status = 2;
			$name = milu_lang('free_use').' '.$show_use_time;
		}		
	}else{
		$status = -3;
		$name = milu_lang('user_no_query');
	}
	
	if($status < 0){
		$show_upgrade = '';//服务器网络限制，无法检测升级
	}else{
		$show_upgrade = VIP  ? '<a href="?'.PICK_GO.'pick_info&ac=pick_check">'.milu_lang('check_new').'</a>' : '<a href="?'.PICK_GO.'pick_info&ac=pick_check">'.milu_lang('up_to_vip').'</a>';
	}
	$re['show_user_name'] = $name;
	$re['show_upgrade'] = $show_upgrade;
	$re['status'] = $status;
	return $re;
}

function version_check(){
	global $_G;
	$check = $_G['cache']['plugin']['milu_pick']['check_version'];
	if(!VIP || $check != 1) return FALSE;
	$get_site = GET_URL;
	$client_info = get_client_info();
	if(!$client_info || !$client_info['domain']) return;
	$tips_arr = dunserialize(pick_common_get(0, 'pick_tips'));
	if($tips_arr['check_version']) return;
	if(load_cache('check_version')) return;
	$url = GET_URL.'plugin.php?id=pick_user:upgrade&myac=check_version&tpl=no&dxc_version='.$client_info['dxc_version'].'&dxc_release='.$client_info['dxc_release'];
	$result = get_contents($url, array('cache' => -1));
	cache_data('check_version', 'ok', 5*3600);
	if($result == 'ok'){
		return show_tips('<div class="tipsblock"><li>'.milu_lang('have_new_version', array('url' => '?'.PICK_GO.'pick_info&ac=pick_check&checking=1')).'</li></ul></div>', array('key' => 'check_version', 'w' => 380, 'h' => 250));
	}
}


function pick_check(){
	if(!$_GET['checking'])  cpmsg(milu_lang('upgrade_checking'), PICK_GO.'pick_info&ac=pick_check&checking=1', 'loading', '', false);
	
	$key_file = DISCUZ_ROOT.'/data/key.html';
	file_put_contents($key_file, 'ok');
	if(!file_exists($key_file)) cpmsg_error(milu_lang('dir_no_write', array('dir' => DISCUZ_ROOT.'/data')));
	
	$get_site = GET_URL;
	$client_info = get_client_info();
	if(!$client_info || !$client_info['domain']) cpmsg_error(milu_lang('lan_upgrage'));
	$url = GET_URL.'plugin.php?id=pick_user:upgrade&myac=upgrade_check&tpl=no&domain='.urlencode($client_info['domain']).'&dxc_version='.$client_info['dxc_version'].'&dxc_release='.$client_info['dxc_release'].'&siteurl='.urlencode($client_info['siteurl']);
	$msg_arr = get_contents($url, array('cache' => -1));
	@unlink($key_file);
	if($msg_arr < 0) cpmsg_error(milu_lang('no_conn_up'));
	$msg_arr = json_decode(base64_decode($msg_arr));
	$status = $msg_arr->status;
	
	if(!$status) {
		cpmsg_error(milu_lang('up_no_err'));
	}
	
	if($status == -1) {
		cpmsg_error(milu_lang('up_no_free'));
	}else if($status == -2) {
		cpmsg_error(milu_lang('up_no_set_err'));
	}else if($status == -3){
		cpmsg_error(milu_lang('up_newed'));
	}else if($status == -4 || !$msg_arr->key){
		cpmsg_error(milu_lang('no_normal_up'));
	}else{	
		$version_desc = base64_decode(dstripslashes($msg_arr->version_desc));
		$msg_arr->version_filename = base64_decode(dstripslashes($msg_arr->version_filename));
	}	
	echo '<link href="'.PICK_URL.'static/style.css?v='.PICK_VERSION.'" rel="stylesheet" type="text/css" />';
	echo '<table class="tb tb2 ">
<tbody><tr class="header hover"><td>'.milu_lang('check_have_new').'</td><td></td><td></td></tr>
<tr class="hover"><td>DXC '.$msg_arr->version.milu_lang('version').' [Release '.$msg_arr->version_dateline.']</td><td><input type="button" class="btn" onclick="confirm(\''.milu_lang('cofirm_up').'\') ? window.location.href=\'?'.PICK_GO.'pick_info&ac=pick_download&tpl=no&md5_total='.$msg_arr->version_md5total.'&key='.$msg_arr->key.'\' : \'\';" value="'.milu_lang('auto_up').'"></td><td><a href="'.$msg_arr->version_filename.'" target="_blank">'.milu_lang('no_auto_up').'</a></td></tr></tbody></table>';

	if($version_desc){
		$version_desc = $version_desc ?  $version_desc : milu_lang('no_have');
		echo '<p class="partition">'.milu_lang('up_notice').'</p><div id="show_upgrade_info" class="showmess"><p>'.str_iconv($version_desc).'</p></div>';
	}
	exit();
}

function pick_download(){
	$client_info = get_client_info();
	$version_md5total = $_GET['md5_total'];
	$key = $_GET['key'];
	if(!$client_info) cpmsg_error(milu_lang('lan_upgrage'));
	$packnum = 0;
	$tmpdir = DISCUZ_ROOT.'./data/download/dxc_temp';
	pload('C:cache');
	dir_clear($tmpdir);
	dmkdir($tmpdir, 0777, false);
	$end = '';
	$md5total = '';
	$md5s = array();
	$version = '';
	$version_dateline = 0; 
	$url = GET_URL.'plugin.php?id=pick_user:upgrade&myac=show_xml&tpl=no&domain='.urlencode($client_info['domain']).'&key='.$key.'&p=';
	require_once libfile('class/xml');
	do {
		$data = dfsockopen($url.$packnum, 0, '', '', false, '');
		if(!$data || $data == '-1' ) cpmsg_error(milu_lang('no_normal_get'));
		$array = xml2array($data);
		$version = $version ? $version : $array['Version'];
		$version_dateline = $version_dateline ? $version_dateline : $array['version_dateline'];
		if(!$array['Status']) {
			if(!$array['files']) {
				dir_clear($tmpdir);
				cpmsg('cloudaddons_download_error', '', 'error');
			}
			foreach($array['files'] as $file => $data) {
				$filename = $tmpdir.'/'.$file.'._addons_';
				$dirname = dirname($filename);
				dmkdir($dirname, 0777, false);
				$fp = fopen($filename, 'a');
				if(!$fp) {
					cpmsg('cloudaddons_download_write_error', '', 'error');
				}
				fwrite($fp, gzuncompress(base64_decode($data['Data'])));
				fclose($fp);
				if($data['MD5']) {
					$md5total .= $data['MD5'];
					$md5s[$filename] = $data['MD5'];
				}
			}
		} else {
			foreach($md5s as $file => $md5) {
				if($md5 != md5_file($file)) {
					dir_clear($tmpdir);
					cpmsg('cloudaddons_download_error', '', 'error');//数据下载错误
				}
			}
			$end = rawurlencode(http_build_query($array));
		}
		$packnum++;
	} while(!$end);
	
	if($md5total !== '' && md5($md5total) !== $version_md5total) {
		dir_clear($tmpdir);
		cpmsg('cloudaddons_download_error', '', 'error');//数据下载错误
	}
	cpmsg(milu_lang('DXC_installing'), PICK_GO.'pick_info&ac=pick_install&version='.$version.'&version_dateline='.$version_dateline, 'loading', '', false);
}


function pick_install(){
	global $_G;
	$tmpdir = DISCUZ_ROOT.'./data/download/dxc_temp';
	if(!is_dir($tmpdir)) {
		cpmsg('cloudaddons_download_error', '', 'error');//数据下载错误
	}

	$_GET['type'] = 'plugin';
	$_GET['key'] = 'milu_pick';
	$to_version = $_GET['version'];
	$to_version_dateline = $_GET['version_dateline'];
	if(!libfile('function/cloudaddons')) exit('error01:file not found');
	require_once libfile('function/cloudaddons');
	$descdir = DISCUZ_ROOT.'source/plugin/';
	$subdir = 'milu_pick';
	$unwriteabledirs = cloudaddons_dirwriteable($descdir, $subdir, $tmpdir);
	if($unwriteabledirs) {//目录不可写
		showtips(milu_lang('cloudaddons_unwriteabledirs', array('basedir' => 'source/plugin', 'unwriteabledirs' => implode(', ', $unwriteabledirs))));
		exit;		
	}
	$descdir .= $subdir;
	cloudaddons_comparetree($tmpdir, $descdir, $tmpdir, $_GET['key'].'.'.$_GET['type'].'vip', 1);
	
	if(!empty($_G['treeop']['oldchange']) && empty($_GET['confirmed'])) {
		cpmsg('cloudaddons_install_files_changed', '', 'form', array('files' => implode('<br />', $_G['treeop']['oldchange'])));
	}
	
	cloudaddons_copytree($tmpdir, $descdir);
	$client_info = get_client_info();
	$_GET['end'] = 'Status=End&ID=milu_pick_vip.plugin&SN='.$client_info['domain'].'&RevisionID='.$client_info['domain'].'&RevisionDateline='.$client_info['domain'];
	cloudaddons_savemd5($_GET['key'].'.'.$_GET['type'].'vip', $_GET['end'], $_G['treeop']['md5']);
	cloudaddons_deltree($tmpdir);
	//成功之后的一些动作
	
	$set['pick_tips']['check_version'] = 0;
	pick_common_set($set);
	
	$charset = str_replace('-', '', strtoupper($_G['config']['output']['charset']));
	$locale = '';
	if($charset == 'BIG5') {
		$locale = 'TC';
	} elseif($charset == 'GBK') {
		$locale = 'SC';
	} elseif($charset == 'UTF8') {
		if($_G['config']['output']['language'] == 'zh_cn') {
			$locale = 'SC';
		} elseif($_G['config']['output']['language'] == 'zh_tw') {
			$locale = 'TC';
		}
	}
	$xml_ext = 'discuz_plugin_milu_pick_'.$locale.'_'.$charset.'.xml';
	$xml_file = $descdir.'/'.$xml_ext;
	
	if(!file_exists($xml_file)) cpmsg(milu_lang('xml_no_found', array('f' => $xml_ext)), '', 'error');//xml文件丢失
	
	require_once libfile('class/xml');
	$data = file_get_contents($xml_file);
	$data_arr = xml2array($data);
	$xml_data = exportarray($data_arr['Data'], 0);
	pluginupgrade($xml_data, $installtype);
	$auth_file = PICK_DIR.'/data/pick_auth.txt';  
	$upgrade_file = $descdir.'/upgrade.php';
	if(file_exists($upgrade_file)) {
		$_GET['fromversion'] = PICK_VERSION;
		include($upgrade_file);
		if(!$finish) cpmsg_error(milu_lang('up_fail'));
	}
	@unlink($auth_file);
	cpmsg('plugins_upgrade_succeed', PICK_GO."pick_info", 'succeed', array('toversion' => $to_version.' '.$to_version_dateline));
}


function num_limit($table_name, $limit_num, $lang){
	$f_num = DB::result(DB::query("SELECT COUNT(*) FROM ".DB::table($table_name)), 0);
	if(!VIP && $f_num > $limit_num) cpmsg_error(milu_lang($lang, array('n' => $limit_num)));
}


class RootDomain{
    private static $self;
    private $domain=null;
    private $host=null;
    private $state_domain;
    private $top_domain;
    /**
     * 取得域名分析实例
     * Enter description here ...
     */
    public static function instace(){
        if(!self::$self)
            self::$self=new self();
        return self::$self;
    }
    private function  __construct(){
        $this->state_domain = array(
            'al','dz','af','ar','ae','aw','om','az','eg','et','ie','ee','ad','ao','ai','ag','at','au','mo','bb','pg','bs','pk','py','ps','bh','pa','br','by','bm','bg','mp','bj','be','is','pr','ba','pl','bo','bz','bw','bt','bf','bi','bv','kp','gq','dk','de','tl','tp','tg','dm','do','ru','ec','er','fr','fo','pf','gf','tf','va','ph','fj','fi','cv','fk','gm','cg','cd','co','cr','gg','gd','gl','ge','cu','gp','gu','gy','kz','ht','kr','nl','an','hm','hn','ki','dj','kg','gn','gw','ca','gh','ga','kh','cz','zw','cm','qa','ky','km','ci','kw','cc','hr','ke','ck','lv','ls','la','lb','lt','lr','ly','li','re','lu','rw','ro','mg','im','mv','mt','mw','my','ml','mk','mh','mq','yt','mu','mr','us','um','as','vi','mn','ms','bd','pe','fm','mm','md','ma','mc','mz','mx','nr','np','ni','ne','ng','nu','no','nf','na','za','aq','gs','eu','pw','pn','pt','jp','se','ch','sv','ws','yu','sl','sn','cy','sc','sa','cx','st','sh','kn','lc','sm','pm','vc','lk','sk','si','sj','sz','sd','sr','sb','so','tj','tw','th','tz','to','tc','tt','tn','tv','tr','tm','tk','wf','vu','gt','ve','bn','ug','ua','uy','uz','es','eh','gr','hk','sg','nc','nz','hu','sy','jm','am','ac','ye','iq','ir','il','it','in','id','uk','vg','io','jo','vn','zm','je','td','gi','cl','cf','cn','yr'
        );
        $this->top_domain=array('com','arpa','edu','gov','int','mil','net','org','biz','info','pro','name','museum','coop','aero','xxx','idv','me','mobi');
    }

    public function setUrl( $url = ''){
        if(empty($url)) FALSE;;
        if(!preg_match("/^http:/is", $url))
            $url="http://".$url;
        $url=parse_url(strtolower($url));
        $urlarr=explode(".", $url['host']);
        $count=count($urlarr);
        
        if ($count<=2){
            $this->domain=$url['host'];
        }else if ($count>2){
            $last=array_pop($urlarr);
            $last_1=array_pop($urlarr);
            if(in_array($last, $this->top_domain)){
                $this->domain=$last_1.'.'.$last;
                $this->host=implode('.', $urlarr);
            }else if (in_array($last, $this->state_domain)){
                $last_2=array_pop($urlarr);
                if(in_array($last_1, $this->top_domain)){
                    $this->domain=$last_2.'.'.$last_1.'.'.$last;
                    $this->host=implode('.', $urlarr);
                }else{
                    $this->host=implode('.', $urlarr).$last_2;
                    $this->domain=$last_1.'.'.$last;
                }
            }
        }
        return $this;
    }
 
    public function getDomain(){
        return $this->domain;
    }
   
    public function getHost(){
        return $this->host;
    }
} 



?>