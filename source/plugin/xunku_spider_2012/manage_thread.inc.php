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
$job = getgpc('job');
$source = $baseconfig['global_source'];
$result = $api_client->execute('get_spider_source_byid',array(
														'xk_publickey'=>$xk_publickey,
														'source' => implode(',',$source)
													));	
$source_info = $result['data'];
$select_site = '<select name="type">';
$source_info_now = array();
foreach($source_info as $key=>$value){
	$selected = ($save_config['type'] == $value['id']) ? 'selected' : '';
	$select_site .= '<option value="'.$value['id'].'" '.$selected.'>'.$value['title'].'</option>';
	$source_info_now[$value['unique_key']] = $value;
}
$select_site .= '</select>';
$forum_list = $forum_cate = $forum_type_list = $forum_arr =  array();
$query = DB::query("select f.fid,f.name,f.fup,f.type,ff.threadtypes from ".DB::table('forum_forum')." f left join ".DB::table('forum_forumfield')." ff using(fid) where f.status = '1'");
while($rt = DB::fetch($query)) {
	if ($rt['type'] == 'group') {
		$forum_list[$rt['fid']]['name'] = $rt['name'];
	} elseif ($rt['type'] == 'forum') {
		$forum_arr[$rt['fid']] = $rt['name'];
		$forum_cate[$rt['fid']] = $rt['fup'];
		$forum_list[$rt['fup']]['list'][$rt['fid']]['name'] = $rt['name'];
		if (!empty($rt['threadtypes'])) {
			$forum_list[$rt['fup']]['list'][$rt['fid']]['threadtypes'] = unserialize($rt['threadtypes']);
		}
	} else {
		$forum_arr[$rt['fid']] = $rt['name'];
		$forum_list[$forum_cate[$rt['fup']]]['list'][$rt['fup']]['list'][$rt['fid']]['name'] = $rt['name'];
		if (!empty($rt['threadtypes'])) {
			$forum_list[$forum_cate[$rt['fup']]]['list'][$rt['fup']]['list'][$rt['fid']]['threadtypes'] = unserialize($rt['threadtypes']);
		}
	}
}
$forum_str = '<select name="tfid" onchange="changetypes(this.value)">';
$forumtypes_str = '';
foreach($forum_list as $key=>$value) {
	if (count($value['list']) > 0) {
		$forum_str .= '<option value="'.$key.'">&gt;&gt; '.$value['name'].'</option>';
		foreach($value['list'] as $k=>$v) {
			$forum_str .= '<option value="'.$k.'"> &nbsp;|- '.$v['name'].'</option>';
			$forumtypes_str .= "<div id='type_$k'><option value='0'>".lang('plugin/xunku_spider_2012', 'spider_topic')."</option>";
			foreach($v['threadtypes']['types'] as $kt=>$vt) {
				$forumtypes_str .= '<option value="'.$kt.'">'.$vt.'</option>';
			}
			$forumtypes_str .= "</div>";
			if (count($v['list']) > 0) {
				foreach($v['list'] as $kk=>$vv) {
					$forum_str .= '<option value="'.$kk.'"> &nbsp;|-  &nbsp;|-  '.$vv['name'].'</option>';
					$forumtypes_str .= "<div id='type_$kk'><option value='0'>".lang('plugin/xunku_spider_2012', 'spider_topic')."</option>";
					foreach($vv['threadtypes']['types'] as $kkt=>$vvt) {
						$forumtypes_str .= '<option value="'.$kkt.'">'.$vvt.'</option>';
					}
					$forumtypes_str .= "</div>";
				}
			}
		}
	}
}
$forum_str .= '</select>';
$cms_list = array();
$query = DB::query("select * from ".DB::table('portal_category')." where catid > 0");
while($rt = DB::fetch($query)) {
	if($rt['upid']) {
		$cms_list[$rt['upid']]['child'][$rt['catid']] = $rt;
	} else {
		$cms_list[$rt['catid']] = $rt;
	}
}
$cms_str = '<select name="catid" >';
foreach($cms_list as $value) {
	$cms_str .= '<option value="'.$value['catid'].'">&gt;&gt; '.$value['catname'].'</option>';
	if(count($value['child']) > 0 ) {
		foreach($value['child'] as $v) {
			$cms_str .= '<option value="'.$v['catid'].'"> &nbsp;|-  '.$v['catname'].'</option>';
		}
	}
}
$cms_str .= '</select>';
if (empty($job)) {
	$step = getgpc('step');
	$cmode = intval(getgpc('cmode'));
	if (!$step) {
		if(!$cmode) {
			$page = intval(getgpc('page'));
			$tpcdb = array();
			$page = max(1,$page);
			$perpage = 20;
			$start_limit = ($page - 1) * $perpage;
			$count = DB::result_first("SELECT COUNT(tid) FROM ".DB::table('forum_thread')." WHERE if_spider = 1");
			$multipage = multi($count, $perpage, $page, "$basename&pmod=manage_thread");
			$query = DB::query("SELECT t.tid,t.fid,t.subject,t.author,t.authorid,t.dateline,t.source_key,t.displayorder,p.invisible FROM ".DB::table('forum_thread')." t left join ".DB::table('forum_post')." p on t.tid=p.tid WHERE t.if_spider = 1 and p.first=1 ORDER BY tid DESC limit $start_limit,$perpage");
			while($rt = DB::fetch($query)){
				$posts = DB::result_first("SELECT COUNT(pid) FROM ".DB::table('forum_post')." WHERE tid = ".xkEscape($rt['tid']));
				$rt['postnum'] = $posts;
				$rt['dateline'] = date('Y-m-d H:i:s',$rt['dateline']);
				if($rt['displayorder'] == '-2') {
					$rt['modthreadkey'] = modauthkey($rt['tid']);
				}
				$tpcdb[] = $rt;
			}
		}else{
			$page = intval(getgpc('page'));
			$tpcdb = array();
			$page = max(1,$page);
			$perpage = 20;
			$start_limit = ($page - 1) * $perpage;
			$count = DB::result_first("SELECT COUNT(aid) FROM ".DB::table('portal_article_title')." WHERE if_spider = 1");
			$multipage = multi($count, $perpage, $page, "$basename&pmod=manage_thread&cmode=$cmode");
			$query = DB::query("SELECT t.aid,t.catid,t.username,t.title,t.dateline,t.source_key,c.commentnum FROM ".DB::table('portal_article_title')." t left join ".DB::table('portal_article_count')." c on t.aid=c.aid WHERE t.if_spider = 1 ORDER BY aid DESC limit $start_limit,$perpage");
			while($rt = DB::fetch($query)){
				$rt['dateline'] = date('Y-m-d H:i:s',$rt['dateline']);
				$tpcdb[] = $rt;
			}
			$catids = array();
			$query = DB::query("SELECT catid,catname from ".DB::table('portal_category')." where catid>0");
			while($rt = DB::fetch($query)){
				$catids[$rt['catid']] = $rt['catname'];
			}
		}
	} else {
		$fid = intval(getgpc('tfid'));
		$type = intval(getgpc('type'));
		$perpage = intval(getgpc('perpage'));
		$page = intval(getgpc('page'));
		$tpcdb = array();
		$page = max(1,$page);
		$perpage = max(20,$perpage);
		$start_limit = ($page - 1) * $perpage;
		$where = '';
		if ($fid > 0) {
			$where .= ' and t.fid = '.xkEscape($fid);
		}
		if ($type > 0) {
			$where .= ' and t.source_key = '.xkEscape($source_info[$type]['unique_key']);
		}
		$count = DB::result_first("SELECT COUNT(t.tid) FROM ".DB::table('forum_thread')." t WHERE t.if_spider = 1 $where");
		$multipage = multi($count, $perpage, $page, "$basename&pmod=manage_thread&tfid=$fid&perpage=$perpage&step=2");
		$query = DB::query("SELECT t.tid,t.fid,t.subject,t.author,t.authorid,t.dateline,t.source_key,p.invisible FROM ".DB::table('forum_thread')." t left join ".DB::table('forum_post')." p on t.tid=p.tid WHERE t.if_spider = 1 and p.first=1 $where ORDER BY tid DESC limit $start_limit,$perpage");
		while($rt = DB::fetch($query)){
			$posts = DB::result_first("SELECT COUNT(pid) FROM ".DB::table('forum_post')." WHERE tid = ".xkEscape($rt['tid']));
			$rt['postnum'] = $posts;
			$rt['dateline'] = date('Y-m-d h:i:s',$rt['dateline']);
			$tpcdb[] = $rt;
		}
	}
} elseif($job == 'del') {
	$tid = getgpc('id');
	$cmode = getgpc('cmode');
	if($cmode == 2) {
		DB::query("delete from ".DB::table('portal_article_title')." where aid=".xkEscape($tid));
		DB::query("delete from ".DB::table('portal_article_content')." where aid=".xkEscape($tid));
		DB::query("delete from xk_spider_url where tid=".xkEscape($tid));
		$query = DB::query("select attachid,attachment from ".DB::table('portal_attachment')." where aid=".xkEscape($tid));
		while($rt = DB::fetch($query)) {
			if($_G['setting']['ftp']['on']){
				require_once libfile('class/ftp');
				$ftp = & discuz_ftp::instance();
				$ftp->connect();
				if($ftp->connectid){
					$ftp->ftp_delete($attachment);
				}
			}else{
				@unlink($_G['setting']['attachdir'].'portal/'.$attachment);
			}
		}
	} else {
		DB::query("delete from ".DB::table('forum_thread')." where tid=".xkEscape($tid));
		DB::query("delete from ".DB::table('forum_post')." where tid=".xkEscape($tid));
		DB::query("delete from xk_spider_url where tid=".xkEscape($tid));
		$query = DB::query("select aid,tableid from ".DB::table('forum_attachment')." where tid=".xkEscape($tid));
		while($rt = DB::fetch($query)) {
			$att_table = 'forum_attachment_'.$rt['tableid'];
			$attachment = DB::result_first("select attachment from ".DB::table($att_table)." where aid = ".xkEscape($rt['aid']));
			if($_G['setting']['ftp']['on']){
				require_once libfile('class/ftp');
				$ftp = & discuz_ftp::instance();
				$ftp->connect();
				if($ftp->connectid){
					$ftp->ftp_delete($attachment);
				}
			}else{
				@unlink($_G['setting']['attachdir'].'forum/'.$attachment);
			}
		}
	}
	cpmsg(lang('plugin/xunku_spider_2012', 'action_success'), dreferer(), 'succeed');
}elseif($job == 'pass') {
	$tid = getgpc('id');
	$fid = DB::result_first("select fid from ".DB::table('forum_thread')." where tid=".xkEscape($tid));
	DB::query("update ".DB::table('forum_thread')." set displayorder=0 where tid=".xkEscape($tid));
	C::t('forum_thread')->clear_cache($fid, 'forumdisplay_');
	cpmsg(lang('plugin/xunku_spider_2012', 'action_success'), dreferer(), 'succeed');
}elseif($job == 'multipass'){
	$tids = getgpc('tidarray');
	foreach($tids as $tid) {
		$fid = DB::result_first("select fid from ".DB::table('forum_thread')." where tid=".xkEscape($tid));
		DB::query("update ".DB::table('forum_thread')." set displayorder=0 where tid=".xkEscape($tid));
		C::t('forum_thread')->clear_cache($fid, 'forumdisplay_');
	}	
	cpmsg(lang('plugin/xunku_spider_2012', 'action_success'), dreferer(), 'succeed');
}elseif($job == 'hidden') {
	$tid = getgpc('id');
	DB::query("update ".DB::table('forum_thread')." set if_spider=0 where tid=".xkEscape($tid));
	cpmsg(lang('plugin/xunku_spider_2012', 'action_success'), dreferer(), 'succeed');
}elseif($job == 'multihidden'){
	$tids = getgpc('tidarray');
	foreach($tids as $tid) {
		DB::query("update ".DB::table('forum_thread')." set if_spider=0 where tid=".xkEscape($tid));
		C::t('forum_thread')->clear_cache($fid, 'forumdisplay_');
	}	
	cpmsg(lang('plugin/xunku_spider_2012', 'action_success'), dreferer(), 'succeed');
}elseif($job == 'multidel') {
	$tids = getgpc('tidarray');
	$cmode = getgpc('cmode');
	if($cmode == 2) {
		foreach($tids as $tid) {
			DB::query("delete from ".DB::table('portal_article_title')." where aid=".xkEscape($tid));
			DB::query("delete from ".DB::table('portal_article_content')." where aid=".xkEscape($tid));
			DB::query("delete from xk_spider_url where tid=".xkEscape($tid));
			$query = DB::query("select attachid,attachment from ".DB::table('portal_attachment')." where aid=".xkEscape($tid));
			while($rt = DB::fetch($query)) {
				if($_G['setting']['ftp']['on']){
					require_once libfile('class/ftp');
					$ftp = & discuz_ftp::instance();
					$ftp->connect();
					if($ftp->connectid){
						$ftp->ftp_delete($attachment);
					}
				}else{
					@unlink($_G['setting']['attachdir'].'portal/'.$attachment);
				}
			}
		}	
	}else {
		foreach($tids as $tid) {
			DB::query("delete from ".DB::table('forum_thread')." where tid=".xkEscape($tid));
			DB::query("delete from ".DB::table('forum_post')." where tid=".xkEscape($tid));
			DB::query("delete from xk_spider_url where tid=".xkEscape($tid));
			$query = DB::query("select aid,tableid from ".DB::table('forum_attachment')." where tid=".xkEscape($tid));
			while($rt = DB::fetch($query)) {
				$att_table = 'forum_attachment_'.$rt['tableid'];
				$attachment = DB::result_first("select attachment from ".DB::table($att_table)." where aid = ".xkEscape($rt['aid']));
				if($_G['setting']['ftp']['on']){
					require_once libfile('class/ftp');
					$ftp = & discuz_ftp::instance();
					$ftp->connect();
					if($ftp->connectid){
						$ftp->ftp_delete($attachment);
					}
				}else{
					@unlink($_G['setting']['attachdir'].'forum/'.$attachment);
				}
			}
		}	
	}
	cpmsg(lang('plugin/xunku_spider_2012', 'action_success'), dreferer(), 'succeed');
}
include template('xunku_spider_2012:manage_thread');
?>