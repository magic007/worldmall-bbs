<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
if(!defined('CURSCRIPT')) {
	exit('Access Denied');
}
require_once DISCUZ_ROOT.'./source/function/function_editor.php';
class BASE_SPIDER{
	public $bridge;
	public $configure;
	public $snoopy;
	public $majia_bind;

	public function BASE_SPIDER(){
		$this->__construct();
	}

	public function __construct($stype,$configure){
		global $face;
		$this->configure = $configure;;
		require_once(SPIDER_LIBRARY_DIR.'base/dom.parse.class.php');
		require_once(SPIDER_LIBRARY_DIR.'base/snoopy.class.php');
		require_once(SPIDER_LIBRARY_DIR.'base/xkimage.class.php');
		$this->snoopy = new Snoopy();
		$this->bridge = $this->loadtbridge($stype,$this->snoopy,$this->configure);
		$query = DB::query('select code from '.DB::table('common_smiley').' where id > 0');
		while($rt = DB::fetch($query)) {
			$face[] = $rt['code'];
		}
		$this->do_login();
		$this->snoopy->agent = "Mozilla/5.0 (Windows NT 6.1; rv:5.0) Gecko/20100101 Firefox/5.0 FirePHP/0.6";
		if (isset($this->configure['referer'])) {
			$this->snoopy->referer = $this->configure['referer'];	
		}
		if(isset($this->configure['cookie'])){
			foreach($this->configure['cookie'] as $key=>$value){
				$this->snoopy->cookies[$key] = $value; 
			}
		}
	}

	public function do_login(){
		$login_config = array();
		$login_url = $this->configure['login_url'];
		$login_config[$this->configure['login_core_params'][1]] = (isset($this->configure['login_core_default'])) ? $this->configure['login_core_default'][1] : $this->configure['v_password'];
		$login_config[$this->configure['login_core_params'][0]] = (isset($this->configure['login_core_default'])) ? $this->configure['login_core_default'][0] : $this->configure['v_username'];
		$login_config = array_merge($login_config,$this->configure['login_params']);
		$this->configure['zhuanma'] && $login_config = $this->convert_utf($login_config);
		$this->snoopy->submit($login_url,$login_config);
		//将接受到的cookie转变为发送的cookie
		$this->snoopy->setcookies();
	}

	public function convert_utf($str){
		if(is_array($str)){
			foreach($str as $key=>$value){
				$str[$key] = mb_convert_encoding($value,'UTF-8', 'GBK');
			}
		}else{
			$str = mb_convert_encoding($str,'UTF-8', 'GBK');
		}
		return $str;
	}

