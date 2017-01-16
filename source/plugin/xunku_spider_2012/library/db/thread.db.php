<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
class THREADDB{
	/*common_member*/
	public function update_common_member($updateArr = array(),$uid = 0,$type = 'normal'){
		if ($type == 'normal') {
			DB::query("update ".DB::table('common_member')." set".pwSqlSingle($updateArr)." where uid=".xkEscape($uid));	
		} elseif ($type == 'credit') {
			DB::query("update ".DB::table('common_member')." set `credits`=`credits`+1 where uid=".xkEscape($uid));	
		} elseif ($type == 'newprompt') {
			DB::query("update ".DB::table('common_member')." set `newprompt`=`newprompt`+1 where uid=".xkEscape($uid));	
		}
	}
	/*common_member*/

	/*common_member_status*/
	public function update_common_member_status($uid){
		$updateArr = array(
			'lastpost' => TIMESTAMP,	
		);
		DB::query("update ".DB::table('common_member_status')." set".xkSqlSingle($updateArr)." where uid in (".xkImplode($uid).")");
	}
	/*common_member_status*/

	/*forum_thread*/
	public function update_forum_thread($threadinfo,$do = 'add',$tid = 0) {
		if ($do == 'add') {
			if($sid = DB::result_first("select id from xk_statistics where create_date = ".xkEscape(date('Y-m-d',TIMESTAMP)))){
				DB::query("update xk_statistics set thread=thread+1 where create_date = ".xkEscape(date('Y-m-d',TIMESTAMP)));
			}else{
				$insertStats = array('thread'=>1,'create_date'=>date('Y-m-d',TIMESTAMP));
				DB::query("insert into xk_statistics set " .xkSqlSingle($insertStats));
			}
			DB::query("insert into ".DB::table('forum_thread')." set ".xkSqlSingle($threadinfo));
			return DB::insert_id();
		} elseif ($do == 'update') {
			DB::query("update ".DB::table('forum_thread')." set ".xkSqlSingle($threadinfo).',replies=replies+1 where tid='.xkEscape($tid));
		}
	}
	/*forum_thread*/
	
	/*common_member_field_home*/
	public function update_common_member_field_home($updateinfo,$uid = 0) {
		DB::query("update ".DB::table('common_member_field_home')." set ".xkSqlSingle($updateinfo)." where uid = ".xkEscape($uid));
	}
	/*common_member_field_home*/

	/*forum_post_tableid*/
	public function update_forum_post_tableid() {
		$insertinfo = array(
			'pid' => ''	
		);
		DB::query("insert into ".DB::table('forum_post_tableid')." set ".xkSqlSingle($insertinfo));
		return DB::insert_id();
	}
	/*forum_post_tableid*/

	/*forum_post*/
	public function update_forum_post($postinfo,$do = 'add',$pid = 0) {
		if ($do == 'add') {
			if($sid = DB::result_first("select id from xk_statistics where create_date = ".xkEscape(date('Y-m-d',TIMESTAMP)))){
				DB::query("update xk_statistics set post=post+1 where create_date = ".xkEscape(date('Y-m-d',TIMESTAMP)));
			}else{
				$insertStats = array('post'=>1,'create_date'=>date('Y-m-d',TIMESTAMP));
				DB::query("insert into xk_statistics set " .xkSqlSingle($insertStats));
			}
			DB::query("insert into ".DB::table('forum_post')." set ".xkSqlSingle($postinfo));
			return DB::insert_id();
		} elseif ($do == 'update') {
			DB::query("update ".DB::table('forum_post')." set ".xkSqlSingle($postinfo)." where pid = ".xkEscape($pid));
		}
	}
	/*forum_post*/

	/*common_syscache*/
	public function update_common_syscache($pid) {
		DB::query("REPLACE INTO ".DB::table('common_syscache')."(cname, ctype, dateline, data) VALUES ('max_post_id', '0', '".TIMESTAMP."', '".$pid."')");
	}
	/*common_syscache*/

	/*common_stat*/
	public function update_common_stat($type = 'tpc',$num) {
		if ($type == 'tpc') {
			if (!DB::fetch_first("select * from ".DB::table('common_stat')." where daytime = ".date('Ymd',TIMESTAMP))) {
				DB::query("insert into ".DB::table('common_stat')." set thread = 1,daytime = ".date('Ymd',TIMESTAMP));
			} else {
				DB::query("update ".DB::table('common_stat')." set `thread`=`thread`+1 where daytime = ".date('Ymd',TIMESTAMP));
			}
		} elseif ($type == 'post') {
			DB::query("update ".DB::table('common_stat')." set `post`=`post`+1 where daytime = ".date('Ymd',TIMESTAMP));
		}
	}
	/*common_stat*/

	/*common_member_count*/
	public function update_common_member_count($uid, $type = 'tpc') {
		if ($type == 'tpc') {
			DB::query("UPDATE ".DB::table('common_member_count')." SET extcredits1=extcredits1+'0',extcredits2=extcredits2+'2',extcredits3=extcredits3+'0',threads=threads+1,posts=posts+1 WHERE uid IN ('".$uid."')");
		} else {
			DB::query("UPDATE ".DB::table('common_member_count')." SET extcredits1=extcredits1+'0',extcredits2=extcredits2+'2',extcredits3=extcredits3+'0',posts=posts+1 WHERE uid IN ('".$uid."')");
		}
		$user_count = DB::fetch_first("SELECT posts,threads FROM ".DB::table('common_member_count')." WHERE uid = ".xkEscape($uid));
		if ($_G['setting']['version'] == 'X2.5') {
			C::t('common_member_count')->update($uid, array('posts' => $user_count['posts'], 'threads' => $user_count['threads']));
		}
	}
	/*common_member_count*/

	/*forum_forum*/
	public function update_forum_forum($tid,$subject,$postdate,$username,$fid,$type='tpc') {
		//$lasterpost_str = "$tid\t$subject\t$postdate\t$username";
		if ($type == 'tpc') {
			DB::query("UPDATE ".DB::table('forum_forum')." SET threads=threads+1, posts=posts+1, todayposts=todayposts+1 WHERE fid=".xkEscape($fid));
		}elseif($type == 'post'){
			DB::query("UPDATE ".DB::table('forum_forum')." SET posts=posts+1, todayposts=todayposts+1 WHERE fid=".xkEscape($fid));
		}		
	}
	/*forum_forum*/

	/*forum_attachment*/
	public function update_forum_attachment_index($attinfo_index) {
		DB::query("insert into ".DB::table('forum_attachment')." set ".xkSqlSingle($attinfo_index));
		return DB::insert_id();
	}
	/*forum_attachment*/

	/*forum_attachment_i*/
	public function update_forum_attachment($attinfo,$tid) {
		$att_tableid = 'forum_attachment_'.($tid%10);
		DB::query("insert into ".DB::table($att_tableid)." set ".xkSqlSingle($attinfo));
	}
	/*forum_attachment_i*/

	/*update_threadimage*/
	public function update_threadimage($data) {
		DB::query("insert into ".DB::table('forum_threadimage')." set ".xkSqlSingle($data));
	}
}
?>