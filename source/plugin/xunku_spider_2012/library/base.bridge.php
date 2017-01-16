<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
if(!defined('CURSCRIPT')) {
	exit('Access Denied');
}
require_once(SPIDER_LIBRARY_DIR.'base/xkimage.class.php');
require_once(D_P.'data/plugindata/xk_face.php');
class BASE_BRIDGE{
	public $bbs_type = 'phpwind';
	public $binfo;
	public $action_type;
	public $actiondb;
	public $timestamp;
	public $snoopy;
	public $configure;

	public function BASE_BRIDGE(){
		$this->__construct();
	}

	public function __construct($action_type,$snoopy,$configure){
		$this->action_type = $action_type;
		$this->actiondb = $this->loaddb($configure);
		$this->timestamp = TIMESTAMP;
		$this->snoopy = $snoopy;
		$this->configure = $configure;
		loaducenter();
	}

	public function set_tpc_info($tpcinfo){
		$this->binfo = $tpcinfo;
	}

	public function set_post_info($postinfo){
		$this->binfo = $postinfo;
	}
	
	public function run($extinfo = 'tpc'){
		if(in_array($this->action_type,array('thread','photo','cms','blog','weibo'))){
			switch($this->action_type){
				case 'thread': return $this->run_thread($this->binfo,$extinfo);break;
				case 'photo': return $this->run_photo($this->binfo,$extinfo);break;
				case 'cms': return $this->run_cms($this->binfo,$extinfo);break;
				case 'blog': return $this->run_blog($this->binfo,$extinfo);break;
				case 'weibo': return $this->run_weibo($this->binfo,$extinfo);break;
				default:;
			}
		}else{
			exit('can not find right action');
		}
	}
	
	public function run_cms($topicinfo,$type){
		if($type == 'tpc'){
			return $this->run_cms_tpc($topicinfo);
		}elseif($type == 'post'){
			$this->run_cms_post($topicinfo);
		}
	}
	
