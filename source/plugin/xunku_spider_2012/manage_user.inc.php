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
$api_client = new ApiClient();
$result = $api_client->execute('get_spider_source',array(
														'xk_publickey'=>$xk_publickey,
													));
$source_info = $result['data'];
$job = getgpc('job');
if (empty($job)) {
	$step = getgpc('step');
	$type = getgpc('type');
	if(empty($type)) {
		if (!$step) {
			$page = intval(getgpc('page'));
			$page = max(1,$page);
			$perpage = 20;
			$start_limit = ($page - 1) * $perpage;
			$count = DB::result_first("select count(uid) from ".DB::table('common_member')." where if_robot = 1");
			$multipage = multi($count, $perpage, $page, "$basename&pmod=manage_user");
			$memberlist = array();
			$query = DB::query("select m.uid,m.username,m.email,m.regdate,mc.threads,mc.posts from ".DB::table('common_member')." m left join ".DB::table('common_member_count')." mc on m.uid=mc.uid where m.if_robot = 1 order by m.uid desc limit $start_limit,$perpage");
			while($rt = DB::fetch($query)) {
				$rt['regdate'] = date('Y-m-d H:i:s',$rt['regdate']);
				$memberlist[$rt['uid']] = $rt;
			}
		} else {
			$uid = getgpc('id');
			loaducenter();
			if ($uid > 0) {
				uc_user_delete($uid);
				DB::query("delete from ".DB::table('common_member')." where uid =".xkEscape($uid));
				DB::query("delete from ".DB::table('common_member_count')." where uid =".xkEscape($uid));
				DB::query("delete from ".DB::table('common_member_field_forum')." where uid =".xkEscape($uid));
				DB::query("delete from ".DB::table('common_member_field_home')." where uid =".xkEscape($uid));
				DB::query("delete from ".DB::table('common_member_profile')." where uid =".xkEscape($uid));
				DB::query("delete from ".DB::table('common_member_status')." where uid =".xkEscape($uid));
				DB::query("delete from ".DB::table('forum_thread')." where authorid =".xkEscape($uid));
				DB::query("delete from ".DB::table('forum_post')." where authorid =".xkEscape($uid));
			}
			cpmsg(lang('plugin/xunku_spider_2012', 'action_success'), dreferer(), 'succeed');
		}
	} elseif($type == 'faceku') {
		$face_path = D_P.'data/plugindata/xk_face.php';
		@unlink($face_path);
		cpmsg(lang('plugin/xunku_spider_2012', 'action_success'), dreferer(), 'succeed');
	} elseif($type == 'export_majia') {
		$majia_num = getgpc('majia_num');
		$majia_list = array();
		$majia_str = '';
		$limit = 'limit 0,'.intval($majia_num);
		$query = DB::query("select username from ".DB::table('common_member')." where if_robot = 1 $limit");
		while($rt = DB::fetch($query)) {
			$majia_list[] = $rt['username'];
			$majia_str .= $rt['username'].',';
		}
		$majia_str = substr($majia_str,0,-1);
	} elseif($type == 'majia_face_multi') {
		require_once(SPIDER_LIBRARY_DIR.'base/xkimage.class.php');
		require_once(SPIDER_LIBRARY_DIR.'base/snoopy.class.php');
		$face_path = D_P.'data/plugindata/xk_face.php';
		if(is_file($face_path)){
			require_once($face_path);
		} else {
			$face_url = $xk_config['server_path']."/data/face/face.php";
			$face_content = file_get_contents($face_url);
			writeover($face_path,"<?php\r\n".$face_content."\r?>");
			require_once($face_path);
		}
		$timeout = 1000;
		$page = getgpc('page');
		$face_min = getgpc('face_min');
		$face_max = getgpc('face_max');
		$perpage = 1;
		$page = (empty($page)) ? 1 : $page;
		$start_limit = $perpage * ($page-1);
		$allpage = ($face_max-$face_min)/$perpage;
		$process = $page / $allpage *100;
		$query = DB::query("select uid from ".DB::table('common_member')." where if_robot = 1 and uid > $face_min and uid < $face_max limit $start_limit,$perpage");
		while($rt = DB::fetch($query)) {
			$tmpuid = array_rand($xkface);
			face_local($xkface[$tmpuid],$rt['uid']);
		}
		if($page<$allpage) $page = $page+1;
	} elseif($type == 'majia_face_single') {
		require_once(SPIDER_LIBRARY_DIR.'base/xkimage.class.php');
		require_once(SPIDER_LIBRARY_DIR.'base/snoopy.class.php');
		$face_path = D_P.'data/plugindata/xk_face.php';
		if(is_file($face_path)){
			require_once($face_path);
		} else {
			$face_url = $xk_config['server_path']."/data/face/face.php";
			$face_content = file_get_contents($face_url);
			writeover($face_path,"<?php\r\n".$face_content."\r?>");
			require_once($face_path);
		}
		$uid = getgpc('id');
		$tmpuid = array_rand($xkface);
		face_local($xkface[$tmpuid],$uid);
		cpmsg(lang('plugin/xunku_spider_2012', 'action_success'), dreferer(), 'succeed');
	}
} elseif ($job == 'muldel') {
	$uids = getgpc('uidarray');
	foreach($uids as $uid) {
		loaducenter();
		if ($uid > 0) {
			uc_user_delete($uid);
			DB::query("delete from ".DB::table('common_member')." where uid =".xkEscape($uid));
			DB::query("delete from ".DB::table('common_member_count')." where uid =".xkEscape($uid));
			DB::query("delete from ".DB::table('common_member_field_forum')." where uid =".xkEscape($uid));
			DB::query("delete from ".DB::table('common_member_field_home')." where uid =".xkEscape($uid));
			DB::query("delete from ".DB::table('common_member_profile')." where uid =".xkEscape($uid));
			DB::query("delete from ".DB::table('common_member_status')." where uid =".xkEscape($uid));
			DB::query("delete from ".DB::table('forum_thread')." where authorid =".xkEscape($uid));
			DB::query("delete from ".DB::table('forum_post')." where authorid =".xkEscape($uid));
		}
	}
	cpmsg(lang('plugin/xunku_spider_2012', 'action_success'), dreferer(), 'succeed');
}
include template('xunku_spider_2012:manage_user');
?>