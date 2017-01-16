<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
/**
 * 检测私钥的生成
 */
function check_ownkey() {
	global $xk_ownkey,$xk_publickey,$_G,$xk_memberinfo;
	if (is_file(D_P.'data/plugindata/xk_ownkey.php')) {require_once(D_P.'data/plugindata/xk_ownkey.php');}
	$build = (!is_file(D_P.'data/plugindata/xk_ownkey.php') || !$xk_publickey || !$xk_ownkey) ? true : false;
	$api_client = new ApiClient();
	if ($build) {
		$salt = "sdfdf*^\tFGFyWEId4\ra&2!cr3s56O1^";
		$xk_publickey = md5($salt . uniqid('', true) . mt_rand());
		if(strpos(strtolower($_G['setting']['siteurl']),'comsenz')!==false) {
			$db_bbsurl = 'http://'.$_SERVER['HTTP_HOST'];
		}else {
			$db_bbsurl = $_G['setting']['siteurl'];
		}
		$result = $api_client->execute('check_ownkey',array(
													'xk_publickey'=>$xk_publickey,
													'db_bbsname'=>$_G['setting']['sitename'],
													'db_bbsurl'=>rtrim($db_bbsurl,'/'),
													'site_type' => 'dz',
													'charset' => CHARSET,
												));
		$xk_ownkey = $result['data']['okey'];
		$xk_memberinfo = $result['data']['memberinfo'];
		$cacheStr = "\$xk_ownkey='$xk_ownkey';\r\n\$xk_publickey='$xk_publickey';\r\n";
		writeover(D_P."data/plugindata/xk_ownkey.php","<?php\r\n".$cacheStr."\r?>");
	} else {
		$result = $api_client->execute('get_member_info',array(
													'xk_publickey'=>$xk_publickey,
												));
		$xk_memberinfo = $result['data']['memberinfo'];
	}
}

/**
 * 检测服务是否可用
 */
function check_network() {
	global $network_avaliable;
	$network_avaliable = false;
	$api_client = new ApiClient();
	$result = $api_client->execute('check_network',array(
													'xk_publickey'=>$xk_publickey,
												));
	if ($result['data']['network'] == '1') {
		$network_avaliable = true;
	}
}

function xkConvert($str,$to_encoding,$from_encoding,$ifmb=true) {
	if (strtolower($to_encoding) == strtolower($from_encoding)) {
		return $str;
	}
	if (is_array($str)) {
		foreach ($str as $key=>$value) {
			$str[$key] = xkConvert($value,$to_encoding,$from_encoding,$ifmb);
		}
		return $str;
	} else {
		if (function_exists('mb_convert_encoding') && $ifmb) {
			return mb_convert_encoding($str,$to_encoding,$from_encoding);
		} else {
			require_once libfile('class/chinese');
			$chinese = new Chinese($from_encoding, $to_encoding, true);
			$str = $chinese->Convert($str);
		}
	}
}

function pwConvert($str,$to_encoding,$from_encoding,$ifmb=true) {
	if (strtolower($to_encoding) == strtolower($from_encoding)) {
		return $str;
	}
	if (is_array($str)) {
		foreach ($str as $key=>$value) {
			$str[$key] = xkConvert($value,$to_encoding,$from_encoding,$ifmb);
		}
		return $str;
	} else {
		if (function_exists('mb_convert_encoding') && $ifmb) {
			return mb_convert_encoding($str,$to_encoding,$from_encoding);
		} else {
			require_once libfile('class/chinese');
			$chinese = new Chinese($from_encoding, $to_encoding, true);
			$str = $chinese->Convert($str);
		}
	}
}

function updatecache_baseconfig_spider($baseconfig){
	$cache = array();
	$cacheStr = '';
	$cacheStr = "\$baseconfig=".xk_var_export($baseconfig).";\r\n";
	writeover(D_P."data/plugindata/xk_baseconfig.php","<?php\r\n".$cacheStr."\r\n?>");
}