	public function run_cms_tpc($topicinfo){
		global $baseconfig;
		$attinfo = $tpcinfo = $tmsginfo = $memdata = $upforum = $weiboinfo = $relinfo = $postinfo = array();
		$members = $memberdata = array();
		$new_member = false;
		if (CHARSET == 'gbk') {
			$username = substr($topicinfo['author'],0,14);
			$username_tmp = substr($username,0,-1);
			$password = $baseconfig['global_password'];
			$email = random(10,100).'@126.com';
			if(($ucenter_info = uc_get_user($username)) || ($ucenter_info_tmp = uc_get_user($username_tmp))) {
				if ($ucenter_info[0] > 0) {
					$uid = $ucenter_info[0];
				} elseif($ucenter_info_tmp[0] > 0) {
					$uid = $ucenter_info_tmp[0];
				}
				$new_member = false;
			}else {
				$new_member = true;	
			}
		} else {
			$username = substr($topicinfo['author'],0,15);
			$username_tmp = substr($username,0,-1);
			$username_tmp2 = substr($username,0,-2);
			$password = $baseconfig['global_password'];
			$email = random(10,100).'@126.com';
			if(($ucenter_info = uc_get_user($username)) || ($ucenter_info_tmp = uc_get_user($username_tmp)) || ($ucenter_info_tmp2 = uc_get_user($username_tmp2))) {
				if ($ucenter_info[0] > 0) {
					$uid = $ucenter_info[0];
				} elseif($ucenter_info_tmp[0] > 0) {
					$uid = $ucenter_info_tmp[0];
				} elseif($ucenter_info_tmp2[0] > 0) {
					$uid = $ucenter_info_tmp2[0];
				}
				$new_member = false;
			}else {
				$new_member = true;	
			}
		}
		
		if ($new_member) {
			list($uid,$username) = $this->member_register($username,$password,$email);
		}
		//更新用户头像
		if ($new_member) $this->face_local($topicinfo['face'], $uid);

		$portal_article_title = array(
			'catid' => $topicinfo['fid'],
			'username' => $username,
			'uid' => $uid,
			'title' => $topicinfo['subject'],
			'highlight' => '|||',
			'author' => $topicinfo['author'],
			'fromurl' => $topicinfo['fromurl'],
			'url' => $topicinfo['url'],
			'summary' => substr(trim($this->striptext(str_replace(array('[upload=1]','[upload=2]','[upload=3]','[upload=4]','[upload=5]','[upload=6]','[upload=7]','[upload=8]'),'',$topicinfo['content']))),0,100),
			'contents' => '1',
			'allowcomment' => 1,
			'dateline' => $topicinfo['postdate'],
			'if_spider' => 1,
			'source_key' => $topicinfo['source_key'],
		);
		$aid = $this->actiondb->update_portal_article_title($portal_article_title);
		$this->actiondb->update_common_member(array(),$uid,'credit');
		$this->actiondb->update_portal_category($topicinfo['fid']);
		$portal_article_count = array(
			'aid' => $aid,
			'catid' => $topicinfo['fid'],
			'viewnum' => $topicinfo['views']
		);
		$this->actiondb->update_portal_article_count($portal_article_count);
		$portal_article_content = array(
			'aid' => $aid,
			'title' => $topicinfo['subject'],
			'content' => $this->filter_content($topicinfo['content']),
			'pageorder' => 1, 
			'dateline' => $topicinfo['postdate'],
		);
		$cid = $this->actiondb->update_portal_article_content($portal_article_content);
		if(!empty($topicinfo['aids'])){
			$aids = array();
			$push_img = '';
			foreach($topicinfo['aids'] as $key=>$value){
				$attpath = $this->att_local($key,$value,'portal');
				$push_img = $attpath['atturl'];
				$attinfo = array(
					'uid' => $uid,
					'filename' => $attpath['attname'],
					'dateline' => $topicinfo['postdate'],
					'filesize' => filesize($attpath['attfile']),
					'attachment' => $attpath['atturl'],
					'isimage' => 1,
					'thumb' => 1,
					'filetype' => $attpath['ext'],
					'aid' => $aid
				);
				$att_id = $this->actiondb->update_portal_attachment($attinfo);
				$aids[] = $attpath['atturl'];
				$aidsinfo[$att_id] = $attinfo['attachment'];
			}
			$new_content = $this->convert_att_cms($topicinfo['content'],$aids);
			$update_portal_article_content = array(
				'content' => $new_content,
			);
			$this->actiondb->update_portal_article_content($update_portal_article_content,'update',$cid);
			$this->actiondb->update_portal_article_title(array('pic'=>'portal/'.$push_img),'update',$aid);
		}
		unset($forum_thread,$topicinfo,$update_post,$new_content);
		return $aid;
	}
	

	public function run_cms_post($postinfo){
		global $baseconfig;
		$attinfo = $tpcinfo = $tmsginfo = $memdata = $upforum = $weiboinfo = $relinfo = array();
		$members = $memberdata = $membersUids = array();
		$update_thread = array();
		//insert post
		foreach($postinfo as $key=>$value){
			$aid = $value['tid'];
			$new_member = false;
			if (CHARSET == 'gbk') {
				$username = substr($value['author'],0,14);
				$username_tmp = substr($username,0,-1);
				$password = $baseconfig['global_password'];
				$email = random(10,100).'@126.com';
				if(($ucenter_info = uc_get_user($username)) || ($ucenter_info_tmp = uc_get_user($username_tmp))) {
					if ($ucenter_info[0] > 0) {
						$uid = $ucenter_info[0];
					} elseif($ucenter_info_tmp[0] > 0) {
						$uid = $ucenter_info_tmp[0];
					}
					$new_member = false;
				}else {
					$new_member = true;	
				}	
			} else {
				$username = substr($value['author'],0,15);
				$username_tmp = substr($username,0,-1);
				$username_tmp2 = substr($username,0,-2);
				$password = $baseconfig['global_password'];
				$email = random(10,100).'@126.com';
				if(($ucenter_info = uc_get_user($username)) || ($ucenter_info_tmp = uc_get_user($username_tmp)) || ($ucenter_info_tmp2 = uc_get_user($username_tmp2))) {
					if ($ucenter_info[0] > 0) {
						$uid = $ucenter_info[0];
					} elseif($ucenter_info_tmp[0] > 0) {
						$uid = $ucenter_info_tmp[0];
					} elseif($ucenter_info_tmp2[0] > 0) {
						$uid = $ucenter_info_tmp2[0];
					}
					$new_member = false;
				}else {
					$new_member = true;	
				}
			}
			if ($new_member) {
				list($uid,$username) = $this->member_register($username,$password,$email);
			}
			if ($new_member) $this->face_local($value['face'], $uid);
			$portal_comment = array(
				'uid' => $uid,
				'username' => $username,
				'id' => $value['tid'],
				'idtype' => 'aid',
				'dateline' => $value['postdate'],
				'message' => $value['content'],
			);
			$cid = $this->actiondb->update_portal_comment($portal_comment);
			if(!empty($value['aids'])){
				foreach($value['aids'] as $k=>$v){
					$aids[] = $k;
				}
				$new_content = $this->convert_att_cms($value['content'],$aids,1);
				$update_post = array(
					'message' => $new_content,
				);
				$this->actiondb->update_portal_comment($update_post,'update',$cid);
			}
		}
		$portal_article_count = array(
			'commentnum' => count($postinfo),
		);
		$this->actiondb->update_portal_article_count($portal_article_count,'update',$aid);
	}

