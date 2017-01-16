<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('index');
0
|| checktplrefresh('data/diy/./template/yesmmc_N3BSK2vfZ0FtHwIb//portal/index.htm', './template/yesmmc_N3BSK2vfZ0FtHwIb/common/header.htm', 1375695112, 'diy', './data/template/7_diy_portal_index.tpl.php', 'data/diy/./template/yesmmc_N3BSK2vfZ0FtHwIb/', 'portal/index')
|| checktplrefresh('data/diy/./template/yesmmc_N3BSK2vfZ0FtHwIb//portal/index.htm', './template/yesmmc_N3BSK2vfZ0FtHwIb/common/footer.htm', 1375695112, 'diy', './data/template/7_diy_portal_index.tpl.php', 'data/diy/./template/yesmmc_N3BSK2vfZ0FtHwIb/', 'portal/index')
|| checktplrefresh('data/diy/./template/yesmmc_N3BSK2vfZ0FtHwIb//portal/index.htm', './template/yesmmc_N3BSK2vfZ0FtHwIb/common/header_common.htm', 1375695112, 'diy', './data/template/7_diy_portal_index.tpl.php', 'data/diy/./template/yesmmc_N3BSK2vfZ0FtHwIb/', 'portal/index')
;
block_get('151,158,157,156,161,160,159,149,150,153,152,154,155,162,163,166,164,167,165,168,172,171,170,169,185,184,183,182,189,188,187,186,193,192,191,190,173,174,175,176,177,178,179,180,194');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:wb="http://open.weibo.com/wb">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET;?>" />
<?php if($_G['config']['output']['iecompatible']) { ?><meta http-equiv="X-UA-Compatible" content="IE=EmulateIE<?php echo $_G['config']['output']['iecompatible'];?>" /><?php } ?>
<title><?php if(!empty($navtitle)) { ?><?php echo $navtitle;?> - <?php } if(empty($nobbname)) { ?> <?php echo $_G['setting']['bbname'];?> - <?php } ?> Powered by Discuz!</title>
<?php echo $_G['setting']['seohead'];?>

<meta name="keywords" content="<?php if(!empty($metakeywords)) { echo dhtmlspecialchars($metakeywords); } ?>" />
<meta name="description" content="<?php if(!empty($metadescription)) { echo dhtmlspecialchars($metadescription); ?> <?php } if(empty($nobbname)) { ?>,<?php echo $_G['setting']['bbname'];?><?php } ?>" />
<meta name="generator" content="Discuz! <?php echo $_G['setting']['version'];?>" />
<meta name="author" content="Discuz! Team and Comsenz UI Team" />
<meta name="copyright" content="2001-2012 Comsenz Inc." />
<meta name="MSSmartTagsPreventParsing" content="True" />
<meta http-equiv="MSThemeCompatible" content="Yes" />
<base href="<?php echo $_G['siteurl'];?>" /><link rel="stylesheet" type="text/css" href="data/cache/style_<?php echo STYLEID;?>_common.css?<?php echo VERHASH;?>" /><?php if($_G['uid'] && isset($_G['cookie']['extstyle']) && strpos($_G['cookie']['extstyle'], TPLDIR) !== false) { ?><link rel="stylesheet" id="css_extstyle" type="text/css" href="<?php echo $_G['cookie']['extstyle'];?>/style.css" /><?php } elseif($_G['style']['defaultextstyle']) { ?><link rel="stylesheet" id="css_extstyle" type="text/css" href="<?php echo $_G['style']['defaultextstyle'];?>/style.css" /><?php } ?><script type="text/javascript">var STYLEID = '<?php echo STYLEID;?>', STATICURL = '<?php echo STATICURL;?>', IMGDIR = '<?php echo IMGDIR;?>', VERHASH = '<?php echo VERHASH;?>', charset = '<?php echo CHARSET;?>', discuz_uid = '<?php echo $_G['uid'];?>', cookiepre = '<?php echo $_G['config']['cookie']['cookiepre'];?>', cookiedomain = '<?php echo $_G['config']['cookie']['cookiedomain'];?>', cookiepath = '<?php echo $_G['config']['cookie']['cookiepath'];?>', showusercard = '<?php echo $_G['setting']['showusercard'];?>', attackevasive = '<?php echo $_G['config']['security']['attackevasive'];?>', disallowfloat = '<?php echo $_G['setting']['disallowfloat'];?>', creditnotice = '<?php if($_G['setting']['creditnotice']) { ?><?php echo $_G['setting']['creditnames'];?><?php } ?>', defaultstyle = '<?php echo $_G['style']['defaultextstyle'];?>', REPORTURL = '<?php echo $_G['currenturl_encode'];?>', SITEURL = '<?php echo $_G['siteurl'];?>', JSPATH = '<?php echo $_G['setting']['jspath'];?>';</script>
<script src="<?php echo $_G['setting']['jspath'];?>common.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<script src="http://tjs.sjs.sinajs.cn/open/api/js/wb.js" type="text/javascript" type="text/javascript" charset="utf-8"></script>
<meta name="application-name" content="<?php echo $_G['setting']['bbname'];?>" />
<meta name="msapplication-tooltip" content="<?php echo $_G['setting']['bbname'];?>" />
<?php if($_G['setting']['portalstatus']) { ?><meta name="msapplication-task" content="name=<?php echo $_G['setting']['navs']['1']['navname'];?>;action-uri=<?php echo !empty($_G['setting']['domain']['app']['portal']) ? 'http://'.$_G['setting']['domain']['app']['portal'] : $_G['siteurl'].'portal.php'; ?>;icon-uri=<?php echo $_G['siteurl'];?><?php echo IMGDIR;?>/portal.ico" /><?php } ?>
<meta name="msapplication-task" content="name=<?php echo $_G['setting']['navs']['2']['navname'];?>;action-uri=<?php echo !empty($_G['setting']['domain']['app']['forum']) ? 'http://'.$_G['setting']['domain']['app']['forum'] : $_G['siteurl'].'forum.php'; ?>;icon-uri=<?php echo $_G['siteurl'];?><?php echo IMGDIR;?>/bbs.ico" />
<?php if($_G['setting']['groupstatus']) { ?><meta name="msapplication-task" content="name=<?php echo $_G['setting']['navs']['3']['navname'];?>;action-uri=<?php echo !empty($_G['setting']['domain']['app']['group']) ? 'http://'.$_G['setting']['domain']['app']['group'] : $_G['siteurl'].'group.php'; ?>;icon-uri=<?php echo $_G['siteurl'];?><?php echo IMGDIR;?>/group.ico" /><?php } if($_G['setting']['homestatus']) { ?><meta name="msapplication-task" content="name=<?php echo $_G['setting']['navs']['4']['navname'];?>;action-uri=<?php echo !empty($_G['setting']['domain']['app']['home']) ? 'http://'.$_G['setting']['domain']['app']['home'] : $_G['siteurl'].'home.php'; ?>;icon-uri=<?php echo $_G['siteurl'];?><?php echo IMGDIR;?>/home.ico" /><?php } if($_G['basescript'] == 'forum' && $_G['setting']['archiver']) { ?>
<link rel="archives" title="<?php echo $_G['setting']['bbname'];?>" href="<?php echo $_G['siteurl'];?>archiver/" />
<?php } if(defined('CURMODULE') && ($_G['basescript'] == 'forum' || $_G['basescript'] == 'group') && (CURMODULE == 'index' || CURMODULE == 'forumdisplay' || CURMODULE == 'group')) { ?><?php echo $rsshead;?><?php } if($_G['basescript'] == 'forum' || $_G['basescript'] == 'group') { if($_G['basescript'] == 'forum' && empty($_G['disabledwidthauto']) && $_G['forum_widthauto']) { ?>
<link rel="stylesheet" id="css_widthauto" type="text/css" href="data/cache/style_<?php echo STYLEID;?>_widthauto.css?<?php echo VERHASH;?>" />
<script type="text/javascript">HTMLNODE.className += ' widthauto'</script>
<?php } ?>
<script src="<?php echo $_G['setting']['jspath'];?>forum.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<?php } elseif($_G['basescript'] == 'home' || $_G['basescript'] == 'userapp') { ?>
<script src="<?php echo $_G['setting']['jspath'];?>home.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<?php } elseif($_G['basescript'] == 'portal') { ?>
<script src="<?php echo $_G['setting']['jspath'];?>portal.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<?php } if($_G['basescript'] != 'portal' && $_GET['diy'] == 'yes' && (CURMODULE == 'topic' || $_G['group']['allowdiy']) && !empty($_G['style']['tplfile'])) { ?>
<script src="<?php echo $_G['setting']['jspath'];?>portal.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<?php } if($_GET['diy'] == 'yes' && (CURMODULE == 'topic' || $_G['group']['allowdiy']) && !empty($_G['style']['tplfile'])) { ?>
<link rel="stylesheet" type="text/css" id="diy_common" href="data/cache/style_<?php echo STYLEID;?>_css_diy.css?<?php echo VERHASH;?>" />
<?php } ?>
<script src="static/image/yesmmc/js/jquery-1.4.4.min.js" type="text/javascript" type="text/javascript"></script>
<script src="static/image/yesmmc/js/share.js" type="text/javascript" type="text/javascript"></script>

