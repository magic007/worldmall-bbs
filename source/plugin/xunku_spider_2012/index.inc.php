<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
if(!defined('CURSCRIPT')) {
	exit('Access Denied');
}
define('FORUM_TYPE','dz');
define('SPIDER','xunku');
define('CHARSET',$_G['charset']);
define('D_P',DISCUZ_ROOT);
define('H_P',DISCUZ_ROOT.'source/plugin/xunku_spider_2012/');
define('SPIDER_LIBRARY_DIR',H_P.'library/');
define('SPIDER_REQUIRE_DIR',H_P.'require/');
error_reporting(0);
//error_reporting(E_ALL);
if(is_file(D_P.'data/plugindata/xk_ownkey.php')){
	require_once(D_P.'data/plugindata/xk_ownkey.php');
}
if(is_file(D_P.'data/plugindata/xk_baseconfig.php')){
	require_once(D_P.'data/plugindata/xk_baseconfig.php');
}
if(is_file(D_P.'data/plugindata/xk_saveconfig.php')){
	require_once(D_P.'data/plugindata/xk_saveconfig.php');
}
if(is_file(D_P.'data/plugindata/xk_rewrite.php')){
	require_once(D_P.'data/plugindata/xk_rewrite.php');
}
if(!is_file(D_P.'data/plugindata/xk_face.php')){
	$face_url = $xk_config['server_path']."/data/face/face.php";
	$face_content = file_get_contents($face_url);
	writeover(D_P.'data/plugindata/xk_face.php',"<?php\r\n".$face_content."\r?>");
}
require_once(SPIDER_REQUIRE_DIR.'xk_config.php');
require_once(SPIDER_REQUIRE_DIR.'xk_common.php');
$action = getgpc('action');

if ($action == 'api_entry') {
	ini_set ('memory_limit',-1);
	ob_end_clean();
	require_once (SPIDER_LIBRARY_DIR.'spider.run.php');
	require_once(SPIDER_LIBRARY_DIR.'api/ApiClient.php');
	$api_client = new ApiClient();
	$id = getgpc('id');
	$pkey = getgpc('pkey');
	$format = getgpc('format');
	$timestamp = getgpc('timestamp');
	$sign = getgpc('sign');
	$source_type = getgpc('source_type');
	$range = getgpc('range');
	$fid = getgpc('fid');
	$ttype = getgpc('ttype');
	$tid = getgpc('tid');
	$nowpage = getgpc('nowpage');
	$allpage = getgpc('allpage');
	$jobid = getgpc('jobid');
	$spider_type = getgpc('spider_type');
	$source_v = getgpc('source_v');
	$cmode = getgpc('cmode');
	$params = array(
		'pkey' => $pkey,
		'format' => $format,
		'timestamp' => $timestamp
	);
	$buildSign = generateSign($params);
	if($sign != $buildSign) exit(lang('plugin/xunku_spider_2012', 'sign_error'));
	if(empty($cmode)) {
		$cmode = 1;
		$tmpArr = DB::fetch_first('select * from xk_spider_job where id = '.xkEscape($jobid));
		if($tmpArr) {
			$tmpArr_ext = json_decode($tmpArr['extinfo'],true);
			if(isset($tmpArr_ext['cmode']) && $tmpArr_ext['cmode'] == '2') {
				$cmode = 2;
			}
		}	
	}
	$configure = array('s_type'=>$source_type,'s_type_v'=>intval($source_v),'range'=>$range,'fid'=>$fid,'fname'=>$forum[$fid]['name'],'ttype'=>$ttype,'jobid'=>$jobid,'spider_type'=>$spider_type,'cmode'=>$cmode);
	$tid = (empty($tid)) ? 0 : intval($tid);
	$nowpage = (empty($nowpage)) ? 1 : intval($nowpage);
	$allpage = (empty($allpage)) ? 0 : intval($allpage);
	$spider = new spider($configure);
	list($tid,$allpage,$nowpage) = $spider->t_spider->run_s($tid,$nowpage,$allpage);
	if ($tid == -1) {
		$nowpage = 10000;
		$allpage = 0;
	}
	ajax_return(1,array('tid'=>$tid,'allpage'=>$allpage,'nowpage'=>$nowpage));
}elseif($action == 'api_later_getlist') {
	$source_type = getgpc('source_type');
	$range = getgpc('range');
	$jobid = getgpc('jobid');
	ini_set ('memory_limit',-1);
	$if_open = DB::result_first('select if_open from xk_spider_job_later where id = '.xkEscape($jobid));
	if ($if_open) {
		require_once (SPIDER_LIBRARY_DIR.'spider.run.php');
		$configure = array('s_type'=>$source_type);
		$spider = new spider($configure);
		$threadlist = $spider->t_spider->get_threadlist($range);
		DB::query('update xk_spider_job_later set last_run_date = '.xkEscape(date('Y-m-d H:i:s',TIMESTAMP)).' where id = '.$jobid);
		ajax_return(1,array('threadlist'=>implode(',',$threadlist)));
	}else {
		ajax_return(0);
	}
}
?>