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
if (is_file(D_P.'data/plugindata/xk_rewrite.php')) {
	require_once(D_P.'data/plugindata/xk_rewrite.php');
}
$api_client = new ApiClient();
check_ownkey();
check_network();
$job = getgpc('job');
if ($network_avaliable) {
	if(empty($job)){
		$step = getgpc('step');
		if (!$step) {
			$source_replaces = '';
			if(!empty($xk_rewrite['source_title_header'])){
				foreach ($xk_rewrite['source_title_header'] as $key => $value)	{
					$source_title_header .= $value."\n";
				}
			}
			if(!empty($xk_rewrite['source_title_tail'])){
				foreach ($xk_rewrite['source_title_tail'] as $key => $value)	{
					$source_title_tail .= $value."\n";
				}
			}
			if(!empty($xk_rewrite['source_thread_header'])){
				foreach ($xk_rewrite['source_thread_header'] as $key => $value)	{
					$source_thread_header .= $value."\n";
				}
			}
			if(!empty($xk_rewrite['source_thread_tail'])){
				foreach ($xk_rewrite['source_thread_tail'] as $key => $value)	{
					$source_thread_tail .= $value."\n";
				}
			}
			if(!empty($xk_rewrite['source_thread_hidden_text'])){
				foreach ($xk_rewrite['source_thread_hidden_text'] as $key => $value)	{
					$source_thread_hidden_text .= $value."\n";
				}
			}
			if(!empty($xk_rewrite['source_post_header'])){
				foreach ($xk_rewrite['source_post_header'] as $key => $value)	{
					$source_post_header .= $value."\n";
				}
			}
			if(!empty($xk_rewrite['source_post_tail'])){
				foreach ($xk_rewrite['source_post_tail'] as $key => $value)	{
					$source_post_tail .= $value."\n";
				}
			}
			if(!empty($xk_rewrite['source_post_hidden_text'])){
				foreach ($xk_rewrite['source_post_hidden_text'] as $key => $value)	{
					$source_post_hidden_text .= $value."\n";
				}
			}
			if(!empty($xk_rewrite['source_replaces'])){
				foreach ($xk_rewrite['source_replaces'] as $key => $value)	{
					$source_replaces .= $key.'='.$value."\n";
				}
			}
			$xk_rewrite['source_replaces'] = $source_replaces;
			$xk_rewrite['source_title_header'] = $source_title_header;
			$xk_rewrite['source_title_tail'] = $source_title_tail;
			$xk_rewrite['source_thread_header'] = $source_thread_header;
			$xk_rewrite['source_thread_tail'] = $source_thread_tail;
			$xk_rewrite['source_thread_hidden_text'] = $source_thread_hidden_text;
			$xk_rewrite['source_post_header'] = $source_post_header;
			$xk_rewrite['source_post_tail'] = $source_post_tail;
			$xk_rewrite['source_post_hidden_text'] = $source_post_hidden_text;
		} else {
			$source_replaces = getgpc('source_replaces');
			$source_title_header = getgpc('source_title_header');
			$source_title_tail = getgpc('source_title_tail');
			$source_thread_header = getgpc('source_thread_header');
			$source_thread_tail = getgpc('source_thread_tail');
			$source_thread_hidden_text = getgpc('source_thread_hidden_text');
			$source_post_header = getgpc('source_post_header');
			$source_post_tail = getgpc('source_post_tail');
			$source_post_hidden_text = getgpc('source_post_hidden_text');
			$replace_tmp = explode("\n",ixunkuHtmlspecialchars_decode(stripslashes(trim($source_replaces))));
			$source_title_header = explode("\n",ixunkuHtmlspecialchars_decode(stripslashes(trim($source_title_header))));
			$source_title_tail = explode("\n",ixunkuHtmlspecialchars_decode(stripslashes(trim($source_title_tail))));
			$source_thread_header = explode("\n",ixunkuHtmlspecialchars_decode(stripslashes(trim($source_thread_header))));
			$source_thread_tail = explode("\n",ixunkuHtmlspecialchars_decode(stripslashes(trim($source_thread_tail))));
			$source_thread_hidden_text = explode("\n",ixunkuHtmlspecialchars_decode(stripslashes(trim($source_thread_hidden_text))));
			$source_post_header = explode("\n",ixunkuHtmlspecialchars_decode(stripslashes(trim($source_post_header))));
			$source_post_tail = explode("\n",ixunkuHtmlspecialchars_decode(stripslashes(trim($source_post_tail))));
			$source_post_hidden_text = explode("\n",ixunkuHtmlspecialchars_decode(stripslashes(trim($source_post_hidden_text))));
			
			if(!empty($replace_tmp)){
				foreach($replace_tmp as $key=>$value){
					$tmparray = explode('=',$value);
					if (empty($tmparray[0])) continue;
					$replacesArr[$tmparray[0]] = $tmparray[1];
				}
			}
			$rewrite_arr = array(
				'source_replaces' => $replacesArr,
				'source_title_header' => $source_title_header,
				'source_title_tail' => $source_title_tail,
				'source_thread_header' => $source_thread_header,
				'source_thread_tail' => $source_thread_tail,
				'source_thread_hidden_text' => $source_thread_hidden_text,
				'source_post_header' => $source_post_header,
				'source_post_tail' => $source_post_tail,
				'source_post_hidden_text' => $source_post_hidden_text,
			);
			update_rewrite($rewrite_arr);
			cpmsg(lang('plugin/xunku_spider_2012', 'action_success'), dreferer(), 'succeed');
		}
	}elseif($job == 'input') {
		$source_url = (CHARSET == 'gbk') ? $xk_config['server_path']."/data/rewrite/rewrite_gbk.txt" : $source_url = $xk_config['server_path']."/data/rewrite/rewrite_utf8.txt" ;
		$f= fopen($source_url,"r");
		$arr = array();
		while (!feof($f)) {
			$line = trim(fgets($f));
			$tmp = explode('=',$line);
			$arr[$tmp[0]] = $tmp[1];
		}
		fclose($f);
		if($xk_rewrite['source_replaces']!==null) {
			$xk_rewrite['source_replaces'] += $arr;
		}else{
			$xk_rewrite['source_replaces'] = $arr;
		}
		update_rewrite($xk_rewrite);
		cpmsg(lang('plugin/xunku_spider_2012', 'action_success'), dreferer(), 'succeed');
	}
} else {
	cpmsg_error(lang('plugin/xunku_spider_2012', 'network_deny'));
}
include template('xunku_spider_2012:rewrite');
?>