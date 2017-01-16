<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('space_medal');
0
|| checktplrefresh('./template/yesmmc_N3BSK2vfZ0FtHwIb/home/space_medal.htm', './template/yesmmc_N3BSK2vfZ0FtHwIb/common/header.htm', 1375695618, '8', './data/template/7_8_home_space_medal.tpl.php', './template/yesmmc_N3BSK2vfZ0FtHwIb', 'home/space_medal')
|| checktplrefresh('./template/yesmmc_N3BSK2vfZ0FtHwIb/home/space_medal.htm', './template/yesmmc_N3BSK2vfZ0FtHwIb/common/header_common.htm', 1375695618, '8', './data/template/7_8_home_space_medal.tpl.php', './template/yesmmc_N3BSK2vfZ0FtHwIb', 'home/space_medal')
;?>
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
<base href="<?php echo $_G['siteurl'];?>" /><link rel="stylesheet" type="text/css" href="data/cache/style_<?php echo STYLEID;?>_common.css?<?php echo VERHASH;?>" /><link rel="stylesheet" type="text/css" href="data/cache/style_<?php echo STYLEID;?>_home_medal.css?<?php echo VERHASH;?>" /><?php if($_G['uid'] && isset($_G['cookie']['extstyle']) && strpos($_G['cookie']['extstyle'], TPLDIR) !== false) { ?><link rel="stylesheet" id="css_extstyle" type="text/css" href="<?php echo $_G['cookie']['extstyle'];?>/style.css" /><?php } elseif($_G['style']['defaultextstyle']) { ?><link rel="stylesheet" id="css_extstyle" type="text/css" href="<?php echo $_G['style']['defaultextstyle'];?>/style.css" /><?php } ?><script type="text/javascript">var STYLEID = '<?php echo STYLEID;?>', STATICURL = '<?php echo STATICURL;?>', IMGDIR = '<?php echo IMGDIR;?>', VERHASH = '<?php echo VERHASH;?>', charset = '<?php echo CHARSET;?>', discuz_uid = '<?php echo $_G['uid'];?>', cookiepre = '<?php echo $_G['config']['cookie']['cookiepre'];?>', cookiedomain = '<?php echo $_G['config']['cookie']['cookiedomain'];?>', cookiepath = '<?php echo $_G['config']['cookie']['cookiepath'];?>', showusercard = '<?php echo $_G['setting']['showusercard'];?>', attackevasive = '<?php echo $_G['config']['security']['attackevasive'];?>', disallowfloat = '<?php echo $_G['setting']['disallowfloat'];?>', creditnotice = '<?php if($_G['setting']['creditnotice']) { ?><?php echo $_G['setting']['creditnames'];?><?php } ?>', defaultstyle = '<?php echo $_G['style']['defaultextstyle'];?>', REPORTURL = '<?php echo $_G['currenturl_encode'];?>', SITEURL = '<?php echo $_G['siteurl'];?>', JSPATH = '<?php echo $_G['setting']['jspath'];?>';</script>
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
 
<div id="wp" class="wp"><div id="pt" class="bm cl">
<div class="z">
<a href="./" class="nvhm" title="首页"><?php echo $_G['setting']['bbname'];?></a> <em>&rsaquo;</em>
<a href="home.php?mod=medal">勋章</a>
</div>
</div>

<div id="ct" class="ct2_a wp cl">
<div class="mn">
<div class="bm bw0">
<h1 class="mt">
<img src="<?php echo STATICURL;?>image/feed/medal.gif" alt="勋章" class="vm" />
<?php if($_GET['action'] == 'log') { ?>我的勋章
<?php } else { ?>勋章中心<?php } ?>
</h1>