<script language="javascript">	var jq = jQuery.noConflict();</script>
 
<!--[if IE 6]>
<script src="static/image/yesmmc/js/DD_belatedPNG_0.0.8a-min.js" type="text/javascript" type="text/javascript" mce_src="static/image/yesmmc/js/DD_belatedPNG_0.0.8a-min.js"></script>
<script type="text/javascript">
DD_belatedPNG.fix('#mys .ums2 a,#mys .ums2 a:hover,#mys .ums2 .lot,#mys .ums2 .lot:hover,#mys .ums2 .new,#mys .ums2 .new:hover,#mys,#mys .mysn'); 
</script> 
<![endif]-->   
 
</head>
 
<SCRIPT LANGUAGE="JavaScript"> 
<!-- Hide 
function killErrors() { 
return true; 
} 
window.onerror = killErrors; 
// --> 
</SCRIPT> 

<body id="nv_<?php echo $_G['basescript'];?>" class="pg_<?php echo CURMODULE;?>" onkeydown="if(event.keyCode==27) return false;">
<div id="append_parent"></div><div id="ajaxwaitid"></div>
<?php if($_GET['diy'] == 'yes' && (CURMODULE == 'topic' || $_G['group']['allowdiy']) && !empty($_G['style']['tplfile'])) { include template('common/header_diy'); } if(CURMODULE == 'topic' && $topic && empty($topic['useheader']) && !empty($_G['style']['tplfile']) && ($_G['group']['allowdiy'] || $_G['group']['allowaddtopic'] && $topic['uid'] == $_G['uid'] || $_G['group']['allowmanagetopic'])) { ?>
<a id="diy-tg" href="javascript:openDiy();" title="打开 DIY 面板" class="y"><img src="<?php echo STATICURL;?>image/diy/panel-toggle.png" alt="DIY" /></a>
<?php } if(empty($topic) || $topic['useheader']) { if($_G['setting']['mobile']['allowmobile'] && (!$_G['setting']['cachethreadon'] || $_G['uid']) && ($_GET['diy'] != 'yes' || !$_GET['inajax']) && ($_G['mobile'] != '' && $_G['cookie']['mobile'] == '' && $_GET['mobile'] != 'no')) { ?>
<div class="xi1 bm bm_c">
    请选择 <a href="<?php echo $_G['siteurl'];?>forum.php?mobile=yes">进入手机版</a> <span class="xg1">|</span> <a href="<?php echo $_G['setting']['mobile']['nomobileurl'];?>">继续访问电脑版</a>
</div>
<?php } if($_G['uid']) { include template('member/yesmmc_login'); } else { include template('member/login_simple'); } ?>
 


<?php if(!empty($_G['setting']['pluginhooks']['global_header'])) echo $_G['setting']['pluginhooks']['global_header'];?>
<?php } ?>
 
<!--[if IE 6]>
<script type="text/javascript">
DD_belatedPNG.fix('.tob .tobn .l,.tob .tobn .r'); 
</script> 
<![endif]--> 
 


 
<!--wrapbox02 start -->
<div class="wrap02">
 