	public function run_s($tid=0,$nowpage=0,$allpage=0){
		global $majia_bind;
		$tpcdetail = $postdetail = $tpcinfo = $postinfo = array();
		$this->configure['range'] = str_replace('&amp;','&',$this->configure['range']);
		if ($tid == 0 ){
			$tmpArr = DB::fetch_first('select * from xk_spider_url where url = '.xkEscape($this->configure['range']));
			if ($tmpArr){
				if($this->configure['replay_try']) {
					$tid = $tmpArr['tid'];
					if(DB::fetch_first('select * from '.DB::table('forum_thread').' where tid = '.xkEscape($tid))) {
						DB::query("delete from ".DB::table('forum_post')." where tid =".xkEscape($tid)." and first = 0");
					}else{
						$tid = 0;
					}
				}else{
					if ($this->configure['spider_type']) {
						$tmpArr = DB::fetch_first('select * from xk_spider_job where id = '.xkEscape($this->configure['jobid']));
						if($tmpArr['all_num']>=$tmpArr['current_num']) {
							DB::query('update xk_spider_job set current_num=current_num+1 where id = '.xkEscape($this->configure['jobid']));
						}
					} else {
						DB::query('update xk_spider_job set if_finish=1 where id = '.xkEscape($this->configure['jobid']));
					}
					if(is_file(D_P.'data/plugindata/majia_bind_'.$tid.'.php')) {
						@unlink(D_P.'data/plugindata/majia_bind_'.$tid.'.php');
					}
					return array(-1,0,0);	
				}
			}
			list($tid,$allpage) = $this->run_s_tpc($tid);
			if (!$tid) return array(-1,0,0);
			DB::query('update xk_spider_job set state=2,tid='.xkEscape($tid).',per_all='.xkEscape($allpage).' where id = '.xkEscape($this->configure['jobid']));
			if ($this->configure['spider_type']) {
				$tmpArr = DB::fetch_first('select * from xk_spider_job where id = '.xkEscape($this->configure['jobid']));
				if($tmpArr['all_num']>=$tmpArr['current_num']) {
					DB::query('update xk_spider_job set current_num=current_num+1 where id = '.xkEscape($this->configure['jobid']));
				}
			}
		}
		if($this->configure['replay']){
			if(is_file(D_P.'data/plugindata/majia_bind_'.$tid.'.php')) {
				require_once (D_P.'data/plugindata/majia_bind_'.$tid.'.php');
			}
			if ($nowpage <= $allpage) {
				$nowpage = $this->run_s_post($tid,$nowpage);
				if ($nowpage > $allpage) {
					if ($this->configure['spider_type']) {
						$tmpArr = DB::fetch_first('select * from xk_spider_job where id = '.xkEscape($this->configure['jobid']));
						if($tmpArr['all_num']==$tmpArr['current_num']) {
							DB::query('update xk_spider_job set if_finish=1 where id = '.xkEscape($this->configure['jobid']));
							if(is_file(D_P.'data/plugindata/majia_bind_'.$tid.'.php')) {
								@unlink(D_P.'data/plugindata/majia_bind_'.$tid.'.php');
							}
						}
					} else {
						DB::query('update xk_spider_job set if_finish=1 where id = '.xkEscape($this->configure['jobid']));
						if(is_file(D_P.'data/plugindata/majia_bind_'.$tid.'.php')) {
							@unlink(D_P.'data/plugindata/majia_bind_'.$tid.'.php');
						}
					}
				}
			}
		}
		unset($threadlist,$tpcinfo,$tpc_url,$detail,$tpcinfo,$posts);
		return array($tid,$allpage,$nowpage);
	}

	public function set_configure($key,$value){
		$this->configure[$key] = $value;
	}
	
	public function get_pages(){}

