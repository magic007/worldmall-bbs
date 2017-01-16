<?php
if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}
if (!function_exists('fsockopen') && !function_exists('pfsockopen')) {
	cpmsg_error(lang('plugin/xunku_spider_2012', 'network_can_use'));
}
define('CHARSET',$_G['charset']);
define('SPIDER','xunku');
define('D_P',DISCUZ_ROOT);
define('H_P',DISCUZ_ROOT.'source/plugin/xunku_spider_2012/');
define('SPIDER_LIBRARY_DIR',H_P.'library/');
define('SPIDER_REQUIRE_DIR',H_P.'require/');
$basename = 'admin.php?action=plugins&operation=config&do='.$pluginid.'&identifier='.$_G['gp_identifier'];
error_reporting(0);
//error_reporting(E_ALL);
require_once(SPIDER_REQUIRE_DIR.'xk_config.php');
require_once(SPIDER_REQUIRE_DIR.'xk_common.php');
$islocalhost = isLocalhost($_SERVER['HTTP_HOST']);
if ($islocalhost) cpmsg_error(lang('plugin/xunku_spider_2012', 'local_limit'));
require_once(SPIDER_LIBRARY_DIR.'api/ApiClient.php');
$api_client = new ApiClient();
check_ownkey();
check_network();
check_sql();
if(!is_file(D_P.'data/plugindata/xk_baseconfig.php')){
	default_baseconfig_set();
}
if(is_file(D_P.'data/plugindata/xk_baseconfig.php')){
	require_once(D_P.'data/plugindata/xk_baseconfig.php');
}
if($xk_memberinfo['level'] == 0 || $xk_memberinfo['level'] == 10) {
	$baseconfig['global_source'] = array('2');
	updatecache_baseconfig_spider($baseconfig);
}
$month = getgpc('month');
$thread_statis = $post_statis = $user_statis = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
$thread_all = $postall = $userall = 0;
$date_arr = date_parse(date('Y-m-d',TIMESTAMP));
$year = $date_arr['year'];
$month = (isset($month)) ? $month : $date_arr['month'];
$day = $date_arr['day'];
$current_month = $year.'-'.$month;
$query = DB::query("select * from xk_statistics where create_date >= ".xkEscape($current_month.'-1')." and create_date <= " . xkEscape($current_month.'-31'));
$max_num = 0;
$threadall = $postall = $userall = 0;
while($rt = DB::fetch($query)) {
	$arr_tmp = explode('-',$rt['create_date']);
	$day_tmp = intval($arr_tmp[2])-1;
	$thread_statis[$day_tmp] = $rt['thread'];
	$post_statis[$day_tmp] = $rt['post'];
	$user_statis[$day_tmp] = $rt['user'];
	if ($rt['thread'] > $max_num) $max_num = $rt['thread'];
	if ($rt['post'] > $max_num) $max_num = $rt['post'];
	if ($rt['user'] > $max_num) $max_num = $rt['user'];
	$threadall += $rt['thread'];
	$postall += $rt['post'];
	$userall += $rt['user'];
}
$thread_statis = '['.implode(',',$thread_statis).']';
$post_statis = '['.implode(',',$post_statis).']';
$user_statis = '['.implode(',',$user_statis).']';
$max_num = intval($max_num/100)*100+100;
include template('xunku_spider_2012:admin');
?>