<div id="wp" class="wp"><style id="diy_style" type="text/css">#frametn4UK4 {  background-image:none !important;margin:0px !important;background-color:transparent !important;border:0px !important;}#portal_block_149 {  margin:0px !important;border:0px !important;}#portal_block_149 .dxb_bc {  margin:0px !important;}#framej7kH6j {  background-image:none !important;margin:0px !important;background-color:transparent !important;border:0px !important;}#portal_block_150 {  margin:0px !important;border:0px !important;}#portal_block_150 .dxb_bc {  margin:0px !important;}#frame7C78du {  margin:0px !important;border:0px !important;}#portal_block_151 {  margin:0px !important;border:0px !important;}#portal_block_151 .dxb_bc {  margin:0px !important;}#portal_block_153 {  margin:0px !important;border:0px !important;}#portal_block_153 .dxb_bc {  margin:0px !important;}#frameYDMT2P {  background-image:none !important;margin:0px !important;background-color:transparent !important;border:0px !important;}#frameKLtKNY {  background-image:none !important;margin:0px !important;background-color:transparent !important;border:0px !important;}#portal_block_152 {  margin:0px !important;border:0px !important;}#portal_block_152 .dxb_bc {  margin:0px !important;}#framei6nkeF {  margin:0px !important;border:0px !important;}#portal_block_154 {  margin:0px !important;border:0px !important;}#portal_block_154 .dxb_bc {  margin:0px !important;}#frame7e1181 {  margin:0px !important;border:0px !important;}#portal_block_155 {  margin:0px !important;border:0px !important;}#portal_block_155 .dxb_bc {  margin:0px !important;}#portal_block_158 {  margin:0px !important;border:0px !important;}#portal_block_158 .dxb_bc {  margin:0px !important;}#frame2Jx21y {  background-image:none !important;margin:0px !important;background-color:transparent !important;border:0px !important;}#frameSArpyP {  background-image:none !important;margin:0px !important;background-color:transparent !important;border:0px !important;}#portal_block_157 {  margin:0px !important;border:0px !important;}#portal_block_157 .dxb_bc {  margin:0px !important;}#portal_block_156 {  margin:0px !important;border:0px !important;}#portal_block_156 .dxb_bc {  margin:0px !important;}#frameVu1NkK {  margin:0px !important;border:0px !important;}#frame41I1YB {  background-image:none !important;margin:0px !important;background-color:transparent !important;border:0px !important;}#portal_block_161 {  margin:0px !important;border:0px !important;}#portal_block_161 .dxb_bc {  margin:0px !important;}#frameUHWPV4 {  background-image:none !important;margin:0px !important;background-color:transparent !important;border:0px !important;}#portal_block_160 {  margin:0px !important;border:0px !important;}#portal_block_160 .dxb_bc {  margin:0px !important;}#frameE6XuIs {  background-image:none !important;margin:0px !important;background-color:transparent !important;border:0px !important;}#portal_block_159 {  margin:0px !important;border:0px !important;}#portal_block_159 .dxb_bc {  margin:0px !important;}#framegZvbqQ {  margin:0px !important;border:0px !important;}#frameojMmj1 {  margin:0px !important;border:0px !important;}#portal_block_162 {  margin:0px !important;border:0px !important;}#portal_block_162 .dxb_bc {  margin:0px !important;}#portal_block_163 {  margin:0px !important;border:0px !important;}#portal_block_163 .dxb_bc {  margin:0px !important;}#frameoBL7k7 {  margin:0px !important;border:0px !important;}#frameM1d8aZ {  margin:0px !important;border:0px !important;}#frameI2iPHk {  margin:0px !important;border:0px !important;}#frame06X0Uu {  margin:0px !important;border:0px !important;}#portal_block_166 {  margin:0px !important;border:0px !important;}#portal_block_166 .dxb_bc {  margin:0px !important;}#portal_block_164 {  margin:0px !important;border:0px !important;}#portal_block_164 .dxb_bc {  margin:0px !important;}#portal_block_167 {  margin:0px !important;border:0px !important;}#portal_block_167 .dxb_bc {  margin:0px !important;}#portal_block_165 {  margin:0px !important;border:0px !important;}#portal_block_165 .dxb_bc {  margin:0px !important;}#frameR0qSQr {  margin:10px 0px !important;border:0px !important;}#portal_block_168 {  margin:0px !important;border:0px !important;}#portal_block_168 .dxb_bc {  margin:0px !important;}#frameaF3dbB {  background-image:none !important;margin:0px !important;background-color:transparent !important;border:0px !important;}#portal_block_169 {  margin:0px !important;border:0px !important;}#portal_block_169 .dxb_bc {  margin:0px !important;}#frameuG409k {  margin:0px !important;border:0px !important;}#portal_block_170 {  margin:0px !important;border:0px !important;}#portal_block_170 .dxb_bc {  margin:0px !important;}#frame0lz8HH {  margin:0px !important;border:0px !important;}#portal_block_171 {  margin:0px !important;border:0px !important;}#portal_block_171 .dxb_bc {  margin:0px !important;}#portal_block_172 {  margin:0px !important;border:0px !important;}#portal_block_172 .dxb_bc {  margin:0px !important;}#frameWygkxC {  margin:0px !important;border:0px !important;}#frame1B5Z90 {  background-image:none !important;margin:0px !important;background-color:transparent !important;border:0px !important;}#portal_block_173 {  margin:0px !important;border:0px !important;}#portal_block_173 .dxb_bc {  margin:0px !important;}#frame2AfZ2f {  margin:0px !important;border:0px !important;}#portal_block_174 {  margin:0px !important;border:0px !important;}#portal_block_174 .dxb_bc {  margin:0px !important;}#framelihT46 {  margin:0px !important;border:0px !important;}#portal_block_175 {  margin:0px !important;border:0px !important;}#portal_block_175 .dxb_bc {  margin:0px !important;}#frame7YJMmb {  margin:0px !important;border:0px !important;}#portal_block_176 {  margin:0px !important;border:0px !important;}#portal_block_176 .dxb_bc {  margin:0px !important;}#framedppJwJ {  margin:0px !important;border:0px !important;}#portal_block_177 {  margin:0px !important;border:0px !important;}#portal_block_177 .dxb_bc {  margin:0px !important;}#frameq34Q3D {  background-image:none !important;margin:0px !important;background-color:transparent !important;border:0px !important;}#frame00i2vB {  background-image:none !important;margin:0px !important;background-color:transparent !important;border:0px !important;}#portal_block_179 {  margin:0px !important;border:0px !important;}#portal_block_179 .dxb_bc {  margin:0px !important;}#portal_block_180 {  margin:0px !important;border:0px !important;}#portal_block_180 .dxb_bc {  margin:0px !important;}#framek7VOJV {  background-image:none !important;margin:0px !important;background-color:transparent !important;border:0px !important;}#frameWpDpSa {  margin:0px !important;border:0px !important;}#frameq9aY93 {  background-image:none !important;margin:0px !important;background-color:transparent !important;border:0px !important;}#portal_block_182 {  margin:0px !important;border:0px !important;}#portal_block_182 .dxb_bc {  margin:0px !important;}#frameZC4236 {  margin:0px !important;border:0px !important;}#portal_block_183 {  margin:0px !important;border:0px !important;}#portal_block_183 .dxb_bc {  margin:0px !important;}#frameEz99z2 {  margin:0px !important;border:0px !important;}#portal_block_184 {  margin:0px !important;border:0px !important;}#portal_block_184 .dxb_bc {  margin:0px !important;}#frameb1WF04 {  margin:0px !important;border:0px !important;}#portal_block_185 {  margin:0px !important;border:0px !important;}#portal_block_185 .dxb_bc {  margin:0px !important;}#frameMFwgf1 {  margin:0px !important;border:0px !important;}#portal_block_186 {  margin:0px !important;border:0px !important;}#portal_block_186 .dxb_bc {  margin:0px !important;}#portal_block_187 {  margin:0px !important;border:0px !important;}#portal_block_187 .dxb_bc {  margin:0px !important;}#frame42eZV6 {  margin:0px !important;border:0px !important;}#portal_block_188 {  margin:0px !important;border:0px !important;}#portal_block_188 .dxb_bc {  margin:0px !important;}#frameQk94tS {  margin:0px !important;border:0px !important;}#frame8zy99g {  margin:0px !important;border:0px !important;}#portal_block_189 {  margin:0px !important;border:0px !important;}#portal_block_189 .dxb_bc {  margin:0px !important;}#frameJA1t1R {  background-image:none !important;margin:0px !important;background-color:transparent !important;border:0px !important;}#portal_block_190 {  margin:0px !important;border:0px !important;}#portal_block_190 .dxb_bc {  margin:0px !important;}#frameWt9vs9 {  margin:0px !important;border:0px !important;}#portal_block_191 {  margin:0px !important;border:0px !important;}#portal_block_191 .dxb_bc {  margin:0px !important;}#framexPPb41 {  margin:0px !important;border:0px !important;}#portal_block_192 {  margin:0px !important;border:0px !important;}#portal_block_192 .dxb_bc {  margin:0px !important;}#framed7haHA {  margin:0px !important;border:0px !important;}#portal_block_193 {  margin:0px !important;border:0px !important;}#portal_block_193 .dxb_bc {  margin:0px !important;}#portal_block_194 {  border:0px !important;margin:0px !important;}#portal_block_194 .dxb_bc {  margin:0px !important;}</style>
<script>
<!--
function setTab(name,cursel,n){
for(i=1;i<=n;i++){
var menu=document.getElementById(name+i);
var con=document.getElementById("con_"+name+"_"+i);
menu.className=i==cursel?"hover":"";
con.style.display=i==cursel?"block":"none";
}
}
//-->
</script>
<script src="../../static/image/yesmmc/js/menu.js" type="text/javascript" type="text/javascript"></script>
<div class="wp">

