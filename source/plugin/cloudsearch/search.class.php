<?php

/**
 *      [Discuz! X] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: search.class.php 30263 2012-05-17 13:44:07Z zhouxiaobo $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}


class plugin_cloudsearch {

	// 是否已开通纵横搜索服务
	protected $allow = FALSE;

	protected $allow_hot_topic = FALSE;
	protected $allow_thread_related = FALSE;
	protected $allow_forum_recommend = FALSE;
	protected $allow_forum_related = FALSE;
	protected $allow_collection_related = FALSE;
	protected $allow_search_suggest = FALSE;

	public function plugin_cloudsearch() {
		global $_G, $searchparams;

		$cloudAppService = Cloud::loadClass('Service_App');
		$this->allow = $cloudAppService->getCloudAppStatus('search');
		if($this->allow) {
			$this->allow_hot_topic = $_G['setting']['my_search_data']['allow_hot_topic'];
			$this->allow_thread_related = $_G['setting']['my_search_data']['allow_thread_related'];
			$this->allow_forum_recommend = $_G['setting']['my_search_data']['allow_forum_recommend'];
			$this->allow_forum_related = $_G['setting']['my_search_data']['allow_forum_related'];
			$this->allow_collection_related = $_G['setting']['my_search_data']['allow_collection_related'];
			$this->allow_search_suggest = $_G['setting']['my_search_data']['allow_search_suggest'];
			$this->allow_thread_related_bottom = $_G['setting']['my_search_data']['allow_thread_related_bottom'];
			include_once template('cloudsearch:module');

			if (!$searchparams) {
				// 减少论坛搜索框跳转次数
				$searchHelper = Cloud::loadClass('Cloud_Service_SearchHelper');
				$searchparams = $searchHelper->makeSearchSignUrl();
			}
		}
	}

	public function common() {
		if(!$this->allow) {
			return;
		}

		// 结果页点击某个回帖已被删除时，写帖子的redelete
		if ($_GET['mod'] == 'redirect' && $_GET['goto'] == 'findpost' && $_GET['ptid'] && $_GET['pid']) {
			$post = get_post_by_pid($_GET['pid']);
			if (empty($post)) {
				$searchHelper = Cloud::loadClass('Cloud_Service_SearchHelper');
				$searchHelper->myPostLog('redelete', array('pid' => $_GET['pid']));
			}
		}
	}

	public function global_footer() {
		if(!$this->allow) {
			return;
		}

		$res = '';
		// 主题相关帖
		if(($this->allow_thread_related && $GLOBALS['page'] == 1 || $this->allow_thread_related_bottom) && CURSCRIPT == 'forum' && CURMODULE == 'viewthread') {
			$res = tpl_cloudsearch_global_footer_related();
		}

		// mini结果页
		if(CURSCRIPT == 'forum' && (CURMODULE == 'viewthread' || CURMODULE == 'forumdisplay')) {
			$res .= tpl_cloudsearch_global_footer_mini();
		}
		
		// 搜索框提示功能
		if ($this->allow_search_suggest) {
			// 提示js算签名（除了q以外的所有参数）
			$params = array(
			                'callback' => 'cloudsearch_suggest_callback'
			               );
			$util = Cloud::loadClass('Cloud_Service_Util');
			$queryString = $util->generateSiteSignUrl($params, true, true);
			// 搜索框的suggest提示js
			$res .= tpl_cloudsearch_global_footer_suggest($queryString);
		}
		// 请求获取禁搜有权限表达式版块
		$res .= tpl_cloudsearch_global_footer_formula_output();

		return $res;
	}

	/**
	 * 看帖页管理员管理主题
	 */
	public function topicadmin_message($params) {
		if(!$this->allow || !$params) {
			return;
		}

		$param = $params['param'];
		if($param[0] == 'admin_succeed') {
			$searchHelper = Cloud::loadClass('Cloud_Service_SearchHelper');
			$action = $_GET['action'];

			switch($action) {
				// 操作主题: 'stick', 'highlight', 'digest', 'bump', 'down', 'delete', 'move', 'close', 'open'
				case 'moderate':
					global $operations;
					$moderate = empty($_GET['moderate']) ? array() : $_GET['moderate'];

					foreach($moderate as $tid) {
						if(!$tid = max(0, intval($tid))) {
							continue;
						}

						foreach($operations as $operation) {
							if(in_array($operation, array('stick', 'highlight', 'digest', 'bump', 'down', 'delete', 'move', 'close', 'open'))) {

								if($operation == 'stick') {
									$my_opt = $_GET['sticklevel'] ? 'sticky' : 'update';
								} elseif($operation == 'digest') {
									$my_opt = $_GET['digestlevel'] ? 'digest' : 'update';
								} elseif($operation == 'highlight') {
									$my_opt = $_GET['highlight_color'] ? 'highlight' : 'update';
								} else {
									$my_opt = $operation;
								}

								$data = array('tid' => $tid);
								if($my_opt == 'move' && $_GET['moveto']) {
									global $toforum;
									$data['otherid'] = $toforum['fid'];
								}

								$searchHelper->myThreadLog($my_opt, $data);
							}
						}
					}
					break;

				// 屏蔽主题
				case 'banpost':
					global $posts;

					$banned = intval($_GET['banned']);
					foreach($posts as $post) {
						if ($banned) {
							$searchHelper->myPostLog('ban', array('pid' => $post['pid'], 'uid' => $post['authorid']));
						} else {
							$searchHelper->myPostLog('unban', array('pid' => $post['pid'], 'uid' => $post['authorid']));
						}
					}
					break;

				// 合并主题
				case 'merge':
					global $_G, $thread;
					$othertid = intval($_GET['othertid']);

					if ($thread) {
						$searchHelper->myThreadLog('merge', array('tid' => $othertid, 'otherid' => $_G['tid'], 'fid' => $thread['fid']));
					}
					break;

				// 切分主题
				case 'split':
					global $_G, $pids;

					$searchHelper->myThreadLog('split', array('tid' => $_G['tid']));

					foreach((array)explode(',', $pids) as $pid) {
						$searchHelper->myPostLog('split', array('pid' => $pid));
					}
					break;

				// 警告主题
				case 'warn':
					global $warned, $posts;

					foreach((array)$posts as $k => $post) {
						if($warned && !($post['status'] & 2)) {
							$searchHelper->myPostLog('warn', array('pid' => $post['pid'], 'uid' => $post['authorid']));
						} elseif(!$warned && ($post['status'] & 2)) {
							$searchHelper->myPostLog('unwarn', array('pid' => $post['pid'], 'uid' => $post['authorid']));
						}
					}
					break;

				default:
					break;
			}
		}
	}

	/**
	 * 管理面板操作
	 */
	public function modcp_message($params) {
		if(!$this->allow || !$params) {
			return;
		}

		$param = $params['param'];
		if(in_array($param[0], array('modcp_member_ban_succeed', 'modcp_mod_succeed', 'modcp_recyclebin_restore_succeed', 'modcp_recyclebin_delete_succeed'))) {
			$searchHelper = Cloud::loadClass('Cloud_Service_SearchHelper');
			$action = $_GET['action'];

			switch($action) {
				// 版主禁止会员管理
				case 'member':
					global $groupidnew, $member;

					$my_opt = in_array($groupidnew, array(4, 5)) ? 'banuser' : 'unbanuser';
					$searchHelper->myThreadLog($my_opt, array('uid' => $member['uid']));
					break;

				// 审核主题、帖子
				case 'moderate':
					global $op, $postlist;

					if($op == 'replies') {
						global $postlist;

						foreach((array)$postlist as $post) {
							$searchHelper->myPostLog('validate', array('pid' => $post['pid']));
						}
					} else {
						global $moderation;

						foreach((array)$moderation['validate'] as $tid) {
							$searchHelper->myThreadLog('validate', array('tid' => $tid));
						}
					}
					break;

				// 回收主题
				case 'recyclebin':
					if(!empty($_GET['moderate'])) {
						global $_G;

						foreach(C::t('forum_thread')->fetch_all_by_tid_displayorder($_GET['moderate'], -1, '=', $_G['fid']) as $tid) {
							if($op == 'restore') {
								$searchHelper->myThreadLog('restore', array('tid' => $tid['tid']));
							} elseif($op == 'delete' && $_G['group']['allowclearrecycle']) {
								$searchHelper->myPostLog('delete', array('tid' => $tid['tid']));
							}
						}
					}
					break;

				default:
					break;
			}
		}
	}

	/**
	 * 看帖页回调 - 主题不存在时
	 */
	public function viewthread_message($params) {
		if(!$this->allow || !$params) {
			return;
		}

		$param = $params['param'];
		if ($param[0] == 'thread_nonexistence' && $_GET['tid']) {
			//看到已删除的主题时，插入一条变化记录
			$searchHelper = Cloud::loadClass('Cloud_Service_SearchHelper');
			$searchHelper->myThreadLog('redelete', array('tid' => $_GET['tid']));
		}
	}

	public function space_message($params) {
		if(!$this->allow || !$params) {
			return;
		}

		$param = $params['param'];
		if ($param[0] == 'thread_delete_succeed') {
			global $moderate;

			$searchHelper = Cloud::loadClass('Cloud_Service_SearchHelper');
			foreach((array)$moderate as $tid) {
				$searchHelper->myThreadLog('delete', array('tid' => $tid));
			}
		}
	}

	public function post_message($params) {
		if(!$this->allow || !$params) {
			return;
		}

		global $_G, $isfirstpost, $pid, $modnewthreads, $pinvisible;
		$param = $params['param'];
		$searchHelper = Cloud::loadClass('Cloud_Service_SearchHelper');
		if($param[0] == 'post_edit_delete_succeed' && !empty($_GET['delete']) && $isfirstpost) {
			$searchHelper->myThreadLog('delete', array('tid' => $_G['tid']));
		} elseif($param[0] == 'post_edit_delete_succeed' && !empty($_GET['delete'])) {
			$searchHelper->myPostLog('delete', array('pid' => $pid));
		} elseif($param[0] == 'post_edit_succeed' && !$modnewreplies && $pinvisible != -3) {
			$searchHelper->myPostLog('update', array('pid' => $pid));
		}
	}

	/**
	 * 删除用户回调
	 */
	public function deletemember($params) {
		$uids = $params['param'][0];
		$step = $params['step'];

		if($step == 'delete' && is_array($uids)) {
			$searchHelper = Cloud::loadClass('Cloud_Service_SearchHelper');
			foreach($uids as $uid) {
				$searchHelper->myThreadLog('deluser', array('uid' => $uid));
			}
		}
	}

	/**
	 * 删除帖子回调
	 */
	public function deletepost($params) {
		$pids = $params['param'][0];
		$idtype = $params['param'][1];
		$step = $params['step'];

		if($step == 'delete' && $idtype == 'pid' && is_array($pids)) {
			$searchHelper = Cloud::loadClass('Cloud_Service_SearchHelper');
			foreach($pids as $pid) {
				$searchHelper->myPostLog('delete', array('pid' => $pid));
			}
		}
	}

	/**
	 * 删除主题回调
	 */
	public function deletethread($params) {
		$tids = $params['param'][0];
		$step = $params['step'];

		if($step == 'delete' && is_array($tids)) {
			$searchHelper = Cloud::loadClass('Cloud_Service_SearchHelper');
			foreach($tids as $tid) {
		        $searchHelper->myThreadLog('delete', array('tid' => $tid));
	        }
		}
	}

	/**
	 * 恢复主题回调
	 */
	public function undeletethreads($params) {
		$tids = $params['param'][0];

		if(is_array($tids)) {
			$searchHelper = Cloud::loadClass('Cloud_Service_SearchHelper');
			foreach($tids as $tid) {
				$searchHelper->myThreadLog('restore', array('tid' => $tid));
			}
		}
	}

	/**
     * 回帖回收站恢复回帖回调
     */
	public function recyclebinpostundelete($params) {
		$pids = $params['param'][0];

		if(is_array($pids)) {
			$searchHelper = Cloud::loadClass('Cloud_Service_SearchHelper');
			foreach($pids as $pid) {
				$searchHelper->myPostLog('restore', array('pid' => $pid));
			}
		}
	}

	/**
     * 发帖保存草稿的回调
     */
	public function threadpubsave($params) {
		global $thread;
		$step = $params['step'];
		$posts = $params['posts'];

		if($step == 'save') {
			$searchHelper = Cloud::loadClass('Cloud_Service_SearchHelper');
			if ($thread['tid']) {
				$searchHelper->myThreadLog('update', array('tid' => $thread['tid']));
			}

			if($thread['replies'] && is_array($posts)) {
				foreach($posts as $post) {
					$searchHelper->myPostLog('update', array('pid' => $post['pid']));
				}
			}
		}
	}
}

