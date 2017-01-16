<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
if(!defined('CURSCRIPT')) {
	exit('Access Denied');
}
class spider{
	public $t_spider;
	public $configure;

	public function spider(){
		$this->__construct();
	}

	public function __construct($sConfig){
		$ctype = $stype = $sConfig['s_type'];
		//处理爬虫配置项
		$source_v = $sConfig['s_type_v'];
		$this->configure = $this->loadconfig($ctype,$source_v,$sConfig);
		$configure = $this->configure->get_configure();
		$this->t_spider = $this->loadtspider($stype,$source_v,$configure);
	}

//加载configure类
	public function loadconfig($ctype,$source_v,$base_config){
		global $xk_config;
		require_once SPIDER_LIBRARY_DIR.'base.config.php';
		$path = D_P.'data/plugindata/'."$ctype.config.php";
		$configname = strtolower($ctype.'_config');
		if(file_exists($path)){
			require_once($path);
			if(SOURCE_VERSION < intval($source_v)) {
				@unlink($path);
				if (CHARSET == 'gbk') {
					$config_file_url = $xk_config['server_path'].'/source/'.$ctype.'/'."$ctype.config.php";
				} else {
					$config_file_url = $xk_config['server_path'].'/source/'.$ctype.'/utf/'."$ctype.config.php";
				}
				
				$config_content = file_get_contents($config_file_url);
				writeover($path,"<?php\r\n".$config_content."\r?>");
				require_once($path);
			}
			$configure = new $configname($ctype,$base_config);
			return $configure;
		}else{
			if (CHARSET == 'gbk') {
				$config_file_url = $xk_config['server_path'].'/source/'.$ctype.'/'."$ctype.config.php";
			} else {
				$config_file_url = $xk_config['server_path'].'/source/'.$ctype.'/utf/'."$ctype.config.php";
			}
			
			$config_content = file_get_contents($config_file_url);
			writeover($path,"<?php\r\n".$config_content."\r?>");
			require_once($path);
			$configure = new $configname($ctype,$base_config);
			return $configure;
		}
	}
//加载spider类
	public function loadtspider($stype,$source_v,$configure){
		global $xk_config;
		require_once SPIDER_LIBRARY_DIR.'base.spider.php';
		$path = D_P.'data/plugindata/'."$stype.spider.php";
		$spidername = strtolower($stype.'_spider');
		if(file_exists($path)){
			require_once($path);
			if(SOURCE_VERSION < intval($source_v)) {
				@unlink($path);
				if (CHARSET == 'gbk') { 
					$spider_file_url = $xk_config['server_path'].'/source/'.$stype.'/'."$stype.spider.php";
				} else {
					$spider_file_url = $xk_config['server_path'].'/source/'.$stype.'/utf/'."$stype.spider.php";
				}
				
				$spider_content = file_get_contents($spider_file_url);
				writeover($path,"<?php\r\n".$spider_content."\r?>");
				require_once($path);
			}
			$t_spider = new $spidername($stype,$configure);
			return $t_spider;
		}else{
			if (CHARSET == 'gbk') { 
				$spider_file_url = $xk_config['server_path'].'/source/'.$stype.'/'."$stype.spider.php";
			} else {
				$spider_file_url = $xk_config['server_path'].'/source/'.$stype.'/utf/'."$stype.spider.php";
			}
			$spider_content = file_get_contents($spider_file_url);
			writeover($path,"<?php\r\n".$spider_content."\r?>");
			require_once($path);
			$t_spider = new $spidername($stype,$configure);
			return $t_spider;
		}
	}
}
?>