<div class="portal_col_01">
<div class="portal_box_01">
<!--[diy=YesMMC_ad01]--><div id="YesMMC_ad01" class="area"><div id="frame7C78du" class=" frame move-span cl frame-1"><div id="frame7C78du_left" class="column frame-1-c"><div id="frame7C78du_left_temp" class="move-span temp"></div><?php block_display('151');?></div></div></div><!--[/diy]-->
</div>

<!--头版头条模块-->
<div class="portal_box_02">
<DIV class=pic_lb>
<UL class=everyday id=todaymenu>
  <LI class="today" id=todaymenu_1><IMG src="../../static/image/yesmmc/img/yestday.gif"></LI>
  <LI class="yestday on" id=todaymenu_2><IMG src="../../static/image/yesmmc/img/today.gif"></LI>
</UL>
<DIV class=pic_right><!--更改切换-->
<DIV id=today_con_1>
<div class="today_title"></div>
<div class="today_one"><!--[diy=YesMMC_diy05]--><div id="YesMMC_diy05" class="area"><div id="frame2Jx21y" class=" frame move-span cl frame-1"><div id="frame2Jx21y_left" class="column frame-1-c"><div id="frame2Jx21y_left_temp" class="move-span temp"></div><?php block_display('158');?></div></div></div><!--[/diy]--></div>
<div class="today_two">
<div class="today_two_t">
<!--[diy=YesMMC_diy06]--><div id="YesMMC_diy06" class="area"><div id="frameSArpyP" class=" frame move-span cl frame-1"><div id="frameSArpyP_left" class="column frame-1-c"><div id="frameSArpyP_left_temp" class="move-span temp"></div><?php block_display('157');?></div></div></div><!--[/diy]-->
</div>
<div class="today_two_b">
<!--[diy=YesMMC_diy07]--><div id="YesMMC_diy07" class="area"><div id="frameVu1NkK" class=" frame move-span cl frame-1"><div id="frameVu1NkK_left" class="column frame-1-c"><div id="frameVu1NkK_left_temp" class="move-span temp"></div><?php block_display('156');?></div></div></div><!--[/diy]-->
</div>
</div>
</DIV>
<DIV id=today_con_2 style="DISPLAY: none">
<div class="today_title"></div>
<div class="today_one"><!--[diy=YesMMC_diy08]--><div id="YesMMC_diy08" class="area"><div id="frame41I1YB" class=" frame move-span cl frame-1"><div id="frame41I1YB_left" class="column frame-1-c"><div id="frame41I1YB_left_temp" class="move-span temp"></div><?php block_display('161');?></div></div></div><!--[/diy]--></div>
<div class="today_two">
<div class="today_two_t">
<!--[diy=YesMMC_diy09]--><div id="YesMMC_diy09" class="area"><div id="frameUHWPV4" class=" frame move-span cl frame-1"><div id="frameUHWPV4_left" class="column frame-1-c"><div id="frameUHWPV4_left_temp" class="move-span temp"></div><?php block_display('160');?></div></div></div><!--[/diy]-->
</div>
<div class="today_two_b">
<!--[diy=YesMMC_diy10]--><div id="YesMMC_diy10" class="area"><div id="frameE6XuIs" class=" frame move-span cl frame-1"><div id="frameE6XuIs_left" class="column frame-1-c"><div id="frameE6XuIs_left_temp" class="move-span temp"></div><?php block_display('159');?></div></div></div><!--[/diy]-->
</div>
</div>
</DIV>
<SCRIPT type=text/javascript>
var SubShow_01 = new SubShowClass("todaymenu","onmousedown",0,"on","");
for(var i=1;i<=2;i++){
SubShow_01.addLabel("todaymenu_"+i,"today_con_"+i,"","","");
}
</SCRIPT>
</DIV>
</DIV>
</div>
<!--头版头条模块-->

<!--全城聚焦模块-->
<div class="portal_box_03">
<div class="SuperStar">
<div class="SuperStar_title"></div>
<div class="SuperStar_one"><!--[diy=YesMMC_diy00]--><div id="YesMMC_diy00" class="area"><div id="frametn4UK4" class=" frame move-span cl frame-1"><div id="frametn4UK4_left" class="column frame-1-c"><div id="frametn4UK4_left_temp" class="move-span temp"></div><?php block_display('149');?></div></div></div><!--[/diy]--></div>
<div class="SuperStar_two"><!--[diy=YesMMC_diy01]--><div id="YesMMC_diy01" class="area"><div id="framej7kH6j" class=" frame move-span cl frame-1"><div id="framej7kH6j_left" class="column frame-1-c"><div id="framej7kH6j_left_temp" class="move-span temp"></div><?php block_display('150');?></div></div></div><!--[/diy]--></div>
</div>
<div class="Focus">
<img src="../../static/image/yesmmc/img/mmc_title_02.png" />
<div class="Focus_box ">
<div class="Focus_one"><!--[diy=YesMMC_diy02]--><div id="YesMMC_diy02" class="area"><div id="frameYDMT2P" class=" frame move-span cl frame-1"><div id="frameYDMT2P_left" class="column frame-1-c"><div id="frameYDMT2P_left_temp" class="move-span temp"></div><?php block_display('153');?></div></div></div><!--[/diy]--></div>
<div class="Focus_two"><!--[diy=YesMMC_diy03]--><div id="YesMMC_diy03" class="area"><div id="frameKLtKNY" class=" frame move-span cl frame-1"><div id="frameKLtKNY_left" class="column frame-1-c"><div id="frameKLtKNY_left_temp" class="move-span temp"></div><?php block_display('152');?></div></div></div><!--[/diy]--></div>
<!--[diy=YesMMC_ad02]--><div id="YesMMC_ad02" class="area"><div id="framei6nkeF" class=" frame move-span cl frame-1"><div id="framei6nkeF_left" class="column frame-1-c"><div id="framei6nkeF_left_temp" class="move-span temp"></div><?php block_display('154');?></div></div></div><!--[/diy]-->
</div>
</div>
</div>
<!--全城聚焦模块-->