	public function run_thread($topicinfo,$type){
		if($type == 'tpc'){
			return $this->run_thread_tpc($topicinfo);
		}elseif($type == 'post'){
			$this->run_thread_post($topicinfo);
		}
	}

	public function run_thread_tpc($topicinfo){
		global $baseconfig;
		$attinfo = $tpcinfo = $tmsginfo = $memdata = $upforum = $weiboinfo = $relinfo = $postinfo = array();
		$members = $memberdata = array();
		$new_member = false;
		if (CHARSET == 'gbk') {
			$username = substr($topicinfo['author'],0,14);
			$username_tmp = substr($username,0,-1);
			$password = $baseconfig['global_password'];
			$email = random(10,100).'@126.com';
			if(($ucenter_info = uc_get_user($username)) || ($ucenter_info_tmp = uc_get_user($username_tmp))) {
				if ($ucenter_info[0] > 0) {
					$uid = $ucenter_info[0];
				} elseif($ucenter_info_tmp[0] > 0) {
					$uid = $ucenter_info_tmp[0];
				}
				$new_member = false;
			}else {
				$new_member = true;	
			}
		} else {
			$username = substr($topicinfo['author'],0,15);
			$username_tmp = substr($username,0,-1);
			$username_tmp2 = substr($username,0,-2);
			$password = $baseconfig['global_password'];
			$email = random(10,100).'@126.com';
			if(($ucenter_info = uc_get_user($username)) || ($ucenter_info_tmp = uc_get_user($username_tmp)) || ($ucenter_info_tmp2 = uc_get_user($username_tmp2))) {
				if ($ucenter_info[0] > 0) {
					$uid = $ucenter_info[0];
				} elseif($ucenter_info_tmp[0] > 0) {
					$uid = $ucenter_info_tmp[0];
				} elseif($ucenter_info_tmp2[0] > 0) {
					$uid = $ucenter_info_tmp2[0];
				}
				$new_member = false;
			}else {
				$new_member = true;	
			}
		}
		
		if ($new_member) {
			list($uid,$username) = $this->member_register($username,$password,$email);
		}
		//更新用户头像
		if ($new_member) $this->face_local($topicinfo['face'], $uid);
		$forum_thread = array(
			'fid' => $topicinfo['fid'],
			'posttableid' => 0,
			'typeid' => $topicinfo['type'],
			'author' => $username,
			'authorid' => $uid,
			'subject' => $topicinfo['subject'],
			'dateline' => $topicinfo['postdate'],
			'lastpost' =>  $topicinfo['postdate'],
			'lastposter' => $username,
			'status' => 32,
			'source_key' => $topicinfo['source_key'],
			'views' => $topicinfo['views'],
			'if_spider' => 1,
			'displayorder' => $topicinfo['ifcheck'],
			'attachment' => (empty($topicinfo['aids'])) ? 0 : 2,
			'cover' => (empty($topicinfo['aids'])) ? 0 : 1,
		);
		$tid = $this->actiondb->update_forum_thread($forum_thread);
		$common_member_field_home = array(
			'recentnote' => $topicinfo['subject'],
		);
		$this->actiondb->update_common_member_field_home($common_member_field_home,$uid);
		$pid = $this->actiondb->update_forum_post_tableid();
		$forum_post = array(
			'fid' => $topicinfo['fid'],
			'tid' => $tid,
			'first' => 1,
			'author' => $username,
			'authorid' => $uid,
			'subject' => $topicinfo['subject'],
			'dateline' => $topicinfo['postdate'],
			'message' => $this->filter_content($topicinfo['content']),
			'useip' => rand(0,255).'.'.rand(0,255).'.'.rand(0,255).'.'.rand(0,255),
			'usesig' => 1,
			'bbcodeoff' => 0,
			'smileyoff' => 0,
			'htmlon' => (strpos($topicinfo['content'],'<embed')!==false || strpos($topicinfo['content'],'<object')!==false) ? 1 : 0,
			'pid' => $pid,
		);
		$this->actiondb->update_forum_post($forum_post);
		$this->actiondb->update_common_syscache($pid);
		$this->actiondb->update_common_stat('tpc',1);
		$this->actiondb->update_common_member_count($uid , 'tpc');
		$this->actiondb->update_common_member(array(),$uid,'credit');
		$this->actiondb->update_common_member_status(array($uid));
		$this->actiondb->update_forum_forum($tid,$topicinfo['subject'],$topicinfo['postdate'],$username,$topicinfo['fid']);
		if(!empty($topicinfo['aids'])){
			$aids = array();
			$push_img = '';
			$threadcover = true;
			foreach($topicinfo['aids'] as $key=>$value){
				$attpath = $this->att_local($key,$value,$threadcover,$tid);
				if($attpath['threadcover']) $threadcover = false;
				$push_img = $attpath['atturl'];
				$attinfo_index = array(
					'tid' => $tid,
					'pid' => $pid,
					'uid' => $uid,
					'tableid' => intval($tid%10),
				);
				$aid = $this->actiondb->update_forum_attachment_index($attinfo_index);
				$attinfo = array(
					'aid' => $aid,
					'tid' => $tid,
					'pid' => $pid,
					'uid' => $uid,
					'dateline' => $topicinfo['postdate'],
					'filename' => $attpath['attname'],
					'filesize' => filesize($attpath['attfile']),
					'attachment' => $attpath['atturl'],
					'isimage' => (in_array($attpath['ext'],$baseconfig['global_att'])) ? 0 :1,
					'width' => $attpath['width']
				);
				$this->actiondb->update_forum_attachment($attinfo,$tid);
				$aids[] = $aid;
				$aidsinfo[$aid] = $attinfo['attachment'];
			}
			$new_content = $this->convert_att($topicinfo['content'],$aids);
			$update_post = array(
				'message' => $new_content,
				'attachment' => 2
			);
			$this->actiondb->update_forum_post($update_post,'update',$pid);
			$update_threadimage = array(
				'tid' => $tid,
				'attachment' => $push_img,
				'remote' => 0
			);
			$this->actiondb->update_threadimage($update_threadimage);
		}
		unset($forum_thread,$topicinfo,$update_post,$new_content);
		return $tid;
	}
	