class plugin_cloudsearch_member extends plugin_cloudsearch {

}

class plugin_cloudsearch_forum extends plugin_cloudsearch {

	/**
	 * 论坛首页热门话题
	 */
	public function index_catlist_top_output() {
		if(!$this->allow || !$this->allow_hot_topic) {
			return;
		}

		global $searchparams;

		$searchHelper = Cloud::loadClass('Service_SearchHelper');
		$recwords = $searchHelper->getRecWords(14, 'assoc');
		$srchotquery = '';
		if(!empty($searchparams['params'])) {
			foreach($searchparams['params'] as $key => $value) {
				$srchotquery .= '&' . $key . '=' . rawurlencode($value);
			}
		}
		return tpl_cloudsearch_index_top($recwords, $searchparams, $srchotquery);
	}

	/**
	 * 帖子内容页输出空的相关帖的div
	 */
	public function viewthread_modaction_output() {
		if(!$this->allow_thread_related) {
			return;
		}
		global $_G;

		if($GLOBALS['page'] == 1 && $_G['forum_firstpid'] && $GLOBALS['postlist'][$_G['forum_firstpid']]['invisible'] == 0) {
			return tpl_cloudsearch_viewthread_modaction_output();
		}
	}

	/**
	 * 淘帖 - 搜索相关主题 链接开关
	 */
	public function collection_viewoptions_output() {
		if(!$this->allow) {
			return;
		}
		global $_G;

		if($GLOBALS['permission'] || $GLOBALS['isteamworkers']) {
			return tpl_cloudsearch_collection_viewoptions_output();
		}
	}