<!--幻灯片模块-->
<div class="portal_box_04">
<div class="FocusPic"><!--[diy=YesMMC_diy04]--><div id="YesMMC_diy04" class="area"><div id="frame7e1181" class=" frame move-span cl frame-1"><div id="frame7e1181_left" class="column frame-1-c"><div id="frame7e1181_left_temp" class="move-span temp"></div><?php block_display('155');?></div></div></div><!--[/diy]--></div>
</div>
<!--幻灯片模块-->

<!--文章模块-->
<div class="portal_box_05">
<div class="Trend_title">
<em><a href="#" target="_blank"></a></em>
<h2></h2>
</div>
<div class="Trend_col">
<div class="Trend_box">
<div class="Trend_box_t"><IMG src="../../static/image/yesmmc/img/mmc_title_05.png"></div>
<div class="Trend_box_b">
<div class="Trend_box_l"><!--[diy=YesMMC_diy11]--><div id="YesMMC_diy11" class="area"><div id="framegZvbqQ" class=" frame move-span cl frame-1"><div id="framegZvbqQ_left" class="column frame-1-c"><div id="framegZvbqQ_left_temp" class="move-span temp"></div><?php block_display('162');?></div></div></div><!--[/diy]--></div>
<div class="Trend_box_r"><!--[diy=YesMMC_diy12]--><div id="YesMMC_diy12" class="area"><div id="frameojMmj1" class=" frame move-span cl frame-1"><div id="frameojMmj1_left" class="column frame-1-c"><div id="frameojMmj1_left_temp" class="move-span temp"></div><?php block_display('163');?></div></div></div><!--[/diy]--></div>
</div>
</div>
<div class="Trend_box">
<div class="Trend_box_t"><IMG src="../../static/image/yesmmc/img/mmc_title_06.png"></div>
<div class="Trend_box_b">
<div class="Trend_box_l"><!--[diy=YesMMC_diy13]--><div id="YesMMC_diy13" class="area"><div id="frame06X0Uu" class=" frame move-span cl frame-1"><div id="frame06X0Uu_left" class="column frame-1-c"><div id="frame06X0Uu_left_temp" class="move-span temp"></div><?php block_display('166');?></div></div></div><!--[/diy]--></div>
<div class="Trend_box_r"><!--[diy=YesMMC_diy14]--><div id="YesMMC_diy14" class="area"><div id="frameI2iPHk" class=" frame move-span cl frame-1"><div id="frameI2iPHk_left" class="column frame-1-c"><div id="frameI2iPHk_left_temp" class="move-span temp"></div><?php block_display('164');?></div></div></div><!--[/diy]--></div>
</div>
</div>
<div class="Trend_box">
<div class="Trend_box_t"><IMG src="../../static/image/yesmmc/img/mmc_title_07.png"></div>
<div class="Trend_box_b">
<div class="Trend_box_l"><!--[diy=YesMMC_diy15]--><div id="YesMMC_diy15" class="area"><div id="frameM1d8aZ" class=" frame move-span cl frame-1"><div id="frameM1d8aZ_left" class="column frame-1-c"><div id="frameM1d8aZ_left_temp" class="move-span temp"></div><?php block_display('167');?></div></div></div><!--[/diy]--></div>
<div class="Trend_box_r"><!--[diy=YesMMC_diy16]--><div id="YesMMC_diy16" class="area"><div id="frameoBL7k7" class=" frame move-span cl frame-1"><div id="frameoBL7k7_left" class="column frame-1-c"><div id="frameoBL7k7_left_temp" class="move-span temp"></div><?php block_display('165');?></div></div></div><!--[/diy]--></div>
</div>
</div>
</div>
</div>
<!--文章模块-->

</div>

<!--[diy=YesMMC_ad03]--><div id="YesMMC_ad03" class="area"><div id="frameR0qSQr" class=" frame move-span cl frame-1"><div id="frameR0qSQr_left" class="column frame-1-c"><div id="frameR0qSQr_left_temp" class="move-span temp"></div><?php block_display('168');?></div></div></div><!--[/diy]-->