	public function run_s_tpc($tid_try = 0){
		global $baseconfig,$xk_rewrite;
		$tpcdetail = $tpcinfo = array();
		$tpc_url = $this->configure['range'];
		$tpcdetail = $this->get_tpcdetail($tpc_url);
		$page_all = isset($tpcdetail['post_pages']) ? $tpcdetail['post_pages'] : 1;
		if($tid_try > 0) return array($tid_try,$page_all);
		$tpcdetail['subject'] = trim($tpcdetail['subject']);
		if(empty($tpcdetail['subject'])) {
			if ($this->configure['spider_type']) {
				$tmpArr = DB::fetch_first('select * from xk_spider_job where id = '.xkEscape($this->configure['jobid']));
				if($tmpArr['all_num']>=$tmpArr['current_num']) {
					DB::query('update xk_spider_job set current_num=current_num+1 where id = '.xkEscape($this->configure['jobid']));
				}
			} else {
				DB::query('update xk_spider_job set if_finish=1 where id = '.xkEscape($this->configure['jobid']));
			}
			return;
		}
		//过滤处理
		if(!empty($this->configure['filter_username_cai'])) {
			$u_tmp_arr = explode(',',$this->configure['filter_username_cai']);
			if(count($u_tmp_arr)>0) {
				if(!in_array($tpcdetail['author'],$u_tmp_arr)) {
					if ($this->configure['spider_type']) {
						$tmpArr = DB::fetch_first('select * from xk_spider_job where id = '.xkEscape($this->configure['jobid']));
						if($tmpArr['all_num']>=$tmpArr['current_num']) {
							DB::query('update xk_spider_job set current_num=current_num+1 where id = '.xkEscape($this->configure['jobid']));
						}
					} else {
						DB::query('update xk_spider_job set if_finish=1 where id = '.xkEscape($this->configure['jobid']));
					}
					return;	
				}
			}
		}
		if(!empty($this->configure['filter_username'])) {
			$u_tmp_arr = explode(',',$this->configure['filter_username']);
			if(count($u_tmp_arr)>0) {
				if(in_array($tpcdetail['author'],$u_tmp_arr)) {
					if ($this->configure['spider_type']) {
						$tmpArr = DB::fetch_first('select * from xk_spider_job where id = '.xkEscape($this->configure['jobid']));
						if($tmpArr['all_num']>=$tmpArr['current_num']) {
							DB::query('update xk_spider_job set current_num=current_num+1 where id = '.xkEscape($this->configure['jobid']));
						}
					} else {
						DB::query('update xk_spider_job set if_finish=1 where id = '.xkEscape($this->configure['jobid']));
					}
					return;	
				}
			}
		}
		if(!empty($this->configure['filter_keywords_cai'])) {
			$k_tmp_arr = explode(',',$this->configure['filter_keywords_cai']);
			if(count($k_tmp_arr)>0) {
				foreach($k_tmp_arr as $value){
					if(strpos($tpcdetail['content'],$value)===false) {
						if ($this->configure['spider_type']) {
							$tmpArr = DB::fetch_first('select * from xk_spider_job where id = '.xkEscape($this->configure['jobid']));
							if($tmpArr['all_num']>=$tmpArr['current_num']) {
								DB::query('update xk_spider_job set current_num=current_num+1 where id = '.xkEscape($this->configure['jobid']));
							}
						} else {
							DB::query('update xk_spider_job set if_finish=1 where id = '.xkEscape($this->configure['jobid']));
						}
						return;
					}
				}
			}
		}
		if(!empty($this->configure['filter_keywords'])) {
			$k_tmp_arr = explode(',',$this->configure['filter_keywords']);
			if(count($k_tmp_arr)>0) {
				foreach($k_tmp_arr as $value){
					if(strpos($tpcdetail['content'],$value)!==false) {
						if ($this->configure['spider_type']) {
							$tmpArr = DB::fetch_first('select * from xk_spider_job where id = '.xkEscape($this->configure['jobid']));
							if($tmpArr['all_num']>=$tmpArr['current_num']) {
								DB::query('update xk_spider_job set current_num=current_num+1 where id = '.xkEscape($this->configure['jobid']));
							}
						} else {
							DB::query('update xk_spider_job set if_finish=1 where id = '.xkEscape($this->configure['jobid']));
						}
						return;
					}
				}
			}
		}
		//发帖时间模拟
		if(!$this->configure['moniposttime']){
			if (!empty($this->configure['tpc_time'])) {
				$tpcdetail['postdate'] = PwStrtoTime($this->configure['tpc_time'])+3600*8;
			} else {
				$tpcdetail['postdate'] = time();	
			}
		}
		if(in_array('2',$this->configure['keyword'])){
			$pass = false;
			foreach($baseconfig['global_keywords'][$this->configure['t_fid']] as $key=>$value){
				if(false !== strpos($tpcdetail['content'],$value)){
					$pass = true;break;
				}
			}
			if(!$pass) return null;
		}
		//end
		//添加全局和局部替换
		foreach($baseconfig['global_replaces'] as $key=>$value){
			$tpcdetail['subject'] = str_replace($value[0],$value[1],$tpcdetail['subject']);
			$tpcdetail['content'] = str_replace($value[0],$value[1],$tpcdetail['content']);
		}

		//伪原创处理
		if($this->configure['wyc_replace']){
			foreach($xk_rewrite['source_replaces'] as $key=>$value){
				$tpcdetail['subject'] = str_replace($key,$value,$tpcdetail['subject']);
				$tpcdetail['content'] = str_replace($key,$value,$tpcdetail['content']);
			}
		}
		if(in_array('1',$this->configure['wyc']) && isset($xk_rewrite)){
			$rand_key = array_rand($xk_rewrite['source_title_header'],1);
			$tpcdetail['subject'] = $xk_rewrite['source_title_header'][$rand_key].$tpcdetail['subject'];
		}
		if(in_array('2',$this->configure['wyc']) && isset($xk_rewrite)){
			$rand_key = array_rand($xk_rewrite['source_title_tail'],1);
			$tpcdetail['subject'] = $tpcdetail['subject'].$xk_rewrite['source_title_tail'][$rand_key];
		}
		if(in_array('3',$this->configure['wyc']) && isset($xk_rewrite)){
			$rand_key = array_rand($xk_rewrite['source_thread_header'],1);
			$tpcdetail['content'] = $xk_rewrite['source_thread_header'][$rand_key].$tpcdetail['content'];
		}
		if(in_array('4',$this->configure['wyc']) && isset($xk_rewrite)){
			$rand_key = array_rand($xk_rewrite['source_thread_tail'],1);
			$tpcdetail['content'] = $tpcdetail['content'].$xk_rewrite['source_thread_tail'][$rand_key];
		}
		if(in_array('7',$this->configure['wyc']) && isset($xk_rewrite)){
			$rand_key = array_rand($xk_rewrite['source_thread_hidden_text'],1);
			$hidden_text = $xk_rewrite['source_thread_hidden_text'][$rand_key];
			$tpcdetail['content'] = str_replace(array('<br />'),
												'<br /><span style="display:none">'.$hidden_text.'</span>',
												$tpcdetail['content']);

			$tpcdetail['content'] = str_replace(array('</span>'),
												'</span><span style="display:none">'.$hidden_text.'</span>',
												$tpcdetail['content']);
			$tpcdetail['content'] = str_replace(array('</font>'),
												'</font><span style="display:none">'.$hidden_text.'</span>',
												$tpcdetail['content']);
			$tpcdetail['content'] = str_replace(array('</tr>'),
												'</tr><span style="display:none">'.$hidden_text.'</span>',
												$tpcdetail['content']);
		}
		//end
		//用户随机算发兼容
		if(!$this->configure['localuser'] || empty($tpcdetail['author'])){
			$uids_tmp = $uids_info_tmp = array();
			$query = DB::query("SELECT uid,username FROM ".DB::table('common_member')." WHERE if_robot = 1 limit 0,500");
			while($rt = DB::fetch($query)){
				$uids_tmp[] = $rt['uid'];
				$uids_info_tmp[$rt['uid']] = $rt['username'];
			}
			$rand_uid = array_rand($uids_tmp,1);
			$tpcdetail['author'] = $uids_info_tmp[$uids_tmp[$rand_uid]];
		}
		if(count($baseconfig['global_majia']) > 1 && in_array('1',$this->configure['majia'])){
			$rand_key = array_rand($baseconfig['global_majia'],1);
			$author_tmp = $tpcdetail['author'];
			$tpcdetail['author'] = $baseconfig['global_majia'][$rand_key];
			$majia_bind_data[$author_tmp] = $tpcdetail['author'];
		}
		if($this->configure['local_att']) list($tpcdetail['aids'],$tpcdetail['content']) = $this->get_tpcimgs($tpcdetail['content']);
		DB::query('update xk_spider_job set state=1 where id = '.xkEscape($this->configure['jobid']));
		$tpcdetail['ifupload'] = (empty($tpcdetail['aids'])) ? 0 : 1;
		$tpcinfo = $this->build_tpcinfo($tpcdetail);
		$tpcinfo['source_key'] = $this->configure['s_type'];
		$this->bridge->set_tpc_info($tpcinfo);
		$tid = $this->bridge->run('tpc');
		$insertArr = array('type'=>$this->configure['s_type'],'tid'=>$tid,'url'=>$this->configure['range']);
		$insert_url_tmp = DB::query("insert into xk_spider_url set ".xkSqlSingle($insertArr));
		unset($tpcinfo,$tpcdetail,$insert_url_tmp,$insertArr,$tpc_url,$uids_tmp,$uids_info_tmp,$rand_key,$author_tmp,$tpc_url);
		$allpage = ($page_all == 0 || empty($page_all)) ? 1 : $page_all;
		$this->save_majia_bind($majia_bind_data,$tid);
		return array($tid,$page_all);
	}

