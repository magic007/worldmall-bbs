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
require_once(SPIDER_LIBRARY_DIR.'base/xkimage.class.php');
require_once(D_P.'data/plugindata/xk_face.php');

$api_client = new ApiClient();
$network_avaliable = 1;
if ($network_avaliable) {
	$job = getgpc('job');
	if (empty($job)) {
		check_ownkey();
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
					$select_site .= '<option value="'.$value['id'].':'.$value['unique_key'].':'.$value['pinlv'].'" '.$selected.'>'.$value['title'].'</option>';
				}
				$select_site .= '</select>';
			}
			$forum_list = $forum_cate = $forum_type_list = array();
			$query = DB::query("select f.fid,f.name,f.fup,f.type,ff.threadtypes from ".DB::table('forum_forum')." f left join ".DB::table('forum_forumfield')." ff using(fid) where f.status = '1'");
			while($rt = DB::fetch($query)) {
				if ($rt['type'] == 'group') {
					$forum_list[$rt['fid']]['name'] = $rt['name'];
				} elseif ($rt['type'] == 'forum') {
					$forum_cate[$rt['fid']] = $rt['fup'];
					$forum_list[$rt['fup']]['list'][$rt['fid']]['name'] = $rt['name'];
					if (!empty($rt['threadtypes'])) {
						$forum_list[$rt['fup']]['list'][$rt['fid']]['threadtypes'] = unserialize($rt['threadtypes']);
					}
				} else {
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
			$ifcheck_Y = (!$save_config['ifcheck']) ? 'checked' : '';
			$ifcheck_N = (!$save_config['ifcheck']) ? '' : 'checked';

			$today_count_1 = (in_array('1',$save_config['today_count'])) ? 'checked' : '';
			$today_count_2 = (in_array('2',$save_config['today_count'])) ? 'checked' : '';

			$localuser_Y = ($save_config['localuser']) ? 'checked' : '';
			$localuser_N = ($save_config['localuser']) ? '' : 'checked';

			$local_att_Y = ($save_config['local_att']) ? 'checked' : '';
			$local_att_N = ($save_config['local_att']) ? '' : 'checked';

			$moniposttime_Y = ($save_config['moniposttime']) ? 'checked' : '';
			$moniposttime_N = ($save_config['moniposttime']) ? '' : 'checked';

			$replay_Y = ($save_config['replay']) ? 'checked' : '';
			$replay_N = ($save_config['replay']) ? '' : 'checked';

			$replay_try_Y = ($save_config['replay_try']) ? 'checked' : '';
			$replay_try_N = ($save_config['replay_try']) ? '' : 'checked';

			$replay_own_Y = ($save_config['replay_own']) ? 'checked' : '';
			$replay_own_N = ($save_config['replay_own']) ? '' : 'checked';

			$majia_1 = (in_array('1',$save_config['majia'])) ? 'checked' : '';
			$majia_2 = (in_array('2',$save_config['majia'])) ? 'checked' : '';
			$majia_3 = (in_array('3',$save_config['majia'])) ? 'checked' : '';

			$wyc_replace_Y = ($save_config['wyc_replace']) ? 'checked' : '';
			$wyc_replace_N = ($save_config['wyc_replace']) ? '' : 'checked';

			$wyc_1 = (in_array('1',$save_config['wyc'])) ? 'checked' : '';
			$wyc_2 = (in_array('2',$save_config['wyc'])) ? 'checked' : '';
			$wyc_3 = (in_array('3',$save_config['wyc'])) ? 'checked' : '';
			$wyc_4 = (in_array('4',$save_config['wyc'])) ? 'checked' : '';
			$wyc_5 = (in_array('5',$save_config['wyc'])) ? 'checked' : '';
			$wyc_6 = (in_array('6',$save_config['wyc'])) ? 'checked' : '';
			$wyc_7 = (in_array('7',$save_config['wyc'])) ? 'checked' : '';
			$wyc_8 = (in_array('8',$save_config['wyc'])) ? 'checked' : '';
			$save_config['view_num_min'] = (empty($save_config['view_num_min'])) ? 300 : $save_config['view_num_min'];
			$save_config['view_num_max'] = (empty($save_config['view_num_max'])) ? 500 : $save_config['view_num_max'];
		} else {
			$type = getgpc('type');
			$ifcheck = getgpc('ifcheck');
			$today_count = getgpc('today_count');
			$localuser = getgpc('localuser');
			$local_att = getgpc('local_att');
			$moniposttime = getgpc('moniposttime');
			$replay = getgpc('replay');
			$replay_try = getgpc('replay_try');
			$replay_own = getgpc('replay_own');
			$majia = getgpc('majia');
			$replay_all = getgpc('replay_all');
			$replay_perpage = getgpc('replay_perpage');
			$tfid = getgpc('tfid');
			$to_threadcate = getgpc('to_threadcate');
			$range_single = getgpc('range_single');
			$range_multi = getgpc('range_multi');
			$range_single_cms = getgpc('range_single_cms');
			$range_multi_cms = getgpc('range_multi_cms');
			$wyc_replace = getgpc('wyc_replace');
			$wyc = getgpc('wyc');
			$tpc_time = getgpc('tpc_time');
			$post_time_min = getgpc('post_time_min');
			$post_time_max = getgpc('post_time_max');
			$view_num_min = getgpc('view_num_min');
			$view_num_max = getgpc('view_num_max');
			$filter_username = getgpc('filter_username');
			$filter_keywords = getgpc('filter_keywords');
			$filter_username_cai = getgpc('filter_username_cai');
			$filter_keywords_cai = getgpc('filter_keywords_cai');
			$catid = getgpc('catid');
			$cmode = getgpc('cmode_select');
			//$ifcheck = 0;
			($ifcheck === null) && $ifcheck = 0;
			($replay_try === null) && $replay_try = 0;
			(empty($replay_all)) && $replay_all = 100;
			list($type,$unique,$pinlv) = explode(':',$type);
			if(!$replay) {
				$replay = 1;
				$replay_all = 1;
			}
			save_config();
			$fid_type = DB::result_first('select type from '.DB::table('forum_forum').' where fid = '.xkEscape($tfid));
			if($cmode == 2) {
				$range_single = $range_single_cms;
				$range_multi = $range_multi_cms;
				$tfid = $catid;
			} 
			if ($fid_type == 'group' && $cmode == 1) {
				cpmsg_error(lang('plugin/xunku_spider_2012', 'spider_bankuai'));
			} elseif (empty($range_single) && empty($range_multi)) {
				cpmsg_error(lang('plugin/xunku_spider_2012', 'spider_now_range'));
			}
			if ($tfid && $cmode == 1) {
				if ($_G['setting']['version'] == 'X2.5') {
					$forumdata = array('allowhtml' => 1);
					C::t('forum_forum')->update($tfid, $forumdata);	
				} else {
					$forumdata = array('allowhtml' => 1);
					DB::update('forum_forum', $forumdata, "fid='$tfid'");
					updatecache('forum');
				}
			}
			
			if (!empty($range_single)) {
				$insertArr = array(
					'type' => 0,
					'url'  => $range_single,
					'state' => 0,
					'extinfo' => json_encode(array('cmode'=>$cmode))
				);
				DB::query("insert into xk_spider_job SET ".xkSqlSingle($insertArr));
				$tmp_jobid = DB::insert_id();
				$modelid = $to_threadcate;
				$result = $api_client->execute('spider_now',array(
															'xk_publickey'=>$xk_publickey,
															'range' => $range_single,
															'spider_type' => 0,
															'sid' => $type,
															'fid' => $tfid,
															'modelid' => $modelid,
															'tmp_jobid' => $tmp_jobid
														));
			}
			$modelid = ($to_subtype > 0) ? $to_subtype : $to_threadcate;
			if (!empty($range_multi)) {
				require_once (SPIDER_LIBRARY_DIR.'spider.run.php');
				ini_set ('memory_limit',-1);
				$configure = array('s_type'=>$source_info[$type]['unique_key']);
				$range_multi_arr = explode(',',$range_multi);
				$spider = new spider($configure);
				foreach($range_multi_arr as $range_multi) {
					if(strpos($range_multi,'{')!==false && strpos($range_multi,'}')!==false) {
						preg_match("/\{(.*)\}/",$range_multi,$arr_tmp);
						list($min,$max) = explode('|',$arr_tmp[1]);
						$min = intval($min);
						$max = intval($max);
						for($i = $min;$i <= $max; $i++) {
							$range_multi_tmp = str_replace($arr_tmp[0],$i,$range_multi);
							$threadlist = $spider->t_spider->get_threadlist($range_multi_tmp);
							$insertArr = array(
								'type' => 1,
								'url'  => $range_multi_tmp,
								'state' => 0,
								'all_num' => count($threadlist),
								'extinfo' => json_encode(array('fid'=>$tfid,'modelid'=>$modelid,'list'=>$threadlist,'s_type'=>$unique,'pinlv'=>$pinlv,'cmode'=>$cmode))
							);
							DB::query('insert into xk_spider_job set '.xkSqlSingle($insertArr));
							$tmp_jobid = DB::insert_id();	
						}
					} else {
						$threadlist = $spider->t_spider->get_threadlist($range_multi);
						$insertArr = array(
							'type' => 1,
							'url'  => $range_multi,
							'state' => 0,
							'all_num' => count($threadlist),
							'extinfo' => json_encode(array('fid'=>$tfid,'modelid'=>$modelid,'list'=>$threadlist,'s_type'=>$unique,'pinlv'=>$pinlv,'cmode'=>$cmode))
						);
						DB::query('insert into xk_spider_job set '.xkSqlSingle($insertArr));
						$tmp_jobid = DB::insert_id();	
					}
				}
				$outline = true;
			}
			if ($outline) {
				cpmsg(lang('plugin/xunku_spider_2012', 'spider_now_success'), rtrim($_G['siteurl'],'/').'/'.$basename.'&pmod=spider_now&job=joblist&jobid='.$tmp_jobid, 'succeed');	
			} else {
				cpmsg(lang('plugin/xunku_spider_2012', 'spider_now_success'), rtrim($_G['siteurl'],'/').'/'.$basename.'&pmod=spider_now&job=joblist', 'succeed');
			}
		}	
	} elseif ($job == 'joblist') {
		$jobid = getgpc('jobid');
		$tid = getgpc('tid');
		$nowpage = getgpc('nowpage');
		$allpage = getgpc('allpage');
		$joblist = array();
		$query = DB::query('select * from xk_spider_job where if_finish = 0');
		while($rt = DB::fetch($query)) {
			if ($rt['type'] == 0) {
				$rt['process'] = intval($rt['per_num']/$rt['per_all']*100);
				($rt['state'] == 0) && $rt['showmsg'] = lang('plugin/xunku_spider_2012', 'spider_now_state0');
				($rt['state'] == 1) && $rt['showmsg'] = lang('plugin/xunku_spider_2012', 'spider_now_state1');
				($rt['state'] == 2) && $rt['showmsg'] = lang('plugin/xunku_spider_2012', 'spider_now_state2');
				($rt['state'] == 3) && $rt['showmsg'] = lang('plugin/xunku_spider_2012', 'spider_now_state3_1').'<span style="color:red">'.$rt['per_num'].'</span>'.lang('plugin/xunku_spider_2012', 'spider_now_state3_2').'<br><a href="forum.php?mod=viewthread&tid='.$rt['tid'].'" target="_blank">'.lang('plugin/xunku_spider_2012', 'spider_now_state3_3').'</a>';
			}else{
				$rt['process'] = intval($rt['current_num']/$rt['all_num']*100);
				$rt['showmsg'] = lang('plugin/xunku_spider_2012', 'spider_now_state3_4').'<span style="color:blue">'.$rt['all_num'].'</span>'.lang('plugin/xunku_spider_2012', 'spider_now_state3_5').'<span style="color:red">'.$rt['current_num'].'</span>'.lang('plugin/xunku_spider_2012', 'spider_now_state3_6').'<span style="color:red">'.$nowpage.'</span>'.lang('plugin/xunku_spider_2012', 'spider_now_state3_7');
			}
			$joblist[] = $rt;
		}
		$timeout = 5000;
		if ($jobid > 0) {
			$jobinfo = DB::fetch_first("select * from xk_spider_job where id = ".xkEscape($jobid));
			$extinfo = $jobinfo['extinfo'];
			$extinfo = json_decode($extinfo,true);
			$forumname = DB::result_first("select name from ".DB::table('forum_forum')." where fid = ".xkEscape($extinfo['fid']));
			$timeout = $extinfo['pinlv']*1000;
			require_once (SPIDER_LIBRARY_DIR.'spider.run.php');
			require_once(SPIDER_LIBRARY_DIR.'api/ApiClient.php');
			$api_client = new ApiClient();
			$configure = array('s_type'=>$extinfo['s_type'],'s_type_v'=>1,'range'=>$extinfo['list'][$jobinfo['current_num']],'fid'=>$extinfo['fid'],'fname'=>$forumname,'ttype'=>$extinfo['modelid'],'jobid'=>$jobid,'spider_type'=>1,'cmode'=>$extinfo['cmode']);
			$tid = (empty($tid)) ? 0 : intval($tid);
			$nowpage = (empty($nowpage)) ? 1 : intval($nowpage);
			$allpage = (empty($allpage)) ? 0 : intval($allpage);
			$spider = new spider($configure);
			list($tid,$allpage,$nowpage) = $spider->t_spider->run_s($tid,$nowpage,$allpage);
			if ($nowpage > $allpage) {
				$tid = 0;
				if ($jobinfo['current_num'] > $jobinfo['all_num']) {
					DB::query("update xk_spider_job set if_finish = 1 where id=".xkEscape($jobid));
				}
				$nowpage = 1;
				$allpage = 0;
			}
			if ($jobinfo['if_finish']) {
				$jobid = DB::result_first("select id from xk_spider_job where type = 1 and if_finish = 0 order by id desc limit 0,1");
			}
		}
		$jobid = DB::result_first("select id from xk_spider_job where type = 1 and if_finish = 0 order by id desc limit 0,1");
	} elseif ($job == 'stopjob') {
		$jobid = getgpc('jobid');
		DB::query('update xk_spider_job set if_finish=1 where id = '.xkEscape($jobid));
		$result = $api_client->execute('spider_stop_now',array(
															'xk_publickey'=>$xk_publickey,
															'tmp_jobid' => $jobid
														));
		cpmsg(lang('plugin/xunku_spider_2012', 'action_success'), dreferer(), 'succeed');
	}
} else {
	cpmsg_error(lang('plugin/xunku_spider_2012', 'network_deny'));
}
include template('xunku_spider_2012:spider_now');
?>