	/**
	 * 淘帖 - 搜索相关主题
	 */
	public function collection_relatedop_output() {
		if(!$this->allow || $GLOBALS['op'] != 'related') {
			return;
		}
		global $_G;

		if(!$GLOBALS['permission'] && !$GLOBALS['isteamworkers']) {
			showmessage('undefined_action', NULL);
		}
		$_GET['keyword'] = trim($_GET['keyword']);
		$gKeyword = $_GET['keyword'] ? $_GET['keyword'] : $_G['collection']['name'];

		$tids = array();

		$searchHelper = Cloud::loadClass('Service_SearchHelper');
		$cloudData = $searchHelper->getRelatedThreadsTao($gKeyword, $_G['page'], $_G['tpp']);

		if($cloudData['result']['data']) {
			foreach ($cloudData['result']['ad']['content'] as $sAdv) {
				$threadlist[] = array('icon' => (string)$cloudData['result']['ad']['icon']) + $sAdv;
			}
			foreach ($cloudData['result']['data'] as $sPost) {
				$threadlist[] = $sPost;
			}

			loadcache('forums');
			foreach($threadlist as $curtid=>&$curvalue) {
				$curvalue['pForumName'] = $_G['cache']['forums'][$curvalue['pForumId']]['name'];
				$curvalue['istoday'] = strtotime($curvalue['pPosted']) > $todaytime ? 1 : 0;
				$curvalue['dateline'] = $curvalue['pPosted'];
			}
			$multipage = multi($cloudData['result']['total'], $_G['tpp'], $_G['page'], "forum.php?mod=collection&action=view&op=related&ctid={$_G['collection']['ctid']}&keyword=".urlencode($_GET['keyword']));
		}
		return tpl_cloudsearch_collection_relatedop_output($threadlist, $multipage);
	}

