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
ini_set ('memory_limit',-1);
ini_set ('max_execution_time',0);
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
if ($network_avaliable) {
	$job = getgpc('job');
	if (empty($job)) {
		$step = getgpc('step');
		$source = $baseconfig['global_source'];
		$result = $api_client->execute('get_spider_source_byid',array(
																'xk_publickey'=>$xk_publickey,
																'source' => implode(',',$source)
															));	
		$source_info = $result['data'];
		if (!$step) {
			if (count($source) > 0) {
			
				$select_site = '<select name="type">';
				foreach($source_info as $key=>$value){
					$selected = ($save_config['type'] == $value['id']) ? 'selected' : '';
					$select_site .= '<option value="'.$value['id'].'" '.$selected.'>'.$value['title'].'</option>';
				}
				$select_site .= '</select>';
			}
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
			$forumtypes_str = $type_info_json = '';
			foreach($forum_list as $key=>$value) {
				if (count($value['list']) > 0) {
					$forum_str .= '<option value="'.$key.'">&gt;&gt; '.$value['name'].'</option>';
					foreach($value['list'] as $k=>$v) {
						$forum_str .= '<option value="'.$k.'"> &nbsp;|- '.$v['name'].'</option>';
						$forumtypes_str .= "<div id='type_$k'><option value='0'>".lang('plugin/xunku_spider_2012', 'spider_topic')."</option>";
						foreach($v['threadtypes']['types'] as $kt=>$vt) {
							$forum_type_list[$k][$kt] = $vt;
							$forumtypes_str .= '<option value="'.$kt.'">'.$vt.'</option>';
						}
						$forumtypes_str .= "</div>";
						if (count($v['list']) > 0) {
							foreach($v['list'] as $kk=>$vv) {
								$forum_str .= '<option value="'.$kk.'"> &nbsp;|-  &nbsp;|-  '.$vv['name'].'</option>';
								$forumtypes_str .= "<div id='type_$kk'><option value='0'>".lang('plugin/xunku_spider_2012', 'spider_topic')."</option>";
								foreach($vv['threadtypes']['types'] as $kkt=>$vvt) {
									$forum_type_list[$kk][$kkt] = $vvt;
									$forumtypes_str .= '<option value="'.$kkt.'">'.$vvt.'</option>';
								}
								$forumtypes_str .= "</div>";
							}
						}
					}
				}
			}
			if (CHARSET == 'gbk') {
				$forum_type_list = xkConvert($forum_type_list,'UTF8','GBK');
			}
			$type_info_json = json_encode($forum_type_list);
			$forum_str .= '</select>';
			
			$cms_list = $cms_list_arr = array();
			$query = DB::query("select * from ".DB::table('portal_category')." where catid > 0");
			while($rt = DB::fetch($query)) {
				$cms_list_arr[$rt['catid']] = $rt;
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


			$joblist = array();
			$query = DB::query('select * from xk_spider_job_later where id >0');
			while($rt = DB::fetch($query)) {
				$joblist[$rt['id']] = $rt;
			}
		} else {
			if ($xk_memberinfo['level'] == 0) {
				cpmsg_error(lang('plugin/xunku_spider_2012', 'level_limit'));
			}
			$type = getgpc('type');
			$tfid = getgpc('tfid');
			$catid = getgpc('catid');
			$to_threadcate = getgpc('to_threadcate');
			$range_auto = getgpc('range_auto');
			$month = getgpc('month');
			$week = getgpc('week');
			$day = getgpc('day');
			$cmode = getgpc('cmode_select');
			if($cmode==2) {
				$tfid = $catid;
			}
			$fid_type = DB::result_first('select type from '.DB::table('forum_forum').' where fid = '.xkEscape($tfid));
			if ($fid_type == 'group' && $cmode == 1) {
				cpmsg_error(lang('plugin/xunku_spider_2012', 'spider_bankuai'));
			}
			if ($day == '*') cpmsg_error(lang('plugin/xunku_spider_2012', 'spider_later_day'));
			$insertArr = array(
				'stype' => $type,
				'fid' => $tfid,
				'modelid' => $to_threadcate,
				'url' => $range_auto,
				'month' => $month,
				'week' => $week,
				'day' => $day,
				'create_date' => date('Y-m-d H:i:s',TIMESTAMP),
				'last_run_date' => date('Y-m-d H:i:s',TIMESTAMP),
				'if_open' => 1,
				'cmode' => $cmode,
			);
			DB::query('insert into xk_spider_job_later set '.xkSqlSingle($insertArr));
			$insert_id = DB::insert_id();
			$result = $api_client->execute('spider_later',array(
																'xk_publickey'=>$xk_publickey,
																'range' => $range_auto,
																'sid' => $type,
																'fid' => $tfid,
																'modelid' => $to_threadcate,
																'tmp_jobid' => $insert_id,
																'month' => $month,
																'week' => $week,
																'day' => $day,
																'cmode' => $cmode,
															));
			if($result['data']['state']) {
				cpmsg(lang('plugin/xunku_spider_2012', 'spider_later_success'), dreferer(), 'succeed');
			} else{
				cpmsg_error(lang('plugin/xunku_spider_2012', 'spider_later_error'));
			}
		}	
	}elseif ($job == 'stop') {
		$id = getgpc('id');
		DB::query('update xk_spider_job_later set if_open = 0 where id = '.xkEscape($id));
		cpmsg(lang('plugin/xunku_spider_2012', 'action_success'), dreferer(), 'succeed');
	}elseif ($job == 'start') {
		$id = getgpc('id');
		DB::query('update xk_spider_job_later set if_open = 1 where id = '.xkEscape($id));
		cpmsg(lang('plugin/xunku_spider_2012', 'action_success'), dreferer(), 'succeed');
	}elseif ($job == 'del') {
		$id = getgpc('id');
		DB::query('delete from xk_spider_job_later where id = '.xkEscape($id));
		$result = $api_client->execute('spider_later_deljob',array(
															'jobid' => $id,
															'xk_publickey'=>$xk_publickey,
														));
		cpmsg(lang('plugin/xunku_spider_2012', 'action_success'), dreferer(), 'succeed');
	}elseif ($job == 'auto_now') {
		require_once (SPIDER_LIBRARY_DIR.'spider.run.php');
		$step = getgpc('step');
		$step = (empty($step)) ? 0 : $step;
		$jobs = array();
		$count = DB::result_first("select count(id) from xk_spider_job_later where if_open=1");
		$query = DB::query("select * from xk_spider_job_later where if_open=1 order by id desc");
		while($rt = DB::fetch($query)) {
			$jobs[] = $rt;
		}
		$build_job = $jobs[$step];
		if($build_job) {
			$source = $baseconfig['global_source'];
			$result = $api_client->execute('get_spider_source_byid',array(
																	'xk_publickey'=>$xk_publickey,
																	'source' => implode(',',$source)
																));	
			$source_info = $result['data'];	
			$configure = array('s_type'=>$source_info[$build_job['stype']]['unique_key']);
			$spider = new spider($configure);
			$threadlist = $spider->t_spider->get_threadlist($build_job['url']);
			$insertArr = array(
				'type' => 1,
				'url'  => $build_job['url'],
				'state' => 0,
				'all_num' => count($threadlist),
				'extinfo' => json_encode(array('fid'=>$build_job['fid'],'modelid'=>$build_job['modelid'],'list'=>$threadlist,'s_type'=>$source_info[$build_job['stype']]['unique_key'],'pinlv'=>1,'cmode'=>$build_job['cmode']))
			);
			DB::query('insert into xk_spider_job set '.xkSqlSingle($insertArr));	
		}
		if($count > $step) {
			$step++;
			cpmsg(lang('plugin/xunku_spider_2012', 'spider_later_auto_success').$step.lang('plugin/xunku_spider_2012', 'spider_later_auto_success_tail'), rtrim($_G['siteurl'],'/').'/'.$basename.'&pmod=spider_later&job=auto_now&step='.$step, 'succeed');	
		}else{
			cpmsg(lang('plugin/xunku_spider_2012', 'spider_now_success'), rtrim($_G['siteurl'],'/').'/'.$basename.'&pmod=spider_now&job=joblist', 'succeed');	
		}
	}
} else {
	cpmsg_error(lang('plugin/xunku_spider_2012', 'network_deny'));
}
include template('xunku_spider_2012:spider_later');
?>