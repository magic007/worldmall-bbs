<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: admincp.inc.php 18582 2010-11-29 07:12:59Z monkey $
 */

if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}
error_reporting(0);
//error_reporting(E_ALL);
if (!function_exists('fsockopen') && !function_exists('pfsockopen')) {
	cpmsg_error(lang('plugin/xunku_spider_2012', 'network_can_use'));
}
define('CHARSET',$_G['charset']);
define('SPIDER','xunku');
define('CHARSET','gbk');
define('D_P',DISCUZ_ROOT);
define('H_P',DISCUZ_ROOT.'source/plugin/xunku_spider_2012/');
define('SPIDER_LIBRARY_DIR',H_P.'library/');
define('SPIDER_REQUIRE_DIR',H_P.'require/');
$basename = 'admin.php?action=plugins&operation=config&do='.$pluginid.'&identifier='.$_G['gp_identifier'];
require_once(SPIDER_REQUIRE_DIR.'xk_config.php');
require_once(SPIDER_REQUIRE_DIR.'xk_common.php');
require_once(SPIDER_LIBRARY_DIR.'api/ApiClient.php');
$islocalhost = isLocalhost($_SERVER['HTTP_HOST']);
if ($islocalhost) cpmsg_error(lang('plugin/xunku_spider_2012', 'local_limit'));
if(is_file(D_P.'data/plugindata/xk_baseconfig.php')){
	require_once(D_P.'data/plugindata/xk_baseconfig.php');
} else {
	default_baseconfig_set();
}
$api_client = new ApiClient();
check_ownkey();
check_network();
if ($network_avaliable) {
	$step = getgpc('step');
	if (!$step) {
		$global_replaces = '';
		ifcheck($baseconfig['if_open_now'],'if_open_now');
		ifcheck($baseconfig['if_open_later'],'if_open_later');
		$global_password = $baseconfig['global_password'];
		$global_from = $baseconfig['global_from'];
		$global_att = empty($baseconfig['global_att']) ? '' : implode(",",$baseconfig['global_att']);
		$global_majia = empty($baseconfig['global_majia']) ? '' : implode(",",$baseconfig['global_majia']);
		$global_posts = empty($baseconfig['global_posts']) ? '' : implode("\n",$baseconfig['global_posts']);
		if(!empty($baseconfig['global_replaces'])){
			foreach ($baseconfig['global_replaces'] as $key => $value)	{
				$global_replaces .= implode('=',$value)."\n";
			}
		}
	} else {
		$if_open_now = getgpc('if_open_now');
		$if_open_later = getgpc('if_open_later');
		$global_password = getgpc('global_password');
		$global_from = getgpc('global_from');
		$global_att = getgpc('global_att');
		$global_majia = getgpc('global_majia');
		$global_posts = getgpc('global_posts');
		$global_replaces = getgpc('global_replaces');
		$replace_tmp = array();
		$baseconfig['if_open_now'] = intval($if_open_now);
		$baseconfig['if_open_later'] = intval($if_open_later);
		$baseconfig['global_password'] = $global_password;
		$baseconfig['global_from'] = $global_from;
		$baseconfig['global_att'] = explode(",",stripslashes($global_att));
		$baseconfig['global_majia'] = explode(",",stripslashes($global_majia));
		$baseconfig['global_posts'] = explode("\n",stripslashes($global_posts));
		if(count($baseconfig['global_majia']) > 1){
			foreach($baseconfig['global_majia'] as $key=>$value){
				if(!DB::fetch_first("SELECT uid FROM ".DB::table('common_member')." WHERE username = ".xkEscape($value))){
					cpmsg_error($value.lang('plugin/xunku_spider_2012', 'majia_not_exits'));
				}
			}	
		}
		$replace_tmp = explode("\n",stripslashes($global_replaces));
		if(!empty($replace_tmp)){
			$baseconfig['global_replaces'] = array();
			foreach($replace_tmp as $key=>$value){
				$tmparray = explode('=',$value);
				$baseconfig['global_replaces'][] = $tmparray;
			}
		}
		$update_arr = array(
			'if_open_now' 			=> $baseconfig['if_open_now'],
			'if_open_later'	=> $baseconfig['if_open_later'],
			'global_password'	=> $baseconfig['global_password'],
			'global_from'	=> $baseconfig['global_from'],
			'global_att'		=> serialize($baseconfig['global_att']),
			'global_majia'		=> serialize($baseconfig['global_majia']),
			'global_posts'		=> serialize($baseconfig['global_posts']),
			'global_replaces'	=> serialize($baseconfig['global_replaces']),
		);
		if($check = DB::fetch_first("SELECT id FROM xk_baseconfig WHERE id = 1")){
			//DB::query("UPDATE xk_baseconfig SET ".xkSqlSingle($update_arr)." WHERE id = 1");
		}else{
			//DB::query("INSERT INTO xk_baseconfig SET ".xkSqlSingle($update_arr));
		}
		updatecache_baseconfig_spider($baseconfig);
		cpmsg(lang('plugin/xunku_spider_2012', 'action_success'), dreferer(), 'succeed');
	}
} else {
	cpmsg_error(lang('plugin/xunku_spider_2012', 'network_deny'));
}
include template('xunku_spider_2012:baseconfig');
?>