	public function run_thread_post($postinfo){
		global $baseconfig;
		$attinfo = $tpcinfo = $tmsginfo = $memdata = $upforum = $weiboinfo = $relinfo = array();
		$members = $memberdata = $membersUids = array();
		$update_thread = array();
		//insert post
		foreach($postinfo as $key=>$value){
			$new_member = false;
			if (CHARSET == 'gbk') {
				$username = substr($value['author'],0,14);
				$username_tmp = substr($username,0,-1);
				$password = $baseconfig['global_password'];
				$email = random(10,100).'@126.com';
				if(($ucenter_info = uc_get_user($username)) || ($ucenter_info_tmp = uc_get_user($username_tmp))) {
					if ($ucenter_info[0] > 0) {
						$uid = $ucenter_info[0];
					} elseif($ucenter_info_tmp[0] > 0) {
						$uid = $ucenter_info_tmp[0];
					}
					$new_member = false;
				}else {
					$new_member = true;	
				}	
			} else {
				$username = substr($value['author'],0,15);
				$username_tmp = substr($username,0,-1);
				$username_tmp2 = substr($username,0,-2);
				$password = $baseconfig['global_password'];
				$email = random(10,100).'@126.com';
				if(($ucenter_info = uc_get_user($username)) || ($ucenter_info_tmp = uc_get_user($username_tmp)) || ($ucenter_info_tmp2 = uc_get_user($username_tmp2))) {
					if ($ucenter_info[0] > 0) {
						$uid = $ucenter_info[0];
					} elseif($ucenter_info_tmp[0] > 0) {
						$uid = $ucenter_info_tmp[0];
					} elseif($ucenter_info_tmp2[0] > 0) {
						$uid = $ucenter_info_tmp2[0];
					}
					$new_member = false;
				}else {
					$new_member = true;	
				}
			}
			if ($new_member) {
				list($uid,$username) = $this->member_register($username,$password,$email);
			}
			if ($new_member) $this->face_local($value['face'], $uid);
			$pid = $this->actiondb->update_forum_post_tableid();
			$forum_post = array(
				'fid' => $value['fid'],
				'tid' => $value['tid'],
				'first' => 0,
				'author' => $username,
				'authorid' => $uid,
				'subject' => '',
				'dateline' => $value['postdate'],
				'message' => $value['content'],
				'useip' => rand(0,255).'.'.rand(0,255).'.'.rand(0,255).'.'.rand(0,255),
				'htmlon' => (strpos($topicinfo['content'],'<embed')!==false || strpos($topicinfo['content'],'<object')!==false) ? 1 : 0,
				'bbcodeoff' => 0,
				'smileyoff' => 0,
				'attachment' => 0,
				'status' => 0,
				'pid' => $pid,
			);
			$this->actiondb->update_forum_post($forum_post);
			$this->actiondb->update_common_syscache($pid);
			$this->actiondb->update_common_member(array(),$uid,'newprompt');
			$this->actiondb->update_common_stat('post',1);
			$update_forum_thread = array(
				'lastposter' => $username,
				'lastpost' => $value['postdate'],
			);
			$this->actiondb->update_forum_thread($update_forum_thread,'update',$value['tid']);
			$this->actiondb->update_common_member_count($uid, 'post');
			$this->actiondb->update_common_member(array(),$uid,'credit');
			$this->actiondb->update_common_member_status(array($uid));
			$this->actiondb->update_forum_forum($value['tid'],$value['subject'],$value['postdate'],$username,$value['fid'],'post');
			if(!empty($value['aids'])){
				$aids = array();
				foreach($value['aids'] as $k=>$v){
					$attpath = $this->att_local($k,$v);
					$attinfo_index = array(
						'tid' => $value['tid'],
						'pid' => $pid,
						'uid' => $uid,
						'tableid' => intval($value['tid']%10),
					);
					$aid = $this->actiondb->update_forum_attachment_index($attinfo_index);
					$attinfo = array(
						'aid' => $aid,
						'tid' => $value['tid'],
						'pid' => $pid,
						'uid' => $uid,
						'dateline' => $topicinfo['postdate'],
						'filename' => $attpath['attname'],
						'filesize' => filesize($attpath['attfile']),
						'attachment' => $attpath['atturl'],
						'isimage' => (in_array($attpath['ext'],$baseconfig['global_att'])) ? 0 :1,
						'width' => $attpath['width']
					);
					$this->actiondb->update_forum_attachment($attinfo,$value['tid']);
					$aids[] = $aid;
					$aidsinfo[$aid] = $attinfo['attachment'];
				}
				$new_content = $this->convert_att($value['content'],$aids);
				$update_post = array(
					'message' => $new_content,
					'attachment' => 2
				);
				$this->actiondb->update_forum_post($update_post,'update',$pid);
			}
		}
	}