	public function run_s_post($tid,$nowpage = 1){
		global $baseconfig,$majia_bind,$xk_rewrite;
		$postdetail = $postinfo = array();
		$nextpage = $nowpage + 1;
		for($i=$nowpage;$i<$nextpage;$i++) {
			DB::query('update xk_spider_job set state=3,per_num='.xkEscape($i).' where id = '.xkEscape($this->configure['jobid']));
			$post_url = $this->get_post_url($i);
			$postdetail = array_merge($postdetail,$this->get_postdetail($post_url,$i));
		}
		//回复总数控制
		if(intval($this->configure['replay_all']) > 0){
			$now_posts = DB::result_first("select count(pid) from ".DB::table('forum_post')." where tid = ".xkEscape($tid));
			$now_posts -=1;
			if($now_posts >= intval($this->configure['replay_all'])){
				$postdetail = array();
				if ($this->configure['spider_type']) {
					$tmpArr = DB::fetch_first('select * from xk_spider_job where id = '.xkEscape($this->configure['jobid']));
					if($tmpArr['all_num']+1==$tmpArr['current_num']) {
						DB::query('update xk_spider_job set if_finish=1 where id = '.xkEscape($this->configure['jobid']));
					}
				} else {
					DB::query('update xk_spider_job set if_finish=1 where id = '.xkEscape($this->configure['jobid']));
					if(is_file(D_P.'data/plugindata/majia_bind_'.$tid.'.php')) {
						@unlink(D_P.'data/plugindata/majia_bind_'.$tid.'.php');
					}
				}
				return 10000;
			}elseif(($now_posts + count($postdetail)) >= intval($this->configure['replay_all'])){
				$need_put = intval(intval($this->configure['replay_all']) - $now_posts);
				$postdetail = array_slice($postdetail,0,$need_put);
				if ($this->configure['spider_type']) {
					$tmpArr = DB::fetch_first('select * from xk_spider_job where id = '.xkEscape($this->configure['jobid']));
					if($tmpArr['all_num']+1==$tmpArr['current_num']) {
						DB::query('update xk_spider_job set if_finish=1 where id = '.xkEscape($this->configure['jobid']));
					}
				} else {
					DB::query('update xk_spider_job set if_finish=1 where id = '.xkEscape($this->configure['jobid']));
					if(is_file(D_P.'data/plugindata/majia_bind_'.$tid.'.php')) {
						@unlink(D_P.'data/plugindata/majia_bind_'.$tid.'.php');
					}
				}
			}
		}
		//end
		//单页回复随机
		if(intval($this->configure['replay_perpage']) > 0){
			if($nowpage == '1' && intval($this->configure['replay_all']) > intval($this->configure['replay_perpage'])){
				$this->configure['replay_perpage'] = intval($this->configure['replay_all']);
			}
			if(count($postdetail) > intval($this->configure['replay_perpage'])){
				$new_postdetail = array();
				$tmp_keys = array_rand($postdetail,intval($this->configure['replay_perpage']));
				foreach($tmp_keys as $key=>$value){
					$new_postdetail[] = $postdetail[$value];
				}
				unset($postdetail);
				$postdetail = $new_postdetail;	
			}
		}
		//end
		if(count($postdetail) == 0) {
			DB::query('update xk_spider_job set state=3,per_num='.xkEscape($i).' where id = '.xkEscape($this->configure['jobid']));
			return 10000;
		}
		//用户随机算发兼容
		if(!$this->configure['localuser'] || empty($value['author'])){
			$uids_tmp = $uids_info_tmp = array();
			$query = DB::query("SELECT uid,username FROM ".DB::table('common_member')." WHERE if_robot = 1 limit 0,500");
			while($rt = DB::fetch($query)){
				$uids_tmp[] = $rt['uid'];
				$uids_info_tmp[$rt['uid']] = $rt['username'];
			}
		}
		
		//回帖时间间隔处理
		$postdate_arr =  DB::fetch_first("SELECT dateline,lastpost FROM ".DB::table('forum_thread')." where tid = ".xkEscape($tid));
		if ($postdate_arr['dateline'] > $postdate_arr['lastpost']) {
			$last_postdate = $postdate_arr['dateline'];
		} else {
			$last_postdate = $postdate_arr['lastpost'];
		}
		$tmp_postdate = 0;
		foreach($postdetail as $key=>$value){
			//过滤处理
			if(!empty($this->configure['filter_username_cai'])) {
				$u_tmp_arr = explode(',',$this->configure['filter_username']);
				if(count($u_tmp_arr)>0) {
					if(!in_array($value['author'],$u_tmp_arr)) {
						unset($postdetail[$key]);
						continue;
					}
				}
			}
			if(!empty($this->configure['filter_username'])) {
				$u_tmp_arr = explode(',',$this->configure['filter_username']);
				if(count($u_tmp_arr)>0) {
					if(in_array($value['author'],$u_tmp_arr)) {
						unset($postdetail[$key]);
						continue;
					}
				}
			}
			//发帖时间模拟
			if(!$this->configure['moniposttime']){
				if (!empty($this->configure['tpc_time'])) {
					if (intval($tmp_postdate+$this->configure['post_time_max']*60) < time()) {
						if ($tmp_postdate > 0) {
							$postdetail[$key]['postdate'] = $tmp_postdate+rand($this->configure['post_time_min'],$this->configure['post_time_max'])*60;
							$tmp_postdate += rand($this->configure['post_time_min'],$this->configure['post_time_max'])*60;
						}else {
							$postdetail[$key]['postdate'] = $last_postdate+rand($this->configure['post_time_min'],$this->configure['post_time_max'])*60;
							$tmp_postdate = $last_postdate+rand($this->configure['post_time_min'],$this->configure['post_time_max'])*60;
						}
					}else {
						if ($tmp_postdate > 0) {
							$postdetail[$key]['postdate'] = $tmp_postdate+rand(0,time()-$tmp_postdate);
							$tmp_postdate += rand(0,time()-$tmp_postdate);
						}else {
							$postdetail[$key]['postdate'] = $last_postdate+rand(0,time()-$last_postdate);
							$tmp_postdate = $last_postdate+rand(0,time()-$last_postdate);
						}
					}
				} else {
					$postdetail[$key]['postdate'] = time();	
				}
			}
			//添加全局和局部替换
			foreach($baseconfig['global_replaces'] as $k1=>$v1){
				$value['content'] = str_replace($v1[0],$v1[1],$value['content']);
			}
			if(count($baseconfig['global_majia']) > 1 && in_array('2',$this->configure['majia'])){
				$rand_key = array_rand($baseconfig['global_majia'],1);
				$postdetail[$key]['author'] = $baseconfig['global_majia'][$rand_key];
				if(in_array('1',$this->configure['majia'])){
					if(!in_array($value['author'],array_keys($majia_bind))){
						$majia_bind[$value['author']] = $postdetail[$key]['author'];
					}else{
						$postdetail[$key]['author'] = $majia_bind[$value['author']];
					}
				}
			}
			//伪原创操作
			if($this->configure['wyc_replace']){
				foreach($xk_rewrite['source_replaces'] as $k=>$v){
					$value['content'] = str_replace($k,$v,$value['content']);
				}
			}
			if(in_array('5',$this->configure['wyc']) && isset($xk_rewrite)){
				$rand_key = array_rand($xk_rewrite['source_post_header'],1);
				$value['content'] = $xk_rewrite['source_post_header'][$rand_key].$value['content'];
			}
			if(in_array('6',$this->configure['wyc']) && isset($xk_rewrite)){
				$rand_key = array_rand($xk_rewrite['source_post_tail'],1);
				$value['content'] = $value['content'].$xk_rewrite['source_post_tail'][$rand_key];
			}
			if(in_array('8',$this->configure['wyc']) && isset($xk_rewrite)){
				$rand_key = array_rand($xk_rewrite['source_post_hidden_text'],1);
				$hidden_text = $xk_rewrite['source_post_hidden_text'][$rand_key];
				$value['content'] = str_replace(array('<br />'),
												'<br /><span style="display:none">'.$hidden_text.'</span>',
												$value['content']);
				$value['content'] = str_replace(array('</span>'),
													'</span><span style="display:none">'.$hidden_text.'</span>',
													$value['content']);
				$value['content'] = str_replace(array('</font>'),
													'</font><span style="display:none">'.$hidden_text.'</span>',
													$value['content']);
				$value['content'] = str_replace(array('</tr>'),
												'</tr><span style="display:none">'.$hidden_text.'</span>',
												$value['content']);
			}
			//end
			//用户随机算发兼容
			if(!$this->configure['localuser'] || empty($value['author'])){
				$rand_uid = array_rand($uids_tmp,1);
				$postdetail[$key]['author'] = $uids_info_tmp[$uids_tmp[$rand_uid]];
			}
			if($this->configure['local_att']) list($postdetail[$key]['aids'],$postdetail[$key]['content']) = $this->get_tpcimgs($value['content']);
		}
		if($this->configure['replay_own'] && count($postdetail)>0 && $baseconfig['global_posts'][0][0] != ''){
			$uids_tmp = $uids_info_tmp = array();
			$query = DB::query("SELECT uid,username FROM ".DB::table('common_member')." WHERE if_robot = 1 limit 0,500");
			while($rt = DB::fetch($query)){
				$uids_tmp[] = $rt['uid'];
				$uids_info_tmp[$rt['uid']] = $rt['username'];
			}
			if(count($baseconfig['global_majia']) > 1 && in_array('3',$this->configure['majia'])){
				$rand_key = array_rand($baseconfig['global_majia'],1);
				$tem['author'] = $baseconfig['global_majia'][$rand_key];
			}else{
				$rand_uid = array_rand($uids_tmp,1);
				$tem['author'] = $uids_info_tmp[$uids_tmp[$rand_uid]];
			}
			$rand_key = array_rand($baseconfig['global_posts'],1);
			$count = count($postdetail)-1;
			$tem['content'] = $baseconfig['global_posts'][$rand_key];
			$tem['postdate'] = $postdetail[$count]['postdate'] + 60;
			$postdetail[] = $tem;
		}
		$postinfo = $this->build_postinfo($postdetail,$tid);
		$this->bridge->set_post_info($postinfo);
		$this->bridge->run('post');
		$this->save_majia_bind($majia_bind,$tid);
		return intval($nextpage);
	}