function xk_var_export($input, $indent = '') {
	switch (gettype($input)) {
		case 'string' :
			return "'" . str_replace(array("\\", "'"), array("\\\\", "\'"), $input) . "'";
		case 'array' :
			$output = "array(\r\n";
			foreach ($input as $key => $value) {
				$output .= $indent . "\t" . xk_var_export($key, $indent . "\t") . ' => ' . xk_var_export($value, $indent . "\t");
				$output .= ",\r\n";
			}
			$output .= $indent . ')';
			return $output;
		case 'boolean' :
			return $input ? 'true' : 'false';
		case 'NULL' :
			return 'NULL';
		case 'integer' :
		case 'double' :
		case 'float' :
			return "'" . (string) $input . "'";
	}
	return 'NULL';
}

function save_config(){
	global $type,$ifcheck,$today_count,$localuser,$local_att,$moniposttime;
	global $replay,$replay_own,$majia,$replay_all,$replay_perpage;
	global $tfid,$to_threadcate,$to_subtype;
	global $wyc_replace,$wyc;
	global $tpc_time,$post_time_min,$post_time_max;
	global $view_num_min,$view_num_max;
	global $filter_username,$filter_keywords,$filter_username_cai,$filter_keywords_cai;
	global $replay_try;
	$save_config = empty($save_config) ? array() : $save_config;
	$save_config = array(
		'type'			=> $type,
		'ifcheck'		=> $ifcheck,
		'today_count'	=> $today_count,
		'localuser'		=> $localuser,
		'local_att'		=> $local_att,
		'moniposttime'	=> $moniposttime,
		'replay'		=> $replay,
		'replay_try'	=> $replay_try,
		'replay_own'	=> $replay_own,
		'majia'			=> $majia,
		'replay_all'	=> $replay_all,
		'replay_perpage'=> $replay_perpage,
		'tfid'			=> $tfid,
		'to_threadcate'	=> $to_threadcate,
		'wyc_replace'	=> $wyc_replace,
		'wyc'			=> $wyc,
		'tpc_time'		=> $tpc_time,
		'post_time_min'		=> $post_time_min,
		'post_time_max'		=> $post_time_max,
		'view_num_min' => $view_num_min,
		'view_num_max' => $view_num_max,
		'filter_username' => $filter_username,
		'filter_keywords' => $filter_keywords,
		'filter_username_cai' => $filter_username_cai,
		'filter_keywords_cai' => $filter_keywords_cai,
	);
	$cacheStr = "\$save_config=".xk_var_export($save_config).";\r\n";
	writeover(D_P."data/plugindata/xk_saveconfig.php","<?php\r\n".$cacheStr."\r\n?>");
}

function ajax_return($statue = 1,$data){
	ob_end_clean();
	$data = xkConvert($data,'UTF8','GBK');
	$result['statue'] = $statue;
	$result['data'] = $data;
	header('Content-Type:text/html; charset=utf-8');
	exit (json_encode($result));
}

function generateSign($buildParams) {
	global $xk_ownkey,$xk_publickey;
	ksort($buildParams);
	$stringToBeSigned = $xk_ownkey;
	foreach ($buildParams as $k => $v) {
		$stringToBeSigned .= $k.$v;
	}
	unset($k, $v);
	$stringToBeSigned .= $xk_ownkey;
	return md5($stringToBeSigned);
}

function xkEscape($var,$strip = true,$is_array=false) {
	if (is_array($var)) {
		if (!$is_array) return " '' ";
		foreach ($var as $key => $value) {
			$var[$key] = trim(xkEscape($value,$strip));
		}
		return $var;
	} elseif (is_numeric($var)) {
		return " '".$var."' ";
	} else {
		return " '".addslashes($strip ? stripslashes($var) : $var)."' ";
	}
}

function xkImplode($array,$strip=true) {
	return implode(',',xkEscape($array,$strip,true));
}

function xkSqlSingle($array,$strip=true) {
	$array = xkEscape($array,$strip,true);
	$str = '';
	foreach ($array as $key => $val) {
		$str .= ($str ? ', ' : ' ').$key.'='.$val;
	}
	return $str;
}