	public function run_blog($bloginfo){
		
	}

	public function run_photo($photoinfo){
	
	}

	public function run_weibo($weiboinfo){
		
	}

	public function member_register($username,$password,$email) {
		global $_G,$xkface;
		$clientip = rand(0,255).'.'.rand(0,255).'.'.rand(0,255).'.'.rand(0,255);
		$uid = uc_user_register($username, $password, $email, $questionid, $answer, $clientip);
		if(DB::result_first("SELECT uid FROM ".DB::table('common_member')." WHERE uid='$uid'")) {
			$uinfo = DB::result_first("SELECT uid,username FROM ".DB::table('common_member')." WHERE if_robot = 1 limit 0,1");
			$uid = $uinfo['uid'];
			$username = $uinfo['username'];
			return array($uid,$username);
		}
		if ($uid == -1) {
			return array(0,$username);
		}
		$password = md5(random(10));
		$init_arr = explode(',', $_G['setting']['initcredits']);
		$userdata = array(
				'uid' => $uid,
				'username' => $username,
				'password' => $password,
				'avatarstatus' => 1,
				'email' => $email,
				'adminid' => 0,
				'groupid' => 10,
				'regdate' => TIMESTAMP,
				'credits' => $init_arr[0],
				'timeoffset' => 9999,
				'if_robot' => 1
			);
		$status_data = array(
				'uid' => $uid,
				'regip' => $clientip,
				'lastip' => $clientip,
				'lastvisit' => TIMESTAMP,
				'lastactivity' => TIMESTAMP,
				'lastpost' => 0,
				'lastsendmail' => 0,
			);
		$profile['uid'] = $uid;
		$field_forum['uid'] = $uid;
		$field_home['uid'] = $uid;
		DB::insert('common_member', $userdata);
		DB::insert('common_member_status', $status_data);
		DB::insert('common_member_profile', $profile);
		DB::insert('common_member_field_forum', $field_forum);
		DB::insert('common_member_field_home', $field_home);
		$count_data = array(
				'uid' => $uid,
				'extcredits1' => $init_arr[1],
				'extcredits2' => $init_arr[2],
				'extcredits3' => $init_arr[3],
				'extcredits4' => $init_arr[4],
				'extcredits5' => $init_arr[5],
				'extcredits6' => $init_arr[6],
				'extcredits7' => $init_arr[7],
				'extcredits8' => $init_arr[8]
			);
		DB::insert('common_member_count', $count_data);
		DB::insert('common_setting', array('skey' => 'lastmember', 'svalue' => $username), false, true);
		manyoulog('user', $uid, 'add');

		$totalmembers = DB::result_first("SELECT COUNT(*) FROM ".DB::table('common_member'));
		$userstats = array('totalmembers' => $totalmembers, 'newsetuser' => $username);
		save_syscache('userstats', $userstats);
		if($sid = DB::result_first("select id from xk_statistics where create_date = ".xkEscape(date('Y-m-d',TIMESTAMP)))){
			DB::query("update xk_statistics set user=user+1 where create_date = ".xkEscape(date('Y-m-d',TIMESTAMP)));
		}else{
			$insertStats = array('user'=>1,'create_date'=>date('Y-m-d',TIMESTAMP));
			DB::query("insert into xk_statistics set " .xkSqlSingle($insertStats));
		};
		$tmpuid = array_rand($xkface);
		face_local($xkface[$tmpuid],$uid);
		return array($uid,$username);
	}
	
