<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: admincp.inc.php 18582 2010-11-29 07:12:59Z monkey $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
error_reporting(0);
//error_reporting(E_ALL);
define('FORUM_TYPE','dz');
define('SPIDER','xunku');
define('CHARSET',$_G['charset']);
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
}
$api_client = new ApiClient();
check_ownkey();
check_network();
$result = $api_client->execute('upgrade_online',array(
														'xk_publickey'=>$xk_publickey,
													));
$result_upgrade = $result['data'];

$source = $baseconfig['global_source'];
$result = $api_client->execute('get_spider_source_byid',array(
														'xk_publickey'=>$xk_publickey,
														'source' => implode(',',$source)
													));	
$source_info = $result['data'];
$select_site = '<select id="type" name="type" class="select_wa">';
foreach($source_info as $key=>$value){
	$selected = ($save_config['type'] == $value['id']) ? 'selected' : '';
	$select_site .= '<option value="'.$value['id'].'" '.$selected.'>'.$value['title'].'</option>';
}
$select_site .= '</select>';
if ($network_avaliable) {
	$step = getgpc('step');
	if (!$step) {
		$program = $rules = array();
		$result = $api_client->execute('get_source_program',array(
															'xk_publickey'=>$xk_publickey,
														));
		$program = $result['data'];
		$result = $api_client->execute('get_source_rules',array(
															'xk_publickey'=>$xk_publickey,
														));
		$rules = $result['data'];
	} elseif($step == 2) {
		$type = getgpc('type');
		$descrip = getgpc('descrip');
		$result = $api_client->execute('submit_source_program',array(
														'xk_publickey'=>$xk_publickey,
														'type' => intval($type),
														'descrip' => $descrip
													));
		if ($result['statue']) {
			cpmsg(lang('plugin/xunku_spider_2012', 'action_success'), dreferer(), 'succeed');
		} else {
			cpmsg_error(lang('plugin/xunku_spider_2012', 'action_error'));
		}
	} elseif($step == 3) {
		$source_title = getgpc('source_title');
		$source_url = getgpc('source_url');
		$source_desc = getgpc('source_desc');
		$result = $api_client->execute('submit_source_rule',array(
														'xk_publickey'=>$xk_publickey,
														'source_title' => $source_title,
														'source_url' => $source_url,
														'source_desc' => $source_desc
													));
		if ($result['statue']) {
			cpmsg(lang('plugin/xunku_spider_2012', 'action_success'), dreferer(), 'succeed');
		} else {
			cpmsg_error(lang('plugin/xunku_spider_2012', 'action_error'));
		}
	}
} else {
	cpmsg_error(lang('plugin/xunku_spider_2012', 'network_deny'));
}
if (CHARSET == 'gbk') {
	include template('xunku_spider_2012:help');
} else {
	include template('xunku_spider_2012:help_utf');
}
?>