<div class="portal_col_02">
<div class="portal_box_06">
<!--论坛模块-->
<div class="Forum_col">
<div id="Tab_one">
<div class="Menubox_one">
<ul>
<li class="title"></li>
<li id="one1" onMouseOver="setTab('one',1,4)">潮流时尚</li>
<li id="one2" onMouseOver="setTab('one',2,4)">休闲娱乐</li>
<li id="one3" onMouseOver="setTab('one',3,4)" class="hover">兴趣交流</li>
<li id="one4" onMouseOver="setTab('one',4,4)">同城生活</li>
</ul>
</div>
<div class="Contentbox_one">
<div id="con_one_1" style="display:none">
<div class="Forum_top">
<div class="Forum_left"><!--[diy=YesMMC_diy17]--><div id="YesMMC_diy17" class="area"><div id="frameWygkxC" class=" frame move-span cl frame-1"><div id="frameWygkxC_left" class="column frame-1-c"><div id="frameWygkxC_left_temp" class="move-span temp"></div><?php block_display('172');?></div></div></div><!--[/diy]--></div>
<div class="Forum_right">
<div class="Forum_content"><!--[diy=YesMMC_diy18]--><div id="YesMMC_diy18" class="area"><div id="frame0lz8HH" class=" frame move-span cl frame-1"><div id="frame0lz8HH_left" class="column frame-1-c"><div id="frame0lz8HH_left_temp" class="move-span temp"></div><?php block_display('171');?></div></div></div><!--[/diy]--></div>
<div class="Forum_list"><!--[diy=YesMMC_diy19]--><div id="YesMMC_diy19" class="area"><div id="frameuG409k" class=" frame move-span cl frame-1"><div id="frameuG409k_left" class="column frame-1-c"><div id="frameuG409k_left_temp" class="move-span temp"></div><?php block_display('170');?></div></div></div><!--[/diy]--></div>
</div>
</div>
<div class="Forum_bottom"><!--[diy=YesMMC_diy20]--><div id="YesMMC_diy20" class="area"><div id="frameaF3dbB" class=" frame move-span cl frame-1"><div id="frameaF3dbB_left" class="column frame-1-c"><div id="frameaF3dbB_left_temp" class="move-span temp"></div><?php block_display('169');?></div></div></div><!--[/diy]--></div>
</div>
<div id="con_one_2" style="display:none">
<div class="Forum_top">
<div class="Forum_left"><!--[diy=YesMMC_diy21]--><div id="YesMMC_diy21" class="area"><div id="frameb1WF04" class=" frame move-span cl frame-1"><div id="frameb1WF04_left" class="column frame-1-c"><div id="frameb1WF04_left_temp" class="move-span temp"></div><?php block_display('185');?></div></div></div><!--[/diy]--></div>
<div class="Forum_right">
<div class="Forum_content"><!--[diy=YesMMC_diy22]--><div id="YesMMC_diy22" class="area"><div id="frameEz99z2" class=" frame move-span cl frame-1"><div id="frameEz99z2_left" class="column frame-1-c"><div id="frameEz99z2_left_temp" class="move-span temp"></div><?php block_display('184');?></div></div></div><!--[/diy]--></div>
<div class="Forum_list"><!--[diy=YesMMC_diy23]--><div id="YesMMC_diy23" class="area"><div id="frameZC4236" class=" frame move-span cl frame-1"><div id="frameZC4236_left" class="column frame-1-c"><div id="frameZC4236_left_temp" class="move-span temp"></div><?php block_display('183');?></div></div></div><!--[/diy]--></div>
</div>
</div>
<div class="Forum_bottom"><!--[diy=YesMMC_diy24]--><div id="YesMMC_diy24" class="area"><div id="frameq9aY93" class=" frame move-span cl frame-1"><div id="frameq9aY93_left" class="column frame-1-c"><div id="frameq9aY93_left_temp" class="move-span temp"></div><?php block_display('182');?></div></div></div><!--[/diy]--></div>
</div>
<div id="con_one_3">
<div class="Forum_top">
<div class="Forum_left"><!--[diy=YesMMC_diy25]--><div id="YesMMC_diy25" class="area"><div id="frame8zy99g" class=" frame move-span cl frame-1"><div id="frame8zy99g_left" class="column frame-1-c"><div id="frame8zy99g_left_temp" class="move-span temp"></div><?php block_display('189');?></div></div></div><!--[/diy]--></div>
<div class="Forum_right">
<div class="Forum_content"><!--[diy=YesMMC_diy26]--><div id="YesMMC_diy26" class="area"><div id="frameQk94tS" class=" frame move-span cl frame-1"><div id="frameQk94tS_left" class="column frame-1-c"><div id="frameQk94tS_left_temp" class="move-span temp"></div><?php block_display('188');?></div></div></div><!--[/diy]--></div>
<div class="Forum_list"><!--[diy=YesMMC_diy27]--><div id="YesMMC_diy27" class="area"><div id="frame42eZV6" class=" frame move-span cl frame-1"><div id="frame42eZV6_left" class="column frame-1-c"><div id="frame42eZV6_left_temp" class="move-span temp"></div><?php block_display('187');?></div></div></div><!--[/diy]--></div>
</div>
</div>
<div class="Forum_bottom"><!--[diy=YesMMC_diy28]--><div id="YesMMC_diy28" class="area"><div id="frameMFwgf1" class=" frame move-span cl frame-1"><div id="frameMFwgf1_left" class="column frame-1-c"><div id="frameMFwgf1_left_temp" class="move-span temp"></div><?php block_display('186');?></div></div></div><!--[/diy]--></div>
</div>
<div id="con_one_4" style="display:none">
<div class="Forum_top">
<div class="Forum_left"><!--[diy=YesMMC_diy29]--><div id="YesMMC_diy29" class="area"><div id="framed7haHA" class=" frame move-span cl frame-1"><div id="framed7haHA_left" class="column frame-1-c"><div id="framed7haHA_left_temp" class="move-span temp"></div><?php block_display('193');?></div></div></div><!--[/diy]--></div>
<div class="Forum_right">
<div class="Forum_content"><!--[diy=YesMMC_diy30]--><div id="YesMMC_diy30" class="area"><div id="framexPPb41" class=" frame move-span cl frame-1"><div id="framexPPb41_left" class="column frame-1-c"><div id="framexPPb41_left_temp" class="move-span temp"></div><?php block_display('192');?></div></div></div><!--[/diy]--></div>
<div class="Forum_list"><!--[diy=YesMMC_diy31]--><div id="YesMMC_diy31" class="area"><div id="frameWt9vs9" class=" frame move-span cl frame-1"><div id="frameWt9vs9_left" class="column frame-1-c"><div id="frameWt9vs9_left_temp" class="move-span temp"></div><?php block_display('191');?></div></div></div><!--[/diy]--></div>
</div>
</div>
<div class="Forum_bottom"><!--[diy=YesMMC_diy32]--><div id="YesMMC_diy32" class="area"><div id="frameJA1t1R" class=" frame move-span cl frame-1"><div id="frameJA1t1R_left" class="column frame-1-c"><div id="frameJA1t1R_left_temp" class="move-span temp"></div><?php block_display('190');?></div></div></div><!--[/diy]--></div>
</div>
</div>
</div>
</div>
<!--论坛模块-->

<!--会员墙模块-->
<div class="Member_col">
<div class="Member_title">
<form action="home.php" method="get">
性別:
<select id="gender" name="gender">
<option value="0">任意</option>
<option value="1">男</option>
<option value="2">女</option>
</select>
年龄段:
<input type="text" name="startage" value="18" size="10" class="px" style="width: 20px;" /> ~ <input type="text" name="endage" value="23" size="10" class="px" style="width: 20px;" />
<label><input type="checkbox" name="avatarstatus" value="1" class="pc" />有头像</label>
<input type="hidden" name="searchsubmit" value="true" />
<button type="submit" class="membersearch"><em>查找</em></button>
<input type="hidden" name="op" value="sex" />
<input type="hidden" name="mod" value="spacecp" />
<input type="hidden" name="ac" value="search" />
<input type="hidden" name="type" value="base" />
<a href="home.php?mod=spacecp&amp;ac=search">高级查找</a>
</form>
</div>
<div class="Member_box "><!--[diy=YesMMC_diy33]--><div id="YesMMC_diy33" class="area"><div id="frame1B5Z90" class=" frame move-span cl frame-1"><div id="frame1B5Z90_left" class="column frame-1-c"><div id="frame1B5Z90_left_temp" class="move-span temp"></div><?php block_display('173');?></div></div></div><!--[/diy]--></div>
</div>
<!--会员墙模块-->