	public function convert_att($content,$aids){
		foreach($aids as $key=>$value){
			$key += 1;
			$content = str_replace("[upload=$key]",'[attach]'.$value.'[/attach]',$content);
		}
		return $content;
	}

	public function convert_att_cms($content,$aids,$filter = 0){
		if($filter) {
			foreach($aids as $key=>$value){
				$key += 1;
				$content = str_replace("[upload=$key]","",$content);
			}
		}else{
			foreach($aids as $key=>$value){
				$key += 1;
				$content = str_replace("[upload=$key]","<img src='data/attachment/portal/$value' />",$content);
			}	
		}
		return $content;
	}

	public function filter_content($content){
		return $content;
	}

	public function loaddb($configure){
		$path = SPIDER_LIBRARY_DIR.'db/'.$this->action_type.'.db.php';
		if(file_exists($path)){
			require_once($path);
			$db_classname = strtoupper($this->action_type.'db');
			$actiondb = &new $db_classname($configure);
			return $actiondb;
		}else{
			exit('can not find action db');
		}
	}

	 public function face_local($faceurl, $uid){
		if(strpos($faceurl,'http') === false) {
			return 0;
		}
		if (strpos($faceurl,'?') !== false) {
			$faceurl = substr($faceurl,0,strpos($faceurl,'?'));
		}
		$uid = abs(intval($uid));
		$uid = sprintf("%09d", $uid);
		$dir1 = substr($uid, 0, 3);
		$dir2 = substr($uid, 3, 2);
		$dir3 = substr($uid, 5, 2);
		$attdir_1 = D_P.'uc_server/data/avatar/'.$dir1;
		$attdir_2 = $attdir_1.'/'.$dir2;
		$attdir_3 .= $attdir_2 .'/'.$dir3;
		if(!is_dir($attdir_1) && @mkdir($attdir_1)){
			@chmod($attdir_1,0777);
		}
		if(!is_dir($attdir_2) && @mkdir($attdir_2)){
			@chmod($attdir_2,0777);
		}
		if(!is_dir($attdir_3) && @mkdir($attdir_3)){
			@chmod($attdir_3,0777);
		}
		$attdir = D_P.'uc_server/data/avatar/'.$dir1.'/'.$dir2.'/'.$dir3;
		$big_file_path = $attdir.'/'.substr($uid, -2)."_avatar_big.jpg";
		$middle_file_path = $attdir.'/'.substr($uid, -2)."_avatar_middle.jpg";
		$small_file_path = $attdir.'/'.substr($uid, -2)."_avatar_small.jpg";
		$saveto = $attdir.'/tmp_face.jpg';
		$ext = 'jpg';
		if($this->downFile($faceurl, $saveto, $ext) && $this->downFile($faceurl, $saveto_s, $ext)) {
			$imagesize = getimagesize($saveto);
			if ($imagesize[0] > 120 || $imagesize[1] > 120) {
				$xk_image = new xkimages();
				$xk_image->Thumbnail($saveto,$big_file_path,160,160);
				$xk_image->Thumbnail($saveto,$middle_file_path,120,120);
				$xk_image->Thumbnail($saveto,$small_file_path,48,48);
			} else {
				writeover($big_file_path,file_get_contents($saveto));
				writeover($middle_file_path,file_get_contents($saveto));
				writeover($small_file_path,file_get_contents($saveto));
			}
			unlink($saveto);
		} else {
			unlink($saveto);
		}
	}

