<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
if(!defined('CURSCRIPT')) {
	exit('Access Denied');
}
class BASE_CONFIG{
	public $configure;

	public function BASE_CONFIG(){
		$this->__construct();
	}

	public function __construct($c_type,$base_config){
		global $save_config;
		$this->configure['s_type'] = $c_type;
		$this->configure['t_fid'] = $base_config['fid'];
		$this->configure['range'] = $base_config['range'];
		$this->configure['t_fname'] = $base_config['fname'];
		$this->configure['type'] = $base_config['ttype'];
		$this->configure['jobid'] = $base_config['jobid'];
		$this->configure['spider_type'] = $base_config['spider_type'];
		$this->configure['ifcheck'] = $save_config['ifcheck'];
		$this->configure['keyword'] = $save_config['keyword'];
		$this->configure['today_count'] = $save_config['today_count'];
		$this->configure['localuser'] = $save_config['localuser'];
		$this->configure['local_att'] = $save_config['local_att'];
		$this->configure['moniposttime'] = $save_config['moniposttime'];
		$this->configure['replay'] = $save_config['replay'];
		$this->configure['replay_own'] = $save_config['replay_own'];
		$this->configure['majia'] = $save_config['majia'];
		$this->configure['replay_all'] = $save_config['replay_all'];
		$this->configure['replay_perpage'] = $save_config['replay_perpage'];
		$this->configure['wyc_replace'] = $save_config['wyc_replace'];
		$this->configure['wyc'] = $save_config['wyc'];
		$this->configure['tpc_time'] = $save_config['tpc_time'];
		$this->configure['post_time_min'] = $save_config['post_time_min'];
		$this->configure['post_time_max'] = $save_config['post_time_max'];
		$this->configure['view_num_min'] = $save_config['view_num_min'];
		$this->configure['view_num_max'] = $save_config['view_num_max'];
		$this->configure['cmode'] = $base_config['cmode'];
		$this->configure['cmode'] = $base_config['cmode'];
		$this->configure['filter_username'] = $save_config['filter_username'];
		$this->configure['filter_keywords'] = $save_config['filter_keywords'];
		$this->configure['filter_username_cai'] = $save_config['filter_username_cai'];
		$this->configure['filter_keywords_cai'] = $save_config['filter_keywords_cai'];
		$this->configure['replay_try'] = $save_config['replay_try'];
	}

	public function get_configure(){
		return $this->configure;
	}
}