	public function save_majia_bind($majia_bind,$tid) {
		$file_name ='majia_bind_'.$tid.'.php';
		$cacheStr = "\$majia_bind=".xk_var_export($majia_bind).";\r\n";
		writeover(D_P."data/plugindata/$file_name","<?php\r\n".$cacheStr."\r\n?>");
	}

	public function get_threadlist($threadurl){}

	public function get_tpcdetail($tpcurl){}

	public function get_postdetail($post_url,$page){}

	public function build_tpcinfo($tpcarr){
		$tpcinfo = array();
		$tpcinfo['author'] = $tpcarr['author'];
		$tpcinfo['face'] = $tpcarr['face'];
		$tpcinfo['fid'] = $this->configure['t_fid'];
		$tpcinfo['fname'] = $this->configure['t_fname'];
		$tpcinfo['type'] = $this->configure['type'];
		$tpcinfo['postdate'] = $tpcarr['postdate']-3600*8;
		$tpcinfo['subject'] = $tpcarr['subject'];
		$tpcinfo['content'] = ($this->configure['cmode'] == 2 || strpos($tpcarr['content'],'<embed')!==false || strpos($tpcarr['content'],'<object')!==false) ? $tpcarr['content'] : htmlspecialchars_decode(html2bbcode($tpcarr['content']));
		$tpcinfo['ifupload'] = $tpcarr['ifupload'];
		$tpcinfo['ifmail'] = '1';
		$tpcinfo['aids'] = $tpcarr['aids'];
		$tpcinfo['ifcheck'] = ($this->configure['ifcheck']) ? -2 : 0;
		$tpcinfo['views'] = rand($this->configure['view_num_min'],$this->configure['view_num_max']);
		return $tpcinfo;
	}