	/**
	 * 淘帖主题列表相关帖
	 */
	public function collection_threadlistbottom_output() {
		if(!$this->allow_collection_related || !$GLOBALS['ctid'] || $GLOBALS['action'] != 'view' || $GLOBALS['op']) {
			return;
		}
		global $_G;

		return tpl_cloudsearch_relate_threadlist_output(urlencode($_G['collection']['name'].' '.implode(' ', $_G['collection']['arraykeyword'])));
	}

	/**
	 * 版块主题列表相关帖
	 */
	public function forumdisplay_threadlist_bottom_output() {
		global $_G;

		if(!$this->allow_forum_related|| $_G['page'] > 1) {
			return;
		}

		return tpl_cloudsearch_relate_threadlist_output(urlencode($_G['forum']['name']));
	}

	/**
	 * 帖子列表页展示热门话题
	 */
	public function forumdisplay_middle_output() {
		if(!$this->allow || !$this->allow_forum_recommend) {
			return;
		}

		global $_G, $searchparams;
		$result = '';
		if ($_G['fid']) {
			$searchHelper = Cloud::loadClass('Service_SearchHelper');
			//note 获取关键词，使用字符串索引
			$recwords = $searchHelper->getRecWords(14, 'assoc', $_G['fid']);
			$srchotquery = '';
			if(!empty($searchparams['params'])) {
				foreach($searchparams['params'] as $key => $value) {
					$srchotquery .= '&' . $key . '=' . rawurlencode($value);
				}
			}
			$result = tpl_cloudsearch_index_top($recwords, $searchparams, $srchotquery, 'hotopic_fm');
		}

		return $result;
	}