function xkSqlMulti($array,$strip=true) {
	$str = '';
	foreach ($array as $val) {
		if (!empty($val)) {
			$str .= ($str ? ', ' : ' ') . '(' . xkImplode($val,$strip) .') ';
		}
	}
	return $str;
}

function xkLimit($start,$num=false) {
	return ' LIMIT '.($start <= 0 ? 0 : (int)$start).($num ? ','.abs($num) : '');
}

function writeover($filename,$data,$method='rb+',$iflock=1,$check=1,$chmod=1){
	$filename = Pcv($filename,$check);
	touch($filename);
	$handle = fopen($filename,$method);
	$iflock && flock($handle,LOCK_EX);
	fwrite($handle,$data);
	$method=='rb+' && ftruncate($handle,strlen($data));
	fclose($handle);
	$chmod && @chmod($filename,0777);
}

function Pcv($filename,$ifcheck=1){
	$tmpname = strtolower($filename);
	$tmparray = array('://',"\0");
	$ifcheck && $tmparray[] = '..';
	if (str_replace($tmparray,'',$tmpname)!=$tmpname) {
		exit('Forbidden');
	}
	return $filename;
}

function ifcheck($var,$out) {
	$GLOBALS[$out.'_Y'] = $GLOBALS[$out.'_N'] = '';
	$GLOBALS[$out.'_'.($var ? 'Y' : 'N')] = 'checked';
}

function createFolder($path) {
	if (!is_dir($path)) {
		createFolder(dirname($path));
		@mkdir($path);
		@chmod($path,0777);
		@fclose(@fopen($path.'/index.html','w'));
		@chmod($path.'/index.html',0777);
	}
}

function PwStrtoTime($time) {
	return strtotime($time);
}

function ixunkuHtmlspecialchars_decode ($string,$decodeTags = true) {
	$string = str_replace('&amp;','&', $string);
	$string =  str_replace(array( '&quot;', '&#039;', '&nbsp;','&#160;'), array('"', "'", ' ',' '), $string);
	$decodeTags && $string = str_replace(array('&lt;', '&gt;',),array( '<', '>'),$string);
	return $string;
}

function update_rewrite($rewrite) {
	$cacheStr = "\$xk_rewrite=".xk_var_export($rewrite).";\r\n";
	writeover(D_P."data/plugindata/xk_rewrite.php","<?php\r\n".$cacheStr."\r\n?>");
}

function default_baseconfig_set() {
	global $_G;
	$baseconfig = array(
		'if_open_now' 	=> 1,
		'if_open_later'	=> 1,
		'global_password'	=> '123456',
		'global_from'	=> lang('plugin/xunku_spider_2012', 'default_global_from'),
		'global_att'	=> array('zip','rar','txt'),
		'global_majia'	=> '',
		'global_posts'	=> array(lang('plugin/xunku_spider_2012', 'default_global_post1'),lang('plugin/xunku_spider_2012', 'default_global_post2'),lang('plugin/xunku_spider_2012', 'default_global_post3'),lang('plugin/xunku_spider_2012', 'default_global_post4'),lang('plugin/xunku_spider_2012', 'default_global_post5')),
		'global_replaces' => array(array(lang('plugin/xunku_spider_2012', 'default_global_replaces'),$_G['setting']['sitename'])),
	);
	updatecache_baseconfig_spider($baseconfig);
	$save_config = array(
		'ifcheck'		=> 1,
		'today_count'	=> array(1,2),
		'localuser'		=> 1,
		'local_att'		=> 1,
		'moniposttime'	=> 1,
		'replay'		=> 1,
		'replay_own'	=> 0,
		'majia'			=> null,
		'replay_all'	=> '',
		'replay_perpage'=> '',
		'tfid'			=> 0,
		'to_threadcate'	=> 0,
		'wyc_replace'	=> 0,
		'wyc'			=> null,
		'tpc_time'		=> '',
		'post_time'		=> '',
	);
	$cacheStr = "\$save_config=".xk_var_export($save_config).";\r\n";
	writeover(D_P."data/plugindata/xk_saveconfig.php","<?php\r\n".$cacheStr."\r\n?>");
}