	public function att_local($key,$value,$type = false,$tid = 0){
		global $_G;
		require_once libfile('class/image');
		$image = new image;
		$ext = $value['ext'];
		$att_pre = 'forum';
		list($filename, $savedir) = $this->getFilePath($ext);
		if($_G['setting']['ftp']['on']){
			if(!is_dir($db_ftpweb.'/'.$savedir)){
				createFolder($db_ftpweb.'/'.$savedir);
			}
		}else{
			if(!is_dir($_G['setting']['attachdir'].$att_pre.'/'.$savedir)){
				createFolder($_G['setting']['attachdir'].$att_pre.'/'.$savedir, 0777);
			}
		}
		$fileuploadurl =  $savedir . $filename;
		if($_G['setting']['ftp']['on']){
			$source = $_G['setting']['ftp']['host'].'/'.$_G['setting']['ftp']['attachdir'].'/'.$fileuploadurl;
		}else {
			$source = $_G['setting']['attachdir'].$att_pre.'/'.$fileuploadurl;
		}
		if (!$this->downFile($value['imgurl'], $source, $ext)) {
			$ifDone = FALSE;
		} else {
			$ifDone = TRUE;
		}
		if($ifDone) {
			if($_G['setting']['watermarkstatus'] && empty($_G['forum']['disablewatermark'])) {
				$image->Watermark($source, '', 'forum');
			}
			if ($_G['setting']['ftp']['on']) {
				PwUpload::movetoftp($source, $fileuploadurl);
				ftpcmd('upload', $att_pre.'/'.$fileuploadurl);
			}
		}
		$threadcover = false;
		if($ifDone&&$type&&$image->imginfo['width']>100) {
			$savedir = substr(md5($tid), 0, 2).'/'.substr(md5($tid), 2, 2).'/';
			if(!is_dir($_G['setting']['attachdir'].$att_pre.'/'.$savedir)){
				createFolder($_G['setting']['attachdir'].'forum/threadcover/'.$savedir, 0777);
			}
			$covername = $tid.'.jpg';
			$source = $_G['setting']['attachdir'].'forum/threadcover/'.$savedir.$covername;
			$this->downFile($value['imgurl'], $source, 'jpg');
			$threadcover = true;
		}
		$result['threadcover'] = $threadcover;
		$result['atturl'] = $fileuploadurl;
		$result['attname'] = (isset($value['name'])) ? $value['name'].'.'.$ext : $filename;
		$result['attfile'] = $source;
		$result['ifthumb'] = 0;
		$result['ext'] = $ext;
		$result['width'] = $image->imginfo['width'];
		return $result;
	}