<!--群组模块-->
<div class="Group_col">
<div class="Group_title">
<h2></h2>
<em>影音 | 情感 | 生活 | 休闲 | 游戏 | 体育</em>
</div>
<div class="Group_box">
<div class="Group_l"><!--[diy=YesMMC_diy34]--><div id="YesMMC_diy34" class="area"><div id="frame2AfZ2f" class=" frame move-span cl frame-1"><div id="frame2AfZ2f_left" class="column frame-1-c"><div id="frame2AfZ2f_left_temp" class="move-span temp"></div><?php block_display('174');?></div></div></div><!--[/diy]--></div>
<div class="Group_r">
<div class="Group_one"><!--[diy=YesMMC_diy35]--><div id="YesMMC_diy35" class="area"><div id="framelihT46" class=" frame move-span cl frame-1"><div id="framelihT46_left" class="column frame-1-c"><div id="framelihT46_left_temp" class="move-span temp"></div><?php block_display('175');?></div></div></div><!--[/diy]--></div>
<div class="Group_two"><!--[diy=YesMMC_diy36]--><div id="YesMMC_diy36" class="area"><div id="frame7YJMmb" class=" frame move-span cl frame-1"><div id="frame7YJMmb_left" class="column frame-1-c"><div id="frame7YJMmb_left_temp" class="move-span temp"></div><?php block_display('176');?></div></div></div><!--[/diy]--></div>
<div class="Group_ad"><!--[diy=YesMMC_ad04]--><div id="YesMMC_ad04" class="area"><div id="framedppJwJ" class=" frame move-span cl frame-1"><div id="framedppJwJ_left" class="column frame-1-c"><div id="framedppJwJ_left_temp" class="move-span temp"></div><?php block_display('177');?></div></div></div><!--[/diy]--></div>
</div>
</div>
</div>
<!--群组模块-->

</div>
<div class="portal_box_07">
<div class="Blog_col">
<div class="Blog_title"><h2></h2></div>
<div class="Blog_box ">
<!--微博模块-->
<div class="Blog_one">
<div class="Blog_t">微博动态</div>
<div class="Blog_one_list">
<div id="con"><!--[diy=YesMMC_diy37]--><div id="YesMMC_diy37" class="area"><div id="frameq34Q3D" class=" frame move-span cl frame-1"><div id="frameq34Q3D_left" class="column frame-1-c"><div id="frameq34Q3D_left_temp" class="move-span temp"></div><?php block_display('178');?></div></div></div><!--[/diy]--></div>
</div>
<div class="Blog_one_post">
<form method="post" autocomplete="off" id="mood_addform" action="home.php?mod=spacecp&amp;ac=doing&amp;view=<?php echo $_GET['view'];?>" onsubmit="if($('message').value == msgstr){return false;}">
<table cellspacing="0" cellpadding="0" width="100%">
<tr>
<td id="mood_statusinput" class="Blog_input">
<textarea name="message" id="message" class="xg1" onfocus="handlePrompt(1);" onclick="showFace(this.id, 'message', msgstr);" onblur="handlePrompt(0);" onkeyup="strLenCalc(this, 'maxlimit')" onkeydown="ctrlEnter(event, 'add');" rows="4"></textarea>
</td>
<td class="Blog_btn">
<button type="submit" name="addsubmit_btn" id="addsubmit_btn">发布</Button>
</td>
</tr>
<tr>
<td colspan="2" class="Blog_one_post_c">
<span>还可输入 <strong id="maxlimit">200</strong> 个字符</span>
<label for="to_sign"><input type="checkbox" name="to_signhtml" id="to_sign" class="pc" value="1" />同步到个人签名</label>
<div id="return_doing" class="xi1 xw1"></div>
</td>
</tr>
</table>
<input type="hidden" name="addsubmit" value="true" />
<input type="hidden" name="refer" value="<?php echo $theurl;?>" />
<input type="hidden" name="topicid" value="<?php echo $topicid;?>" />
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
</form>
</div>
</div>
<!--微博模块-->

<!--相册模块-->
<div class="Blog_two">
<div class="Blog_t">会员相册</div>
<div class="Blog_photo"><!--[diy=YesMMC_diy38]--><div id="YesMMC_diy38" class="area"><div id="frame00i2vB" class=" frame move-span cl frame-1"><div id="frame00i2vB_left" class="column frame-1-c"><div id="frame00i2vB_left_temp" class="move-span temp"></div><?php block_display('179');?></div></div></div><!--[/diy]--></div>
</div>
<!--相册模块-->

<!--相册模块-->
<div class="Blog_three">
<div class="Blog_t">博客日志</div>
<div class="Blog_blog_list"><!--[diy=YesMMC_diy39]--><div id="YesMMC_diy39" class="area"><div id="framek7VOJV" class=" frame move-span cl frame-1"><div id="framek7VOJV_left" class="column frame-1-c"><div id="framek7VOJV_left_temp" class="move-span temp"></div><?php block_display('180');?></div></div></div><!--[/diy]--></div>
</div>
<!--相册模块-->
</div>
</div>
</div>
</div>


<div class="portal_col_03">
<div class="FriendLinks"><!--[diy=YesMMC_diy40]--><div id="YesMMC_diy40" class="area"><div id="frameWpDpSa" class=" frame move-span cl frame-1"><div id="frameWpDpSa_left" class="column frame-1-c"><div id="frameWpDpSa_left_temp" class="move-span temp"></div><?php block_display('194');?></div></div></div><!--[/diy]--></div>
</div>

