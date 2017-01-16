<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
class CMSDB{
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
	public function update_portal_article_title($threadinfo,$do = 'add',$aid = 0) {
		if ($do == 'add') {
			if($sid = DB::result_first("select id from xk_statistics where create_date = ".xkEscape(date('Y-m-d',TIMESTAMP)))){
				DB::query("update xk_statistics set thread=thread+1 where create_date = ".xkEscape(date('Y-m-d',TIMESTAMP)));
			}else{
				$insertStats = array('thread'=>1,'create_date'=>date('Y-m-d',TIMESTAMP));
				DB::query("insert into xk_statistics set " .xkSqlSingle($insertStats));
			}
			DB::query("insert into ".DB::table('portal_article_title')." set ".xkSqlSingle($threadinfo));
			return DB::insert_id();
		} elseif ($do == 'update') {
			DB::query("update ".DB::table('portal_article_title')." set ".xkSqlSingle($threadinfo).' where aid='.xkEscape($aid));
		}
	}
	/*forum_thread*/
	
	/*common_member_field_home*/
	public function update_common_member_field_home($updateinfo,$uid = 0) {
		DB::query("update ".DB::table('common_member_field_home')." set ".xkSqlSingle($updateinfo)." where uid = ".xkEscape($uid));
	}
	/*common_member_field_home*/

	/*update_portal_category*/
	public function update_portal_category($catid) {
		DB::query("UPDATE ".DB::table('portal_category')." set `articles`=`articles`+'1' WHERE catid IN (".$catid.")");
		return DB::insert_id();
	}
	/*forum_post_tableid*/

	/*portal_article_content*/
	public function update_portal_article_content($portal_article_content,$do = 'add',$pid = 0) {
		if ($do == 'add') {
			if($sid = DB::result_first("select id from xk_statistics where create_date = ".xkEscape(date('Y-m-d',TIMESTAMP)))){
				DB::query("update xk_statistics set post=post+1 where create_date = ".xkEscape(date('Y-m-d',TIMESTAMP)));
			}else{
				$insertStats = array('post'=>1,'create_date'=>date('Y-m-d',TIMESTAMP));
				DB::query("insert into xk_statistics set " .xkSqlSingle($insertStats));
			}
			DB::query("insert into ".DB::table('portal_article_content')." set ".xkSqlSingle($portal_article_content));
			return DB::insert_id();
		} elseif ($do == 'update') {
			DB::query("update ".DB::table('portal_article_content')." set ".xkSqlSingle($portal_article_content)." where cid = ".xkEscape($pid));
		}
	}
	/*forum_post*/

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

	/*forum_attachment_i*/
	public function update_portal_attachment($attinfo) {
		DB::query("insert into ".DB::table('portal_attachment')." set ".xkSqlSingle($attinfo));
		return DB::insert_id();
	}
	/*forum_attachment_i*/

	/*update_threadimage*/
	public function update_portal_comment($data,$do = 'add',$cid = 0) {
		if($do == 'add') {
			DB::query("insert into ".DB::table('portal_comment')." set ".xkSqlSingle($data));
			return DB::insert_id();
		} elseif ($do == 'update') {
			DB::query("update ".DB::table('portal_comment')." set ".xkSqlSingle($data)." where cid = ".xkEscape($cid));
		}
	}

	/*portal_article_count*/
	public function update_portal_article_count($data,$do = 'add',$aid = 0) {
		if($do == 'add') {
			DB::query("insert into ".DB::table('portal_article_count')." set ".xkSqlSingle($data));
			return DB::insert_id();
		} elseif ($do == 'update') {
			DB::query("update ".DB::table('portal_article_count')." set ".xkSqlSingle($data)." where aid = ".xkEscape($aid));
		}
	}
	/*portal_article_count*/
}
?>