	public function build_postinfo($postarr,$tid){
		$postinfo = array();
		foreach($postarr as $key=>$value){
			if(empty($value['content'])) unset($postarr[$key]);
			$new_value = array();
			$new_value['tid'] = $tid;
			$new_value['fid'] = $this->configure['t_fid'];
			$new_value['content'] = ($this->configure['cmode'] == 2 || strpos($value['content'],'<embed')!==false || strpos($value['content'],'<object')!==false) ? $value['content'] : htmlspecialchars_decode(html2bbcode($value['content']));
			$new_value['author'] = $value['author'];
			$new_value['face'] = $value['face'];
			$new_value['postdate'] = $value['postdate'];
			$new_value['subject'] = '';
			$new_value['aids'] = $value['aids'];
			$postinfo[$key] = $new_value;
		}
		return $postinfo;
	}
	
	public function get_majiabind(){
		return $this->majia_bind;
	}

	public function build_majia_bind(){
		$majia_bind_array  = array();
		foreach($this->majia_bind as $key=>$value){
			$tmp_array = explode('---',$value);
			$majia_bind_array[$tmp_array[0]] = $tmp_array[1];
		}
		return $majia_bind_array;
	}

	public function get_tpcimgs($content){
		global $basecontrol,$baseconfig;
		$aids = array();
		$i = 1;
		$html = str_get_html($content);
		foreach($html->find('img') as $e){
			$tmp = array();
			$imgfull = $e->outertext;
			$tmp['imgurl'] = (strpos($e->src,'http') !== false) ? $e->src : $this->configure['url'].'/'.$e->src;
			$extarr = explode('.',$e->src);
			$num = count($extarr)-1;
			$ext = $extarr[$num];
			$tmp['ext'] = $ext;
			$aids[$i] = $tmp;
			$content = str_replace($imgfull,"[upload=$i]",$content);
			$i++;
		}
		foreach($html->find('a') as $e){
			$tmp = array();
			$attfull = $e->outertext;
			$ext = $e->name;
			if(in_array($ext,$baseconfig['global_att'])){
				$tmp['imgurl'] = $e->href;
				$tmp['ext'] = $ext;
				$tmp['name'] = $e->plaintext;
				$aids[$i] = $tmp;
				$content = str_replace($attfull,"[upload=$i]",$content);
				$i++;
			}
		}
		unset($html,$tmp,$extarr,$num,$i,$imgfull);
		return array($aids,$content);
	}

	public function loadtbridge($stype,$snoopy,$configure){
		require_once SPIDER_LIBRARY_DIR.'base.bridge.php';
		$mode = 'thread';
		if($this->configure['cmode'] == 2) {
			$mode = 'cms';
		}
		$t_bridge = new BASE_BRIDGE($mode,$snoopy,$configure);
		return $t_bridge;
	}

}