</div>	</div>
<?php if(empty($topic) || ($topic['usefooter'])) { ?><?php $focusid = getfocus_rand($_G[basescript]);?><?php if($focusid !== null) { ?><?php $focus = $_G['cache']['focus']['data'][$focusid];?><div class="focus" id="sitefocus">
<div class="bm">
<div class="bm_h cl">
<a href="javascript:;" onclick="setcookie('nofocus_<?php echo $focusid;?>', 1, <?php echo $_G['cache']['focus']['cookie'];?>*3600);$('sitefocus').style.display='none'" class="y" title="关闭">关闭</a>
<h2><?php if($_G['cache']['focus']['title']) { ?><?php echo $_G['cache']['focus']['title'];?><?php } else { ?>站长推荐<?php } ?></h2>
</div>
<div class="bm_c">
<dl class="xld cl bbda">
<dt><a href="<?php echo $focus['url'];?>" class="xi2" target="_blank"><?php echo $focus['subject'];?></a></dt>
<?php if($focus['image']) { ?>
<dd class="m"><a href="<?php echo $focus['url'];?>" target="_blank"><img src="<?php echo $focus['image'];?>" alt="<?php echo $focus['subject'];?>" /></a></dd>
<?php } ?>
<dd><?php echo $focus['summary'];?></dd>
</dl>
<p class="ptn hm"><a href="<?php echo $focus['url'];?>" class="xi2" target="_blank">查看 &raquo;</a></p>
</div>
</div>
</div>
<?php } ?>
 <?php echo adshow("footerbanner/wp a_f/1");?><?php echo adshow("footerbanner/wp a_f/2");?><?php echo adshow("footerbanner/wp a_f/3");?><?php echo adshow("float/a_fl/1");?><?php echo adshow("float/a_fr/2");?><?php echo adshow("couplebanner/a_fl a_cb/1");?><?php echo adshow("couplebanner/a_fr a_cb/2");?><?php echo adshow("cornerbanner/a_cn");?> 
<?php if(!empty($_G['setting']['pluginhooks']['global_footer'])) echo $_G['setting']['pluginhooks']['global_footer'];?>
 
 
<div class="wp mtn ywp">
<!--[diy=diy4]--><div id="diy4" class="area"></div><!--[/diy]-->
</div>
 
 
<script language="javascript"> 
jq(function(){
var scrtime;
 	jq("#con").hover(function(){
clearInterval(scrtime);
 
},function(){
 
scrtime = setInterval(function(){
var jqul = jq("#con ul");
var liHeight = jqul.find("li:last").height();
jqul.animate({marginTop : liHeight+16 +"px"},1000,function(){
 
jqul.find("li:last").prependTo(jqul)
jqul.find("li:first").hide();
jqul.css({marginTop:0});
jqul.find("li:first").fadeIn(1000);
});	
},3000);
 
}).trigger("mouseleave");
 
 
});
</script>	</div>
 
    
<div class="footers ">
    <div class="wp" id="ft">
<div class="foot"><?php if(is_array($_G['setting']['footernavs'])) foreach($_G['setting']['footernavs'] as $nav) { if($nav['available'] && ($nav['type'] && (!$nav['level'] || ($nav['level'] == 1 && $_G['uid']) || ($nav['level'] == 2 && $_G['adminid'] > 0) || ($nav['level'] == 3 && $_G['adminid'] == 1)) ||
!$nav['type'] && ($nav['id'] == 'stat' && $_G['group']['allowstatdata'] || $nav['id'] == 'report' && $_G['uid'] || $nav['id'] == 'archiver' || $nav['id'] == 'mobile'))) { if($nav['id'] == 'mobile' && $_G['setting']['mobile']['allowmobile'] != 1) { ?><?php continue;?><?php } ?><?php echo $nav['code'];?><span class="pipe">|</span><?php } } ?>
    </div>
    <div class="foob">
    <div class="l"><a href="http://www.discuz.net/" target="_blank" class="d"></a><a href=""></a></div>
    <div class="c">
     <div class="r">
 				<?php if($_G['setting']['statcode']) { ?><?php echo $_G['setting']['statcode'];?><?php } ?>
 
    </div>
 
    <p class="zyesmmc">&copy; 2010-2012 <a href="http://www.comsenz.com/" target="_blank">Comsenz</a> and <a href="<?php echo $_G['setting']['siteurl'];?>" target="_blank"><?php echo $_G['setting']['sitename'];?></a>All rights reserved</p>
    <p><span class="zyesmmc">Design by <a href="<?php echo $_G['setting']['siteurl'];?>" target="_blank"><?php echo $_G['setting']['sitename'];?></a></span>
<?php if(debuginfo()) { ?> Processed in <?php echo $_G['debuginfo']['time'];?> second(s), <?php echo $_G['debuginfo']['queries'];?> queries
<?php if($_G['gzipcompress']) { ?>, Gzip On<?php } if($_G['memory']) { ?>, <?php echo ucwords($_G['memory']); ?> On<?php } ?>.
<?php } if($_G['setting']['icp']) { ?>( <a href="http://www.miitbeian.gov.cn/" target="_blank"><?php echo $_G['setting']['icp'];?></a>)<?php } ?>
 
</p>
    </div>
 
 
<script type="text/javascript"> 
        jq(document).ready(function() {
 
            jq(".signin").click(function(e) {          
e.preventDefault();
                jq("div#mys").toggle();
jq(".signin").toggleClass("menu-open");
            });
 
jq("div#mys").mouseup(function() {
return false
});
jq(document).mouseup(function(e) {
if(jq(e.target).parent(".signin").length==0) {
jq(".signin").removeClass("menu-open");
jq("div#mys").hide();
}
});			
 
        });

</script> <?php updatesession();?><?php if($_G['uid'] && $_G['group']['allowinvisible']) { ?>
<script type="text/javascript">
var invisiblestatus = '<?php if($_G['session']['invisible']) { ?>隐身<?php } else { ?>在线<?php } ?>';
var loginstatusobj = $('loginstatusid');
if(loginstatusobj != undefined && loginstatusobj != null) loginstatusobj.innerHTML = invisiblestatus;
</script><?php } ?>
</div>
 
<?php if($upgradecredit !== false) { ?>
<div id="g_upmine_menu" class="tip tip_3" style="display:none;">
<div class="tip_c">
积分 <?php echo $_G['member']['credits'];?>, 距离下一级还需 <?php echo $upgradecredit;?> 积分
</div>
<div class="tip_horn"></div>
</div>
<?php } } ?>
 
<?php if(!$_G['setting']['bbclosed']) { if($_G['uid'] && !isset($_G['cookie']['checkpm'])) { ?>
<script src="home.php?mod=spacecp&ac=pm&op=checknewpm&rand=<?php echo $_G['timestamp'];?>" type="text/javascript"></script>
<?php } ?>
 
<?php if(!isset($_G['cookie']['sendmail'])) { ?>
<script src="home.php?mod=misc&ac=sendmail&rand=<?php echo $_G['timestamp'];?>" type="text/javascript"></script>
<?php } } ?>
 
<?php if($_GET['diy'] == 'yes') { if((CURMODULE == 'topic' || $_G['group']['allowdiy']) && (empty($do) || $do != 'index') && !empty($_G['style']['tplfile'])) { ?>
<script src="<?php echo $_G['setting']['jspath'];?>common_diy.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<script src="<?php echo $_G['setting']['jspath'];?>portal_diy.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<?php } if($space['self'] && CURMODULE == 'space' && $do == 'index') { ?>
<script src="<?php echo $_G['setting']['jspath'];?>common_diy.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<script src="<?php echo $_G['setting']['jspath'];?>space_diy.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<?php } } if($_G['member']['newprompt'] && (empty($_G['cookie']['promptstate_'.$_G['uid']]) || $_G['cookie']['promptstate_'.$_G['uid']] != $_G['member']['newprompt']) && $_G['gp_do'] != 'notice') { ?>
<script type="text/javascript">noticeTitle();</script>
<?php } ?>
 <?php userappprompt();?><span id="scrolltop" onclick="window.scrollTo('0','0')">回顶部</span>
<script type="text/javascript">_attachEvent(window, 'scroll', function(){showTopLink();});</script><?php output();?><script src="http://trace.visionalist.cn/VL/Trace?c=tv10264&p=" type="text/javascript"></script>
</body>
</html>