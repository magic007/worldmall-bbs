<?php
/*
 * Copyright (c) 2011 by YinXiangMa.com
 * Author: HongXiang Duan, YiQiang Wang, ShuMing Hu
 * Created: 2011-5-5
 * Function: YinXiangMa API php code
 * Version: v2.3
 * Date: 2012-8-10
 * PHP library for YinXiangMa - 印象码 - 验证码广告云服务平台.
 *    - Documentation and latest version
 *          http://www.YinXiangMa.com/
 *    - Get a YinXiangMa API Keys
 *          http://www.YinXiangMa.com/server/signup.php
 */


/********************************************************************************************
 * 以下内容，不需要进行改动。并且，请不要改动。如果改动，可能会有错误发生。
 * "印象码 - 验证码广告云服务平台"。
 ********************************************************************************************
 */

$key = $_G['cache']['plugin']['yinxiangma']['key'];
define("PUBLISHER_KEY", $key);

$pubkey = $_G['cache']['plugin']['yinxiangma']['pubkey'];
define("YXM_PUBLIC_KEY", $pubkey);

if($_G['cache']['plugin']['yinxiangma']['url']=='')
{
	define("YXM_localsec_url","http://".$_SERVER ['HTTP_HOST']."/source/plugin/yinxiangma/localsec/");
}
else
{
	define("YXM_localsec_url","http://".$_SERVER ['HTTP_HOST']."/".$_G['cache']['plugin']['yinxiangma']['url']."/source/plugin/yinxiangma/localsec/");
}
define("YinXiangMa_Version","YinXiangMa_Dz_X2.5_2.3");


session_start(); 

function ValidResult($YinXiangMaToken,$level,$YXM_input_result){	
	if($level == '4')
	{
		if($YXM_input_result== "true")
		{
			$result= "true";
		}else
		{
			$result= "false4";
		}
	}
	else
	{
		if($YXM_input_result==md5("true".PUBLISHER_KEY.$YinXiangMaToken))
		{
			$result= "true";
		}else
		{
			$result= "false3";
		}
	}
	return $result;
}

/**
 * Display YinXiangMa Widget
 */
function YinXiangMa_GetYinXiangMaWidget(){
	return "<script type='text/javascript' charset='gbk'>
		var YXM_localsec_url = '".YXM_localsec_url."';
		var YXM_isajax  = '1';
		var YXM_level = '3';
		function YXM_local_check()
		{
			if(typeof(YinXiangMaDataString)!='undefined')return;
			YXM_oldtag = document.getElementById('YXM_script');
			var YXM_localjs=document.createElement('script');
				YXM_localjs.setAttribute(\"type\",\"text/javascript\");
				YXM_localjs.setAttribute(\"id\",\"YXM_script\");
				YXM_localjs.setAttribute(\"src\", '".YXM_localsec_url."yinxiangma.js?pk=".YXM_PUBLIC_KEY."&m=live&v=".YinXiangMa_Version."&a=1&j=1');
			YXM_oldtag.parentNode.replaceChild(YXM_localjs,YXM_oldtag);  
		}
		document.write(\"<input type='hidden' id='YXM_here'/><script type='text/javascript' charset='gbk' id='YXM_script' async src='http://api.yinxiangma.com/api2/yzm.yinxiangma.php?pk=".YXM_PUBLIC_KEY."&m=live&v=js&a=1&j=1'><\"+\"/script>\");
		setTimeout(\"YXM_local_check()\",3000);
		</script>";
}
?>