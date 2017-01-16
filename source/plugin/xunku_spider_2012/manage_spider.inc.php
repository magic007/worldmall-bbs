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
if(is_file(D_P.'data/plugindata/xk_ownkey.php')){
	require_once(D_P.'data/plugindata/xk_ownkey.php');
}
if(is_file(D_P.'data/plugindata/xk_baseconfig.php')){
	require_once(D_P.'data/plugindata/xk_baseconfig.php');
}
$api_client = new ApiClient();
check_ownkey();
check_network();
$job = getgpc('job');
if ($network_avaliable) {
	if (empty($job)) {
		$step = getgpc('step');
		if (!$step) {
			$result = $api_client->execute('get_spider_source',array(
															'xk_publickey'=>$xk_publickey,
														));
			$source_info = $result['data'];
		} else {
			$source_id = getgpc('source_id');
			$baseconfig['global_source'] = $source_id;
			updatecache_baseconfig_spider($baseconfig);
			cpmsg(lang('plugin/xunku_spider_2012', 'action_success'), dreferer(), 'succeed');
		}	
	} elseif($job == 'refresh_source'){
		$sname = getgpc('sname');
		$config_path = D_P.'data/plugindata/'.$sname.'.config.php';
		$spider_path = D_P.'data/plugindata/'.$sname.'.spider.php';
		@unlink($config_path);
		@unlink($spider_path);
		cpmsg(lang('plugin/xunku_spider_2012', 'action_success'), dreferer(), 'succeed');
	} elseif($job == 'update_auto'){
		$result = $api_client->execute('get_spider_source',array(
															'xk_publickey'=>$xk_publickey,
														));
		$source_info = $result['data'];
		$updates = array();
		foreach($source_info as $key=>$value) {
			foreach($value['list'] as $k=>$v) {
				if(in_array($k,$baseconfig['global_source'])) {
					$config_path = D_P.'data/plugindata/'.$v['unique_key'].'.config.php';
					$spider_path = D_P.'data/plugindata/'.$v['unique_key'].'.spider.php';
					@unlink($config_path);
					@unlink($spider_path);
				}
			}
		}
		cpmsg(lang('plugin/xunku_spider_2012', 'action_success'), dreferer(), 'succeed');
	} elseif($job == 'add_source') {
		if ($xk_memberinfo['level'] == 0) {
			cpmsg_error(lang('plugin/xunku_spider_2012', 'level_limit'));
		}
		$step = getgpc('step');
		if (!$step) {
			$result = $api_client->execute('get_spider_source',array(
															'xk_publickey'=>$xk_publickey,
														));
			$source_info = $result['data'];
			ksort($source_info);
			$result = $api_client->execute('get_code_source',array(
															'xk_publickey'=>$xk_publickey,
														));
			$source_demo_code = $result['data'];	
		} else {
			$source_type = getgpc('source_type');
			$source_class = getgpc('source_class');
			$source_title = getgpc('source_title');
			$source_url = getgpc('source_url');
			$source_key = getgpc('source_key');
			$source_charset = getgpc('source_charset');
			$pwcode = getgpc('pwcode');
			$dzcode = getgpc('dzcode');
			$othercode = getgpc('othercode');
			$source_config = array();
			if (empty($source_title)) {
				cpmsg_error(lang('plugin/xunku_spider_2012', 'spider_title'));
			}
			if (empty($source_url)) {
				cpmsg_error(lang('plugin/xunku_spider_2012', 'spider_range'));
			}
			if (empty($source_key)) {
				cpmsg_error(lang('plugin/xunku_spider_2012', 'spider_type'));
			}
			if ($source_type == 1) {
				foreach($pwcode as $key=>$value) {
					$value = htmlspecialchars_decode($value);
					$value = str_replace(array("&nbsp;","&#39;"),array(" ","'"),$value);
					$pwcode[$key] = $value;
				}
				$source_config = $pwcode;
			}elseif($source_type == 2) {
				foreach($dzcode as $key=>$value) {
					$value = htmlspecialchars_decode($value);
					$value = str_replace(array("&nbsp;","&#39;"),array(" ","'"),$value);
					$dzcode[$key] = $value;
				}
				$source_config = $dzcode;
			}elseif($source_type == 3) {
				foreach($othercode as $key=>$value) {
					$value = htmlspecialchars_decode($value);
					$value = str_replace(array("&nbsp;","&#39;"),array(" ","'"),$value);
					$othercode[$key] = $value;
				}
				$source_config = $othercode;
			}
			$result = $api_client->execute('save_code_source',array(
														'xk_publickey'=>$xk_publickey,
														'action_type' => 1,
														'source_type'=>$source_type,
														'source_class'=>$source_class,
														'source_title'=>$source_title,
														'source_url'=>$source_url,
														'source_key'=>$source_key,
														'source_charset'=>$source_charset,
														'config'=>$source_config['config'],
														'thread'=>$source_config['thread'],
														'tpc'=>$source_config['tpc'],
														'post'=>$source_config['post'],
														'createurl'=>$source_config['createurl'],
													));
			if ($result['statue']) {
				cpmsg(lang('plugin/xunku_spider_2012', 'action_success'), rtrim($_G['siteurl'],'/').'/'.$basename.'&pmod=manage_spider', 'succeed');
			} else {
				cpmsg_error($result['data']);
			}
		}
	}elseif ($job == 'edite_source') {
		$step = getgpc('step');
		if (!$step) {
			$sid = getgpc('sid');
			$result = $api_client->execute('get_spider_source',array(
																'xk_publickey'=>$xk_publickey,
															));
			$source_info = $result['data'];
			ksort($source_info);
			$result = $api_client->execute('get_code_source_edite',array(
															'xk_publickey'=>$xk_publickey,
															'sid'=>$sid,
														));
			$resultdata = $result['data'];
			if ($result['statue']) {
				$source_detail = $resultdata['source_detail'];
				$source_code = $resultdata['source_code'];	
			}else {
				cpmsg_error($result['data']);
			}
		} else {
			$sid = getgpc('sid');
			$source_class = getgpc('source_class');
			$source_url = getgpc('source_url');
			$source_title = getgpc('source_title');
			$source_charset = getgpc('source_charset');
			$scode = getgpc('scode');
			$source_config = array();
			if (empty($source_title)) {
				cpmsg_error(lang('plugin/xunku_spider_2012', 'spider_title'));
			}
			if (empty($source_url)) {
				cpmsg_error(lang('plugin/xunku_spider_2012', 'spider_range'));
			}
			foreach($scode as $key=>$value) {
				$value = htmlspecialchars_decode(stripslashes($value));
				$value = str_replace(array("&nbsp;","&#39;"),array(" ","'"),$value);
				$scode[$key] = $value;
			}
			$source_config = $scode;
			$result = $api_client->execute('save_code_source',array(
														'xk_publickey'=>$xk_publickey,
														'action_type' => 0,
														'sid'=>$sid,
														'source_url'=>$source_url,
														'source_class'=>$source_class,
														'source_title'=>$source_title,
														'source_charset'=>$source_charset,
														'config'=>$source_config['config'],
														'thread'=>$source_config['thread'],
														'tpc'=>$source_config['tpc'],
														'post'=>$source_config['post'],
														'createurl'=>$source_config['createurl'],
													));
			if ($result['statue']) {
				cpmsg(lang('plugin/xunku_spider_2012', 'action_success'), rtrim($_G['siteurl'],'/').'/'.$basename.'&pmod=manage_spider', 'succeed');
			} else {
				cpmsg_error($result['data']);
			}
		}
	}
} else {
	cpmsg_error(lang('plugin/xunku_spider_2012', 'network_deny'));
}
include template('xunku_spider_2012:manage_spider');
?>