function isLocalhost($host) {
	if ($host && strpos($host, 'localhost') === false && strpos($host, '127.0') === false && strpos($host, '127.1') === false && !preg_match('/^192.168.*/', $host) && !preg_match('/^10.*/', $host)) {
		$islocalhost = false;
	} else {
		$islocalhost = true;
	}
	return $islocalhost;
}

function check_sql() {
	if(!DB::fetch_first("Describe ".DB::table('forum_thread')." if_spider")){
		DB::query("ALTER TABLE  ".DB::table('forum_thread')." ADD  if_spider TINYINT( 1 ) NOT NULL DEFAULT  '0'");
	}
	if(!DB::fetch_first("Describe ".DB::table('forum_thread')." source_key")){
		DB::query("ALTER TABLE  ".DB::table('forum_thread')." ADD  source_key VARCHAR( 255 ) NOT NULL DEFAULT  ''");
	}
	if(!DB::fetch_first("Describe ".DB::table('common_member')." if_robot")){
		DB::query("ALTER TABLE  ".DB::table('common_member')." ADD  if_robot TINYINT( 1 ) NOT NULL DEFAULT  '0'");
	}
	if(!DB::fetch_first("Describe ".DB::table('portal_article_title')." if_spider")){
		DB::query("ALTER TABLE  ".DB::table('portal_article_title')." ADD  if_spider TINYINT( 1 ) NOT NULL DEFAULT  '0'");
	}
	if(!DB::fetch_first("Describe ".DB::table('portal_article_title')." source_key")){
		DB::query("ALTER TABLE  ".DB::table('portal_article_title')." ADD  source_key VARCHAR( 255 ) NOT NULL DEFAULT  ''");
	}
	DB::query("CREATE TABLE IF NOT EXISTS `xk_baseconfig` (
			  `id` tinyint(1) NOT NULL auto_increment,
			  `if_open_now` tinyint(1) NOT NULL default '1',
			  `if_open_later` tinyint(1) NOT NULL default '1',
			  `global_password` varchar(255) NOT NULL default '',
			  `global_from` varchar(255) NOT NULL default '',
			  `global_att` varchar(255) NOT NULL default '',
			  `global_majia` text NOT NULL,
			  `global_posts` text NOT NULL,
			  `global_replaces` text NOT NULL,
			  `global_source` text NOT NULL,
			  PRIMARY KEY  (`id`)
			) ENGINE=MyISAM AUTO_INCREMENT=1");
	DB::query("CREATE TABLE IF NOT EXISTS `xk_spider_job` (
			  `id` int(11) NOT NULL auto_increment,
			  `type` tinyint(1) NOT NULL default '0',
			  `url` varchar(255) NOT NULL default '',
			  `state` tinyint(1) NOT NULL default '0',
			  `per_num` varchar(6) NOT NULL default '0',
			  `per_all` smallint(6) NOT NULL default '1',
			  `all_num` smallint(6) NOT NULL default '1',
			  `current_num` varchar(6) NOT NULL default '1',
			  `if_finish` tinyint(1) NOT NULL default '0',
			  `tid` int(11) NOT NULL default '0',
			  `extinfo` text NOT NULL,
			  PRIMARY KEY  (`id`)
			) ENGINE=MyISAM  AUTO_INCREMENT=1");
	DB::query("CREATE TABLE IF NOT EXISTS `xk_spider_job_later` (
			  `id` smallint(6) NOT NULL auto_increment,
			  `stype` smallint(6) NOT NULL default '0',
			  `fid` smallint(6) NOT NULL default '0',
			  `url` varchar(255) NOT NULL default '',
			  `month` varchar(20) NOT NULL default '*',
			  `week` varchar(20) NOT NULL default '*',
			  `day` varchar(20) NOT NULL default '*',
			  `create_date` datetime NOT NULL,
			  `last_run_date` datetime NOT NULL,
			  `if_open` tinyint(1) NOT NULL default '1',
			  PRIMARY KEY  (`id`)
			) ENGINE=MyISAM  AUTO_INCREMENT=1");
	DB::query("CREATE TABLE IF NOT EXISTS `xk_spider_url` (
			  `id` int(11) NOT NULL auto_increment,
			  `type` varchar(255) NOT NULL default '',
			  `tid` int(11) NOT NULL default '0',
			  `url` varchar(255) NOT NULL default '',
			  PRIMARY KEY  (`id`)
			) ENGINE=MyISAM AUTO_INCREMENT=1");
	DB::query("CREATE TABLE IF NOT EXISTS `xk_statistics` (
			  `id` int(10) NOT NULL auto_increment,
			  `thread` smallint(6) unsigned NOT NULL default '0',
			  `post` smallint(6) unsigned NOT NULL default '0',
			  `user` smallint(6) unsigned NOT NULL default '0',
			  `create_date` date NOT NULL,
			  PRIMARY KEY  (`id`)
			) ENGINE=MyISAM COMMENT='数据采集统计信息' AUTO_INCREMENT=1");
	if(!DB::fetch_first("Describe `xk_spider_job_later` modelid")){
		DB::query("ALTER TABLE  `xk_spider_job_later` ADD  modelid smallint( 6 ) NOT NULL DEFAULT  '0'");
		DB::query("ALTER TABLE  `xk_spider_job_later` ADD  cmode TINYINT( 1 ) NOT NULL DEFAULT  '1'");
	}
}