	function getThumbInfo($filename, $dir) {
		global $db_athumbsize;
		return array(
			array($filename, 'thumb/' . $dir, $db_athumbsize)
		);
	}


	function getFilePath($ext) {
		global $winduid;
		$prename  = random(8,1) . TIMESTAMP . substr(md5(TIMESTAMP . random(10,1)),10,15);
		$filename = 'xk' . "_$prename." . preg_replace('/(php|asp|jsp|cgi|fcgi|exe|pl|phtml|dll|asa|com|scr|inf)/i', "scp_\\1", $ext);

		$savedir = $this->getSaveDir($ext);

		return array($filename, $savedir);
	}


	function getSaveDir($ext) {
		$savedir = '';
		$savedir .= date('Ym',TIMESTAMP);
		$savedir .= '/'.date('d',TIMESTAMP).'/';
		return $savedir;
	}


	function downFile($imgurl, $saveto, $ext) {
		$imgurl = str_replace(array('&amp;','&#61;'),array('&','='),$imgurl);
		if($this->snoopy->fetch($imgurl)){
			if($this->configure['downmethod']){
				$this->snoopy->results = file_get_contents($imgurl);
			}
			if ($this->configure['filetype']) {
				$ext = 'rar';
				if (strpos($this->snoopy->results,'Word')!==false) {
					$ext = 'doc';
				} elseif (strpos($this->snoopy->results,'TNPP')!==false) {
					$ext = 'ppt';
				} elseif (strpos($this->snoopy->results,'rar')!==false || strpos($this->snoopy->results,'Rar')!==false){
					$ext = 'rar';
				}
			}
			$saveto = substr($saveto,0,strrpos($saveto,'.')).'.'.$ext;
			$fp = fopen($saveto,'w');
			fwrite($fp,$this->snoopy->results);
			fclose($fp);
			unset($this->snoopy->results);
			return array($ext,$saveto);
		}else{
			return false;
		}
		
	}

	function striptext($document)
	{						
		$search = array("'<script[^>]*?>.*?</script>'si",	
						"'<[\/\!]*?[^<>]*?>'si",			
						"'([\r\n])[\s]+'",					
						"'&(quot|#34|#034|#x22);'i",		
						"'&(amp|#38|#038|#x26);'i",			
						"'&(lt|#60|#060|#x3c);'i",
						"'&(gt|#62|#062|#x3e);'i",
						"'&(nbsp|#160|#xa0);'i",
						"'&(iexcl|#161);'i",
						"'&(cent|#162);'i",
						"'&(pound|#163);'i",
						"'&(copy|#169);'i",
						"'&(reg|#174);'i",
						"'&(deg|#176);'i",
						"'&(#39|#039|#x27);'",
						"'&(euro|#8364);'i",				// europe
						"'&a(uml|UML);'",					// german
						"'&o(uml|UML);'",
						"'&u(uml|UML);'",
						"'&A(uml|UML);'",
						"'&O(uml|UML);'",
						"'&U(uml|UML);'",
						"'&szlig;'i",
						);
		$replace = array(	"",
							"",
							"\\1",
							"\"",
							"&",
							"<",
							">",
							" ",
							chr(161),
							chr(162),
							chr(163),
							chr(169),
							chr(174),
							chr(176),
							chr(39),
							chr(128),
							"?",
							"?",
							"?",
							"?",
							"?",
							"?",
							"?",
						);
					
		$text = preg_replace($search,$replace,$document);					
		return $text;
	}
}