<?php if(empty($_GET['action'])) { if($medallist) { if($medalcredits) { ?>
<div class="tbmu">
目前有<?php $i = 0;?><?php if(is_array($medalcredits)) foreach($medalcredits as $id) { if($i != 0) { ?>, <?php } ?><?php echo $_G['setting']['extcredits'][$id]['img'];?> <?php echo $_G['setting']['extcredits'][$id]['title'];?> <span class="xi1"><?php echo getuserprofile('extcredits'.$id);; ?></span> <?php echo $_G['setting']['extcredits'][$id]['unit'];?><?php $i++;?><?php } ?>
</div>
<?php } ?>
<ul class="mtm mgcl cl"><?php if(is_array($medallist)) foreach($medallist as $key => $medal) { ?><li>
<div id="medal_<?php echo $medal['medalid'];?>_menu" class="tip tip_4" style="display:none">
<div class="tip_horn"></div>
<div class="tip_c" style="text-align:left">
<p><?php echo $medal['description'];?></p>
<p class="mtn">
<?php if($medal['expiration']) { ?>
有效期 <?php echo $medal['expiration'];?> 天,
<?php } if($medal['permission'] && !$medal['price']) { ?>
<?php echo $medal['permission'];?>
<?php } else { if($medal['type'] == 0) { ?>
人工授予
<?php } elseif($medal['type'] == 1) { if($medal['price']) { if($_G['setting']['extcredits'][$medal['credit']]['unit']) { ?>
<?php echo $_G['setting']['extcredits'][$medal['credit']]['title'];?> <strong class="xi1 xw1 xs2"><?php echo $medal['price'];?></strong> <?php echo $_G['setting']['extcredits'][$medal['credit']]['unit'];?>
<?php } else { ?>
<strong class="xi1 xw1 xs2"><?php echo $medal['price'];?></strong> <?php echo $_G['setting']['extcredits'][$medal['credit']]['title'];?>
<?php } } else { ?>
自主申请
<?php } } elseif($medal['type'] == 2) { ?>
人工审核
<?php } } ?>
</p>
</div>
</div>
<div id="medal_<?php echo $medal['medalid'];?>" class="mg_img" onmouseover="showMenu({'ctrlid':this.id, 'menuid':'medal_<?php echo $medal['medalid'];?>_menu', 'pos':'12!'});"><img src="<?php echo STATICURL;?>image/common/<?php echo $medal['image'];?>" alt="<?php echo $medal['name'];?>" style="margin-top: 20px;width:auto; height: auto;" /></div>
<p class="xw1"><?php echo $medal['name'];?></p>
<p>
<?php if(in_array($medal['medalid'], $membermedal)) { ?>
已拥有
<?php } else { if($medal['type'] && $_G['uid']) { if(in_array($medal['medalid'], $mymedals)) { if($medal['price']) { ?>
已购买
<?php } else { if(!$medal['permission']) { ?>
已申请
<?php } else { ?>
已领取
<?php } } } else { ?>
<a href="javascript:;" onclick="showWindow('medal', 'home.php?mod=medal&action=confirm&medalid=<?php echo $medal['medalid'];?>')" class="xi2">
<?php if($medal['price']) { ?>
购买
<?php } else { if(!$medal['permission']) { ?>
申请
<?php } else { ?>
领取
<?php } } ?>
</a>
<?php } } } ?>
</p>
</li>
<?php } ?>
</ul>
<?php } else { if($medallogs) { ?>
<p class="emp">您已经获得所有勋章了，恭喜您！</p>
<?php } else { ?>
<p class="emp">没有可用的勋章</p>
<?php } } if($lastmedals) { ?>
<h3 class="tbmu">勋章记录</h3>
<ul class="el ptm pbw mbw"><?php if(is_array($lastmedals)) foreach($lastmedals as $lastmedal) { ?><li>
<a href="home.php?mod=space&amp;uid=<?php echo $lastmedal['uid'];?>" class="t"><?php echo avatar($lastmedal[uid],small);?></a>
<a href="home.php?mod=space&amp;uid=<?php echo $lastmedal['uid'];?>" class="xi2"><?php echo $lastmedalusers[$lastmedal['uid']]['username'];?></a> 在 <?php echo $lastmedal['dateline'];?> 获得 <strong><?php echo $medallist[$lastmedal['medalid']]['name'];?></strong> 勋章
</li>
<?php } ?>
</ul>
<?php } } elseif($_GET['action'] == 'log') { if($mymedals) { ?>
<ul class="mtm mgcl cl"><?php if(is_array($mymedals)) foreach($mymedals as $mymedal) { ?><li>
<div class="mg_img"><img src="<?php echo STATICURL;?>image/common/<?php echo $mymedal['image'];?>" alt="<?php echo $mymedal['name'];?>" style="margin-top: 20px;width:auto; height: auto;" /></div>
<p><strong><?php echo $mymedal['name'];?></strong></p>
</li>
<?php } ?>
</ul>
<?php } if($medallogs) { ?>
<h3 class="tbmu">勋章记录</h3>
<ul class="el ptm pbw mbw"><?php if(is_array($medallogs)) foreach($medallogs as $medallog) { ?><li style="padding-left:10px;">
<?php if($medallog['type'] == 2 || $medallog['type'] == 3) { ?>
我在 <?php echo $medallog['dateline'];?> 申请了 <strong><?php echo $medallog['name'];?></strong> 勋章,<?php if($medallog['type'] == 2) { ?>等待审核<?php } elseif($medallog['type'] == 3) { ?>未通过审核<?php } } elseif($medallog['type'] != 2 && $medallog['type'] != 3) { ?>
我在 <?php echo $medallog['dateline'];?> 被授予了 <strong><?php echo $medallog['name'];?></strong> 勋章,<?php if($medallog['expiration']) { ?>有效期: <?php echo $medallog['expiration'];?><?php } else { ?>永久有效<?php } } ?>
</li>
<?php } ?>
</ul>
<?php if($multipage) { ?><div class="pgs cl mtm"><?php echo $multipage;?></div><?php } } else { ?>
<p class="emp">您还没有获得过勋章</p>
<?php } } ?>
</div>
</div>
<div class="appl">
<div class="tbn">
<h2 class="mt bbda">勋章</h2>
<ul>
<li<?php if(empty($_GET['action'])) { ?> class="a"<?php } ?>><a href="home.php?mod=medal">勋章中心</a></li>
<li<?php if($_GET['action'] == 'log') { ?> class="a"<?php } ?>><a href="home.php?mod=medal&amp;action=log">我的勋章</a></li>
<?php if(!empty($_G['setting']['pluginhooks']['medal_nav_extra'])) echo $_G['setting']['pluginhooks']['medal_nav_extra'];?>
</ul>
</div>
</div>
</div><?php include template('common/footer'); ?>