function face_local($faceurl, $uid){
	if(strpos($faceurl,'http') === false) {
		return false;
	}
	if (strpos($faceurl,'?') !== false) {
		$faceurl = substr($faceurl,0,strpos($faceurl,'?'));
	}
	$uid = abs(intval($uid));
	$uid = sprintf("%09d", $uid);
	$dir1 = substr($uid, 0, 3);
	$dir2 = substr($uid, 3, 2);
	$dir3 = substr($uid, 5, 2);
	$attdir_1 = D_P.'uc_server/data/avatar/'.$dir1;
	$attdir_2 = $attdir_1.'/'.$dir2;
	$attdir_3 .= $attdir_2 .'/'.$dir3;
	if(!is_dir($attdir_1) && @mkdir($attdir_1)){
		@chmod($attdir_1,0777);
	}
	if(!is_dir($attdir_2) && @mkdir($attdir_2)){
		@chmod($attdir_2,0777);
	}
	if(!is_dir($attdir_3) && @mkdir($attdir_3)){
		@chmod($attdir_3,0777);
	}
	$attdir = D_P.'uc_server/data/avatar/'.$dir1.'/'.$dir2.'/'.$dir3;
	$big_file_path = $attdir.'/'.substr($uid, -2)."_avatar_big.jpg";
	$middle_file_path = $attdir.'/'.substr($uid, -2)."_avatar_middle.jpg";
	$small_file_path = $attdir.'/'.substr($uid, -2)."_avatar_small.jpg";
	$saveto = $attdir.'/tmp_face.jpg';
	$ext = 'jpg';
	if(downFile($faceurl, $saveto, $ext) && downFile($faceurl, $saveto_s, $ext)) {
		$imagesize = getimagesize($saveto);
		if ($imagesize[0] > 120 || $imagesize[1] > 120) {
			$xk_image = new xkimages();
			$xk_image->Thumbnail($saveto,$big_file_path,160,160);
			$xk_image->Thumbnail($saveto,$middle_file_path,120,120);
			$xk_image->Thumbnail($saveto,$small_file_path,48,48);
		} else {
			writeover($big_file_path,file_get_contents($saveto));
			writeover($middle_file_path,file_get_contents($saveto));
			writeover($small_file_path,file_get_contents($saveto));
		}
		unlink($saveto);
	} else {
		unlink($saveto);
	}
}
function downFile($imgurl, $saveto, $ext) {
	$snoopy = new Snoopy();
	if($snoopy->fetch($imgurl)){
		$saveto = substr($saveto,0,strrpos($saveto,'.')).'.'.$ext;
		$fp = fopen($saveto,'w');
		fwrite($fp,$snoopy->results);
		fclose($fp);
		unset($snoopy);
		return array($ext,$saveto);
	}else{
		return false;
	}
}
?>