<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('type');
0
|| checktplrefresh('./template/yesmmc_N3BSK2vfZ0FtHwIb/group/type.htm', './template/yesmmc_N3BSK2vfZ0FtHwIb/common/header.htm', 1375743256, 'diy', './data/template/7_diy_group_type.tpl.php', './template/yesmmc_N3BSK2vfZ0FtHwIb', 'group/type')
|| checktplrefresh('./template/yesmmc_N3BSK2vfZ0FtHwIb/group/type.htm', './template/yesmmc_N3BSK2vfZ0FtHwIb/common/footer.htm', 1375743256, 'diy', './data/template/7_diy_group_type.tpl.php', './template/yesmmc_N3BSK2vfZ0FtHwIb', 'group/type')
|| checktplrefresh('./template/yesmmc_N3BSK2vfZ0FtHwIb/group/type.htm', './template/yesmmc_N3BSK2vfZ0FtHwIb/common/header_common.htm', 1375743256, 'diy', './data/template/7_diy_group_type.tpl.php', './template/yesmmc_N3BSK2vfZ0FtHwIb', 'group/type')
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
<base href="<?php echo $_G['siteurl'];?>" /><link rel="stylesheet" type="text/css" href="data/cache/style_<?php echo STYLEID;?>_common.css?<?php echo VERHASH;?>" /><link rel="stylesheet" type="text/css" href="data/cache/style_<?php echo STYLEID;?>_group_index.css?<?php echo VERHASH;?>" /><?php if($_G['uid'] && isset($_G['cookie']['extstyle']) && strpos($_G['cookie']['extstyle'], TPLDIR) !== false) { ?><link rel="stylesheet" id="css_extstyle" type="text/css" href="<?php echo $_G['cookie']['extstyle'];?>/style.css" /><?php } elseif($_G['style']['defaultextstyle']) { ?><link rel="stylesheet" id="css_extstyle" type="text/css" href="<?php echo $_G['style']['defaultextstyle'];?>/style.css" /><?php } ?><script type="text/javascript">var STYLEID = '<?php echo STYLEID;?>', STATICURL = '<?php echo STATICURL;?>', IMGDIR = '<?php echo IMGDIR;?>', VERHASH = '<?php echo VERHASH;?>', charset = '<?php echo CHARSET;?>', discuz_uid = '<?php echo $_G['uid'];?>', cookiepre = '<?php echo $_G['config']['cookie']['cookiepre'];?>', cookiedomain = '<?php echo $_G['config']['cookie']['cookiedomain'];?>', cookiepath = '<?php echo $_G['config']['cookie']['cookiepath'];?>', showusercard = '<?php echo $_G['setting']['showusercard'];?>', attackevasive = '<?php echo $_G['config']['security']['attackevasive'];?>', disallowfloat = '<?php echo $_G['setting']['disallowfloat'];?>', creditnotice = '<?php if($_G['setting']['creditnotice']) { ?><?php echo $_G['setting']['creditnames'];?><?php } ?>', defaultstyle = '<?php echo $_G['style']['defaultextstyle'];?>', REPORTURL = '<?php echo $_G['currenturl_encode'];?>', SITEURL = '<?php echo $_G['siteurl'];?>', JSPATH = '<?php echo $_G['setting']['jspath'];?>';</script>
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
<div class="z"><a href="./" class="nvhm" title="首页"><?php echo $_G['setting']['bbname'];?></a><em>&rsaquo;</em><a href="group.php"><?php echo $_G['setting']['navs']['3']['navname'];?></a><?php echo $groupnav;?></div>
</div><?php echo adshow("text/wp a_t");?><style id="diy_style" type="text/css"></style>
<div class="wp">
<!--[diy=diy1]--><div id="diy1" class="area"></div><!--[/diy]-->
</div>
<div id="ct" class="ct2 wp cl">
<div class="mn">
<!--[diy=diycontenttop]--><div id="diycontenttop" class="area"></div><!--[/diy]-->
<div class="bm fl cl">
<div class="bm_h">
<h1 class="xs2"><?php echo $curtype['name'];?></h1>
</div>
<?php if($typelist) { ?>
<div class="bm_c pbm ptm bbs">
<p><?php if(is_array($typelist)) foreach($typelist as $fid => $type) { ?><a href="group.php?sgid=<?php echo $fid;?>"><?php echo $type['name'];?></a><?php if($type['groupnum']) { ?><span class="xg1">(<?php echo $type['groupnum'];?>)</span><?php } ?> &nbsp; <?php } ?></p>
</div>
<?php } else { ?>
<div class="bbs"></div>
<?php } ?>
<?php if(!empty($_G['setting']['pluginhooks']['index_top'])) echo $_G['setting']['pluginhooks']['index_top'];?>
<?php if($list) { ?>
<div class="tbmu cl bw0">
<span class="y">
<select title="排序方式" onchange="location.href=this.value" class="ps">
<option value="<?php echo $url;?>" <?php echo $selectorder['default'];?>>默认排序</option>
<option value="<?php echo $url;?>&orderby=thread" <?php echo $selectorder['thread'];?>>主题数</option>
<option value="<?php echo $url;?>&orderby=membernum" <?php echo $selectorder['membernum'];?>>人数</option>
<option value="<?php echo $url;?>&orderby=dateline" <?php echo $selectorder['dateline'];?>>建立时间</option>
<option value="<?php echo $url;?>&orderby=activity" <?php echo $selectorder['activity'];?>>活跃度</option>
</select>
</span>
共有 <?php echo $curtype['groupnum'];?> 个<?php echo $_G['setting']['navs']['3']['navname'];?>
</div>
<?php if($curtype['forumcolumns'] > 1) { ?>
<div class="bm_c">
<table cellspacing="0" cellpadding="0" class="fl_tb">
<tr class="fl_row"><?php if(is_array($list)) foreach($list as $fid => $val) { if($val['orderid'] && ($val['orderid'] % $curtype['forumcolumns'] == 0)) { ?>
</tr>
<tr class="fl_row">
<?php } ?>
<td class="fl_g" style="width: <?php echo $curtype['forumcolwidth'];?>">
<div class="fl_icn_g"><a href="forum.php?mod=group&amp;fid=<?php echo $fid;?>" title="<?php echo $val['name'];?>"><img width="48" height="48" src="<?php echo $val['icon'];?>" alt="<?php echo $val['name'];?>" /></a></div>
<dl>
<dt><a href="forum.php?mod=group&amp;fid=<?php echo $fid;?>" title="<?php echo $val['name'];?>"><?php echo $val['name'];?></a></dt>
<dd>成员: <?php echo $val['membernum'];?>, 主题: <?php echo $val['threads'];?></dd>
<dd><a href=""><a href="forum.php?mod=group&amp;fid=<?php echo $fid;?>">创建于: <?php echo $val['dateline'];?></a></dd>
</dl>
</td>
<?php } ?>
<?php echo $endrows;?>
</tr>
</table>
</div>
<?php } else { ?>
<div class="bm_c">
<table cellspacing="0" cellpadding="0" class="fl_tb"><?php if(is_array($list)) foreach($list as $fid => $val) { ?><tr class="fl_row">
<td class="fl_icn"><a href="forum.php?mod=group&amp;fid=<?php echo $fid;?>" title="<?php echo $val['name'];?>"><img width="48" height="48" src="<?php echo $val['icon'];?>" alt="<?php echo $val['name'];?>" /></a></td>
<td>
<?php if(!empty($_G['setting']['pluginhooks']['index_grouplist'][$fid])) echo $_G['setting']['pluginhooks']['index_grouplist'][$fid];?>
<strong><a href="forum.php?mod=group&amp;fid=<?php echo $fid;?>" title="<?php echo $val['name'];?>"><?php echo $val['name'];?></a></strong>
<p class="xg1"><?php echo $val['description'];?></p>
</td>
<td class="fl_i">
<span class="i_z z"><strong><?php echo $val['membernum'];?></strong><em class="xg1"><?php echo $_G['setting']['navs']['3']['navname'];?>成员</em></span>
<span class="i_y z"><strong><?php echo $val['threads'];?></strong><em class="xg1">主题</em></span>
</td>
</tr>
<?php } ?>
</table>
</div>
<?php } ?>
<?php if(!empty($_G['setting']['pluginhooks']['index_bottom'])) echo $_G['setting']['pluginhooks']['index_bottom'];?>
<?php } else { ?>
<div class="bm emp">
<h2>该分类下暂时没有<?php echo $_G['setting']['navs']['3']['navname'];?></h2>
<p>返回上级分类重新选择，或者[<b><a href="forum.php?mod=group&amp;action=create&amp;fupid=<?php echo $curtype['fup'];?>&amp;groupid=<?php echo $sgid;?>">创建一个新的<?php echo $_G['setting']['navs']['3']['navname'];?></a></b>]</p>
</div>
<?php } ?>
</div>
<?php if($list) { ?>
<div class="pgs cl">
<?php echo $multipage;?>
<span class="pgb y"><a href="group.php">返回首页</a></span>
</div>
<?php } ?>
<!--[diy=diycontentbottom]--><div id="diycontentbottom" class="area"></div><!--[/diy]-->
</div>
<div class="sd">
<!--[diy=diysidetop]--><div id="diysidetop" class="area"></div><!--[/diy]-->
<?php if(!empty($_G['setting']['pluginhooks']['index_side_top'])) echo $_G['setting']['pluginhooks']['index_side_top'];?>
<?php if(helper_access::check_module('group')) { if(empty($gid) && empty($sgid)) { ?>
<div class="bm">
<div class="bm_h cl">
<h2>创建<?php echo $_G['setting']['navs']['3']['navname'];?>步骤</h2>
</div>
<div class="bm_c">
<ul id="g_guide" class="mbm">
<li><label><strong class="xi1">创建<?php echo $_G['setting']['navs']['3']['navname'];?></strong><span class="xg1">创建自己的地盘</span></label></li>
<li><label><strong class="xi1">个性设置</strong><span class="xg1">精心打造<?php echo $_G['setting']['navs']['3']['navname'];?>空间</span></label></li>
<li><label><strong class="xi1">邀请好友</strong><span class="xg1">邀请好友加入我的<?php echo $_G['setting']['navs']['3']['navname'];?></span></label></li>
<li><label><strong class="xi1"><?php echo $_G['setting']['navs']['3']['navname'];?>升级</strong><span class="xg1"><?php echo $_G['setting']['navs']['3']['navname'];?>积分升级赢得社区推荐</span></label></li>
</ul>
<a href="forum.php?mod=group&amp;action=create" id="create_group_btn"><img src="<?php echo IMGDIR;?>/create_group.png" alt="创建<?php echo $_G['setting']['navs']['3']['navname'];?>" /></a>
</div>
</div>
<div class="drag">
<!--[diy=diy2]--><div id="diy2" class="area"></div><!--[/diy]-->
</div>
<?php } else { ?>
<div class="bm bw0">
<div class="bm_c">
<a href="forum.php?mod=group&amp;action=create&amp;fupid=<?php echo $fup;?>&amp;groupid=<?php echo $sgid;?>" id="create_group_btn"><img src="<?php echo IMGDIR;?>/create_group.png" alt="创建<?php echo $_G['setting']['navs']['3']['navname'];?>" /></a>
</div>
</div>
<?php } } ?>
<!--[diy=diytopgrouptop]--><div id="diytopgrouptop" class="area"></div><!--[/diy]-->
<?php if($topgrouplist) { ?>
<div id="g_top" class="bm">
<div class="bm_h cl">
<h2><?php echo $_G['setting']['navs']['3']['navname'];?>积分排行</h2>
</div>
<div class="bm_c">
<ol class="xl"><?php if(is_array($topgrouplist)) foreach($topgrouplist as $fid => $group) { ?><li class="top1"><span class="y xi2 xg1"> <?php echo $group['commoncredits'];?></span><a href="forum.php?mod=group&amp;fid=<?php echo $group['fid'];?>" title="<?php echo $group['name'];?>"><?php echo $group['name'];?></a></li>
<?php } ?>
</ol>
</div>
</div>
<?php } ?>
<div class="drag">
<!--[diy=diy4]--><div id="diy4" class="area"></div><!--[/diy]-->
</div>
<?php if(!empty($_G['setting']['pluginhooks']['index_side_bottom'])) echo $_G['setting']['pluginhooks']['index_side_bottom'];?>
</div>
</div>

<div class="wp mtn">
<!--[diy=diy4]--><div id="diy4" class="area"></div><!--[/diy]-->
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