	/**
	 * 帖子内容页底部 - 判断非第一页输出
	 */
	public function viewthread_middle_output() {

		if (!$this->allow || !$this->allow_thread_related_bottom) {
			return;
		}

		global $_G;
		if ($_G['page'] == 1) {
			return;
		}

		return tpl_cloudsearch_viewthread_modaction_output();
	}

	/**
	 * 首页 - 分版块展示热点
	 */
	public function index_forum_extra_output() {

		return;
		if (!$this->allow || !$this->allow_forum_recommend) {
			return;
		}

		global $forumlist;

		return $this->_get_forum_hotspot($forumlist);
	}

	/**
	 * 子版块展示热点
	 */
	public function forumdisplay_subforum_extra_output() {

		return;
		if (!$this->allow || !$this->allow_forum_recommend) {
			return;
		}

		global $sublist;

		return $this->_get_forum_hotspot($sublist);
	}

	private function _get_forum_hotspot($forumlist) {
		if (!$this->allow || !$this->allow_forum_recommend) {
			return;
		}

		global $_G, $searchparams;

		if (!is_array($forumlist) || count($forumlist) == 0 || !$searchparams) {
			return;
		}

		$srchotquery = '';
		if(!empty($searchparams['params'])) {
			foreach($searchparams['params'] as $key => $value) {
				$srchotquery .= '&' . $key . '=' . rawurlencode($value);
			}
		}

		$return = $cachenames = $fids = array();
		//note 所有版块统一获取缓存
		foreach ($forumlist as $fid => $forum) {
			$cachenames[] = 'search_recommend_words_' . $forum['fid'];
			$fids[] = $forum['fid'];
		}

		loadcache($cachenames);
		foreach ($fids as $v) {
			$forum_recwords = $_G['cache']['search_recommend_words_' . $v]['result'];
			if (!$forum_recwords) {
				continue;
			}

			// 版块列表页热门话题词会取14个，但首页分版块热门话题词只显示3个
			$forum_recwords = array_slice($forum_recwords, 0, 3);

			foreach($forum_recwords as $key => $word) {
				$forum_recwords[$key]['url'] = $searchparams['url'] . '?' . $srchotquery . '&q=' . urlencode($word['word']) . '&source=word.hotopic_if.'.($key + 1).'&keywordType=recommend&hwfId=' . $v;
			}
			$return[$v] = tpl_index_forum_extra_output($forum_recwords);
		}

		return $return;
	}

}

class plugin_cloudsearch_group extends plugin_cloudsearch {

}

class plugin_cloudsearch_home extends plugin_cloudsearch {

}
