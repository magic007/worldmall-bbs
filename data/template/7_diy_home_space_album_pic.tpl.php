<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('space_album_pic');
0
|| checktplrefresh('./template/yesmmc_N3BSK2vfZ0FtHwIb/home/space_album_pic.htm', './template/yesmmc_N3BSK2vfZ0FtHwIb/home/space_header.htm', 1375725086, 'diy', './data/template/7_diy_home_space_album_pic.tpl.php', './template/yesmmc_N3BSK2vfZ0FtHwIb', 'home/space_album_pic')
|| checktplrefresh('./template/yesmmc_N3BSK2vfZ0FtHwIb/home/space_album_pic.htm', './template/yesmmc_N3BSK2vfZ0FtHwIb/common/seccheck.htm', 1375725086, 'diy', './data/template/7_diy_home_space_album_pic.tpl.php', './template/yesmmc_N3BSK2vfZ0FtHwIb', 'home/space_album_pic')
|| checktplrefresh('./template/yesmmc_N3BSK2vfZ0FtHwIb/home/space_album_pic.htm', './template/yesmmc_N3BSK2vfZ0FtHwIb/home/space_userabout.htm', 1375725086, 'diy', './data/template/7_diy_home_space_album_pic.tpl.php', './template/yesmmc_N3BSK2vfZ0FtHwIb', 'home/space_album_pic')
|| checktplrefresh('./template/yesmmc_N3BSK2vfZ0FtHwIb/home/space_album_pic.htm', './template/yesmmc_N3BSK2vfZ0FtHwIb/common/footer.htm', 1375725086, 'diy', './data/template/7_diy_home_space_album_pic.tpl.php', './template/yesmmc_N3BSK2vfZ0FtHwIb', 'home/space_album_pic')
|| checktplrefresh('./template/yesmmc_N3BSK2vfZ0FtHwIb/home/space_album_pic.htm', './template/yesmmc_N3BSK2vfZ0FtHwIb/common/header_common.htm', 1375725086, 'diy', './data/template/7_diy_home_space_album_pic.tpl.php', './template/yesmmc_N3BSK2vfZ0FtHwIb', 'home/space_album_pic')
|| checktplrefresh('./template/yesmmc_N3BSK2vfZ0FtHwIb/home/space_album_pic.htm', './template/yesmmc_N3BSK2vfZ0FtHwIb/home/space_diy.htm', 1375725086, 'diy', './data/template/7_diy_home_space_album_pic.tpl.php', './template/yesmmc_N3BSK2vfZ0FtHwIb', 'home/space_album_pic')
|| checktplrefresh('./template/yesmmc_N3BSK2vfZ0FtHwIb/home/space_album_pic.htm', './template/yesmmc_N3BSK2vfZ0FtHwIb/home/space_header_personalnv.htm', 1375725086, 'diy', './data/template/7_diy_home_space_album_pic.tpl.php', './template/yesmmc_N3BSK2vfZ0FtHwIb', 'home/space_album_pic')
;?>
<?php $_G['home_tpl_titles'] = array(getstr($pic['title'], 60, 0, 0, 0, -1), $album['albumname'], '相册');?><?php $friendsname = array(1 => '仅好友可见',2 => '指定好友可见',3 => '仅自己可见',4 => '凭密码可见');?><?php if($_G['setting']['homepagestyle']) { ?><?php $_G[cookie][extstyle] = false;?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
<base href="<?php echo $_G['siteurl'];?>" /><link rel="stylesheet" type="text/css" href="data/cache/style_<?php echo STYLEID;?>_common.css?<?php echo VERHASH;?>" /><link rel="stylesheet" type="text/css" href="data/cache/style_<?php echo STYLEID;?>_home_space.css?<?php echo VERHASH;?>" /><?php if($_G['uid'] && isset($_G['cookie']['extstyle']) && strpos($_G['cookie']['extstyle'], TPLDIR) !== false) { ?><link rel="stylesheet" id="css_extstyle" type="text/css" href="<?php echo $_G['cookie']['extstyle'];?>/style.css" /><?php } elseif($_G['style']['defaultextstyle']) { ?><link rel="stylesheet" id="css_extstyle" type="text/css" href="<?php echo $_G['style']['defaultextstyle'];?>/style.css" /><?php } ?><script type="text/javascript">var STYLEID = '<?php echo STYLEID;?>', STATICURL = '<?php echo STATICURL;?>', IMGDIR = '<?php echo IMGDIR;?>', VERHASH = '<?php echo VERHASH;?>', charset = '<?php echo CHARSET;?>', discuz_uid = '<?php echo $_G['uid'];?>', cookiepre = '<?php echo $_G['config']['cookie']['cookiepre'];?>', cookiedomain = '<?php echo $_G['config']['cookie']['cookiedomain'];?>', cookiepath = '<?php echo $_G['config']['cookie']['cookiepath'];?>', showusercard = '<?php echo $_G['setting']['showusercard'];?>', attackevasive = '<?php echo $_G['config']['security']['attackevasive'];?>', disallowfloat = '<?php echo $_G['setting']['disallowfloat'];?>', creditnotice = '<?php if($_G['setting']['creditnotice']) { ?><?php echo $_G['setting']['creditnames'];?><?php } ?>', defaultstyle = '<?php echo $_G['style']['defaultextstyle'];?>', REPORTURL = '<?php echo $_G['currenturl_encode'];?>', SITEURL = '<?php echo $_G['siteurl'];?>', JSPATH = '<?php echo $_G['setting']['jspath'];?>';</script>
<script src="<?php echo $_G['setting']['jspath'];?>common.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<script src="http://tjs.sjs.sinajs.cn/open/api/js/wb.js" type="text/javascript" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo $_G['setting']['jspath'];?>home.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $_G['setting']['csspath'];?>data/cache/style_<?php echo STYLEID;?>_css_space.css?<?php echo VERHASH;?>" />
<link id="style_css" rel="stylesheet" type="text/css" href="<?php echo STATICURL;?>space/<?php if($space['theme']) { ?><?php echo $space['theme'];?><?php } else { ?>t1<?php } ?>/style.css?<?php echo VERHASH;?>">
<style id="diy_style"><?php echo $space['spacecss'];?></style>
</head>

<body id="space" onkeydown="if(event.keyCode==27) return false;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>

<?php if($space['self'] && $_GET['diy'] == 'yes' && $do == 'index' ) { ?>
<link rel="stylesheet" type="text/css" href="<?php echo $_G['setting']['csspath'];?>data/cache/style_<?php echo STYLEID;?>_css_diy.css?<?php echo VERHASH;?>" /><div id="controlpanel" class="cl">
<div id="controlheader" class="cl">
<p class="y">
<span id="navcancel"><a href="javascript:;" onclick="spaceDiy.cancel();return false;">关闭</a></span>
<span id="navsave"><a href="javascript:;" onclick="javascript:spaceDiy.save();return false;">保存</a></span>
<span id="button_redo" class="unusable"><a href="javascript:;" onclick="spaceDiy.redo();return false;" title="重做" onfocus="this.blur();">重做</a></span>
<span id="button_undo" class="unusable"><a href="javascript:;" onclick="spaceDiy.undo();return false;" title="撤销" onfocus="this.blur();">撤销</a></span>
</p>
<ul id="controlnav">
<li id="navstart" class="current"><a href="javascript:" onclick="spaceDiy.getdiy('start');this.blur();return false;">开始</a></li>
<li id="navlayout"><a href="javascript:;" onclick="spaceDiy.getdiy('layout');this.blur();return false;">版式/布局</a></li>
<li id="navstyle"><a href="javascript:;" onclick="spaceDiy.getdiy('style');this.blur();return false;">风格</a></li>
<li id="navblock"><a href="javascript:;" onclick="spaceDiy.getdiy('block');this.blur();return false;">模块</a></li>
<li id="navdiy"><a href="javascript:;" onclick="spaceDiy.getdiy('diy');this.blur();return false;">自定义装扮</a></li>
</ul>
</div>
<div id="controlcontent" class="cl">
<ul id="contentstart" class="content">
  <li><a href="javascript:;" onclick="spaceDiy.getdiy('layout');return false;"><img src="<?php echo STATICURL;?>image/diy/layout.png" />版式</a></li>
  <li><a href="javascript:;" onclick="spaceDiy.getdiy('style');return false;"><img src="<?php echo STATICURL;?>image/diy/style.png" />风格</a></li>
  <li><a href="javascript:;" onclick="spaceDiy.getdiy('block');return false;"><img src="<?php echo STATICURL;?>image/diy/module.png" />添加模块</a></li>
  <li><a href="javascript:;" onclick="spaceDiy.getdiy('diy', 'topicid', '<?php echo $topic['topicid'];?>');return false;"><img src="<?php echo STATICURL;?>image/diy/diy.png" />自定义</a></li>
</ul>
</div>
<div id="cpfooter"><table cellpadding="0" cellspacing="0" width="100%"><tr><td class="l">&nbsp;</td><td class="c">&nbsp;</td><td class="r">&nbsp;</td></tr></table></div>
</div>
<form method="post" autocomplete="off" name="diyform" action="home.php?mod=spacecp&amp;ac=index">
<input type="hidden" name="spacecss" value="" />
<input type="hidden" name="style" value="<?php echo $space['theme'];?>" />
<input type="hidden" name="layoutdata" value="" />
<input type="hidden" name="currentlayout" value="<?php echo $userdiy['currentlayout'];?>" />
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<input type="hidden" name="diysubmit" value="true"/>
</form><?php } ?>

<div id="toptb" class="cl">
<?php if($_G['uid']) { ?>
<div class="y">
<a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>" class="xw1" target="_blank" title="访问我的空间"><?php echo $_G['member']['username'];?></a>
<a href="javascript:;" id="myspace" class="showmenu cur1" onmouseover="showMenu(this.id);">快捷导航</a>
<?php if(!empty($_G['setting']['pluginhooks']['global_usernav_extra1'])) echo $_G['setting']['pluginhooks']['global_usernav_extra1'];?>
<a href="home.php?mod=spacecp">设置</a>
<a href="home.php?mod=space&amp;do=pm" id="pm_ntc" target="_blank"<?php if($_G['member']['newpm']) { ?> class="new"<?php } ?>>消息<?php if($_G['member']['newpm']) { ?>(<?php echo $_G['member']['newpm'];?>)<?php } ?></a>
<a href="home.php?mod=space&amp;do=notice" id="myprompt" target="_blank"<?php if($_G['member']['newprompt']) { ?> class="new"<?php } ?>>提醒<?php if($_G['member']['newprompt']) { ?>(<?php echo $_G['member']['newprompt'];?>)<?php } ?></a><span id="myprompt_check"></span>
<?php if($_G['group']['allowmanagearticle'] || $_G['group']['allowdiy']|| getstatus($_G['member']['allowadmincp'], 4) || getstatus($_G['member']['allowadmincp'], 2) || getstatus($_G['member']['allowadmincp'], 3) || in_array($_G['uid'], $_G['setting']['ext_portalmanager'])) { ?><a href="portal.php?mod=portalcp">门户管理</a><?php } if($_G['uid'] && $_G['group']['radminid'] > 1) { ?><a href="forum.php?mod=modcp&amp;fid=<?php echo $_G['fid'];?>" target="_blank"><?php echo $_G['setting']['navs']['2']['navname'];?>管理</a><?php } if($_G['uid'] && ($_G['group']['radminid'] == 1 || getstatus($_G['member']['allowadmincp'], 1))) { ?><a href="admin.php" target="_blank">管理中心</a><?php } ?>
<?php if(!empty($_G['setting']['pluginhooks']['global_usernav_extra2'])) echo $_G['setting']['pluginhooks']['global_usernav_extra2'];?>
<a href="member.php?mod=logging&amp;action=logout&amp;formhash=<?php echo FORMHASH;?>">退出</a>
<?php if($space['self'] && $do == 'index') { ?><a id="diy-tg" href="javascript:openDiy();" title="装扮空间">DIY</a><?php } ?>
</div>
<?php } elseif(!empty($_G['cookie']['loginuser'])) { ?>
<div class="y">
<a id="loginuser" class="xw1"><?php echo $_G['cookie']['loginuser'];?></a>
<a href="member.php?mod=logging&amp;action=login" onclick="showWindow('login', this.href)">激活</a>
<a href="member.php?mod=logging&amp;action=logout&amp;formhash=<?php echo FORMHASH;?>">退出</a>
</div>
<?php } elseif($_G['connectguest']) { ?>
<div class="y">
<a href="member.php?mod=connect" target="_blank">完善帐号信息</a> <a href="member.php?mod=connect&amp;ac=bind" target="_blank">绑定已有帐号</a>
</div>
<?php } else { ?>
<div class="y">
<a href="member.php?mod=<?php echo $_G['setting']['regname'];?>"><?php echo $_G['setting']['reglinkname'];?></a>
<a href="member.php?mod=logging&amp;action=login" onclick="showWindow('login', this.href)">登录</a>
</div>
<?php } ?>
<div class="z">
<a href="./" title="<?php echo $_G['setting']['bbname'];?>" class="xw1"><?php echo $_G['setting']['bbname'];?></a>
<a href="home.php?mod=space&amp;do=home" id="navs" class="showmenu" onmouseover="showMenu(this.id);">返回首页</a>
</div>
</div>
<?php if($space['status'] == -1 && $_G['adminid'] == 1 ) { ?>
<p class="ptw xw1 xi1 hm"><img src="<?php echo IMGDIR;?>/locked.gif" alt="Locked" class="vm" /> 提示: 作者被禁止或删除 内容自动屏蔽，只有管理员可见</p>
<?php } ?>
<div id="hd" class="wp cl">

<h2 id="spaceinfoshow"><?php space_merge($space, 'field_home'); $space[domainurl] = space_domain($space);getuserdiydata($space);$personalnv = isset($_G['blockposition']['nv']) ? $_G['blockposition']['nv'] : '';?><strong id="spacename" class="mbn">
<?php if($space['spacename']) { ?><?php echo $space['spacename'];?><?php } else { ?><?php echo $space['username'];?>的个人空间<?php } ?>
</strong>
<span class="xs0 xw0">
<a id="domainurl" href="<?php echo $space['domainurl'];?>" onclick="setCopy('<?php echo $space['domainurl'];?>', '空间地址复制成功');return false;"><?php echo $space['domainurl'];?></a>
<a href="javascript:;" onclick="addFavorite(location.href, document.title)">[收藏]</a>
<a id="domainurl" href="<?php echo $space['domainurl'];?>" onclick="setCopy('<?php echo $space['domainurl'];?>', '空间地址复制成功');return false;">[复制]</a>
<?php if(!$space['self']) { if(helper_access::check_module('share')) { ?>
<a id="share_space" href="home.php?mod=spacecp&amp;ac=share&amp;type=space&amp;id=<?php echo $space['uid'];?>" onclick="showWindow(this.id, this.href, 'get', 0);">[分享]</a>
<?php } ?>
<a href="home.php?mod=rss&amp;uid=<?php echo $space['uid'];?>">[RSS]</a>
<?php } ?>
</span>
<span id="spacedescription" class="xs1 xw0 mtn"><?php echo $space['spacedescription'];?></span>
</h2><?php if($_G['adminid'] == 1 && empty($space['self'])) { ?><?php $personalnv['items'] = array(); $personalnv['banitems'] = array(); $personalnv['nvhidden'] = 0;?><?php } ?><?php $nvclass = !empty($personalnv['nvhidden']) ? ' class="mininv"' : '';?><div id="nv">
<ul<?php echo $nvclass;?>>
<?php if(empty($personalnv['nvhidden'])) { if(empty($personalnv['banitems']['index'])) { if($_G['adminid'] == 1 && $_G['setting']['allowquickviewprofile'] == 1) { ?>
<li><a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=index&amp;view=admin"><?php if(!empty($personalnv['items']['index'])) { ?><?php echo $personalnv['items']['index'];?><?php } else { ?>空间首页<?php } ?></a></li>
<?php } else { ?>
<li><a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=index"><?php if(!empty($personalnv['items']['index'])) { ?><?php echo $personalnv['items']['index'];?><?php } else { ?>空间首页<?php } ?></a></li>
<?php } } if(empty($personalnv['banitems']['feed'])) { ?>
<li><a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=home&amp;view=me&amp;from=space"><?php if(!empty($personalnv['items']['feed'])) { ?><?php echo $personalnv['items']['feed'];?><?php } else { ?>动态<?php } ?></a></li>
<?php } if(empty($personalnv['banitems']['doing'])) { ?>
<li><a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=doing&amp;view=me&amp;from=space"><?php if(!empty($personalnv['items']['doing'])) { ?><?php echo $personalnv['items']['doing'];?><?php } else { ?>记录<?php } ?></a></li>
<?php } if(empty($personalnv['banitems']['blog'])) { ?>
<li><a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=blog&amp;view=me&amp;from=space"><?php if(!empty($personalnv['items']['blog'])) { ?><?php echo $personalnv['items']['blog'];?><?php } else { ?>日志<?php } ?></a></li>
<?php } if(empty($personalnv['banitems']['album'])) { ?>
<li><a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=album&amp;view=me&amp;from=space"><?php if(!empty($personalnv['items']['album'])) { ?><?php echo $personalnv['items']['album'];?><?php } else { ?>相册<?php } ?></a></li>
<?php } if(empty($personalnv['banitems']['follow'])) { ?>
<li><a href="home.php?mod=follow&amp;uid=<?php echo $space['uid'];?>&amp;do=view"><?php if(!empty($personalnv['items']['follow'])) { ?><?php echo $personalnv['items']['follow'];?><?php } else { ?>广播<?php } ?></a></li>
<?php } if($_G['setting']['allowviewuserthread'] !== false && (empty($personalnv['banitems']['topic']))) { ?>
<li><a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=thread&amp;view=me&amp;from=space"><?php if(!empty($personalnv['items']['topic'])) { ?><?php echo $personalnv['items']['topic'];?><?php } else { ?>主题<?php } ?></a></li>
<?php } if(empty($personalnv['banitems']['share'])) { ?>
<li><a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=share&amp;view=me&amp;from=space"><?php if(!empty($personalnv['items']['share'])) { ?><?php echo $personalnv['items']['share'];?><?php } else { ?>分享<?php } ?></a></li>
<?php } if(empty($personalnv['banitems']['wall'])) { ?>
<li><a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=wall"><?php if(!empty($personalnv['items']['wall'])) { ?><?php echo $personalnv['items']['wall'];?><?php } else { ?>留言板<?php } ?></a></li>
<?php } if(empty($personalnv['banitems']['profile'])) { ?>
<li><a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=profile"><?php if(!empty($personalnv['items']['profile'])) { ?><?php echo $personalnv['items']['profile'];?><?php } else { ?>个人资料<?php } ?></a></li>
<?php } } ?>
</ul>
</div></div>

<?php if(!empty($_G['setting']['plugins']['jsmenu'])) { ?>
<ul class="p_pop h_pop" id="plugin_menu" style="display: none"><?php if(is_array($_G['setting']['plugins']['jsmenu'])) foreach($_G['setting']['plugins']['jsmenu'] as $module) { ?>     <?php if(!$module['adminid'] || ($module['adminid'] && $_G['adminid'] > 0 && $module['adminid'] >= $_G['adminid'])) { ?>
     <li><?php echo $module['url'];?></li>
     <?php } } ?>
</ul>
<?php } ?>
<?php echo $_G['setting']['menunavs'];?><?php $mnid = getcurrentnav();?><ul id="navs_menu" class="p_pop topnav_pop" style="display:none;"><?php if(is_array($_G['setting']['navs'])) foreach($_G['setting']['navs'] as $nav) { ?><?php $nav_showmenu = strpos($nav['nav'], 'onmouseover="showMenu(');?>    <?php $nav_navshow = strpos($nav['nav'], 'onmouseover="navShow(')?>    <?php if($nav_hidden !== false || $nav_navshow !== false) { ?><?php $nav['nav'] = preg_replace("/onmouseover\=\"(.*?)\"/i", '',$nav['nav'])?>    <?php } ?>
    <?php if($nav['available'] && (!$nav['level'] || ($nav['level'] == 1 && $_G['uid']) || ($nav['level'] == 2 && $_G['adminid'] > 0) || ($nav['level'] == 3 && $_G['adminid'] == 1))) { ?><li <?php echo $nav['nav'];?>></li><?php } } ?>
</ul>
<ul id="myspace_menu" class="p_pop" style="display:none;">
    <li><a href="home.php?mod=space">我的空间</a></li><?php if(is_array($_G['setting']['mynavs'])) foreach($_G['setting']['mynavs'] as $nav) { if($nav['available'] && (!$nav['level'] || ($nav['level'] == 1 && $_G['uid']) || ($nav['level'] == 2 && $_G['adminid'] > 0) || ($nav['level'] == 3 && $_G['adminid'] == 1))) { ?>
<li><?php echo $nav['code'];?></li>
<?php } } ?>
</ul>
<div id="ct" class="ct2 wp cl">
<div class="mn">
<div class="bm">
<div class="bm_h">
<?php if($space['self'] && helper_access::check_module('album')) { ?><span class="xi2 y"><a href="home.php?mod=spacecp&amp;ac=upload" class="addnew">上传图片</a></span><?php } ?>
<h1 class="mt">相册</h1>
</div>
<div class="bm_c">
<?php } else { include template('common/header'); ?><div id="pt" class="bm cl">
<div class="z">
<a href="./" class="nvhm" title="首页"><?php echo $_G['setting']['bbname'];?></a> <em>&rsaquo;</em>
<a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>"><?php echo $space['username'];?></a> <em>&rsaquo;</em>
<a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=blog&amp;view=me">相册</a>
</div>
</div>
<style id="diy_style" type="text/css"></style>
<div class="wp">
<!--[diy=diy1]--><div id="diy1" class="area"></div><!--[/diy]-->
</div><?php include template('home/space_menu'); ?><div id="ct" class="ct1 wp cl">
<div class="mn">
<!--[diy=diycontenttop]--><div id="diycontenttop" class="area"></div><!--[/diy]-->
<div class="bm bw0">
<div class="bm_c">
<?php } ?>

<div class="tbmu" id="pic_block">
<div class="y">
<a href="javascript:;" onclick="imageRotate('pic', 1)"><img class="vm" src="<?php echo STATICURL;?>image/common/rleft.gif" /></a>
<a href="javascript:;" onclick="imageRotate('pic', 2)"><img class="vm" src="<?php echo STATICURL;?>image/common/rright.gif" /></a><span class="pipe">|</span>
<a href="home.php?mod=space&amp;uid=<?php echo $pic['uid'];?>&amp;do=<?php echo $do;?>&amp;picid=<?php echo $upid;?>&amp;goto=up#pic_block">上一张</a><span class="pipe">|</span>
<a href="home.php?mod=space&amp;uid=<?php echo $pic['uid'];?>&amp;do=<?php echo $do;?>&amp;picid=<?php echo $nextid;?>&amp;goto=down#pic_block" id="nextlink">下一张</a><span class="pipe">|</span>
<?php if($_GET['play']) { ?>
<a href="javascript:;" id="playid" class="osld" onclick="playNextPic(false);">停止播放</a>
<?php } else { ?>
<a href="javascript:;" id="playid" class="osld" onclick="playNextPic(true);">幻灯播放</a>
<?php } ?><span id="displayNum"></span>
</div>
<a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=album&amp;id=<?php echo $pic['albumid'];?>">&laquo; 返回图片列表</a>
<?php if($album['picnum']) { ?><span class="pipe">|</span>当前第 <?php echo $sequence;?> 张<span class="pipe">|</span>共 <?php echo $album['picnum'];?> 张图片<?php } ?>&nbsp;
<?php if($album['friend']) { ?>
<span class="xg1"> &nbsp; <?php echo $friendsname[$value['friend']];?></span>
<?php } ?>
<?php if(!empty($_G['setting']['pluginhooks']['space_album_pic_top'])) echo $_G['setting']['pluginhooks']['space_album_pic_top'];?>
</div>

<div class="vw pic">

<div id="photo_pic" class="c<?php if($pic['magicframe']) { ?> magicframe magicframe<?php echo $pic['magicframe'];?><?php } ?>">
<?php if($pic['magicframe']) { ?>
<div class="pic_lb1">
<table cellpadding="0" cellspacing="0" class="">
<tr>
<td class="frame_jiao frame_top_left"></td>
<td class="frame_x frame_top_middle"></td>
<td class="frame_jiao frame_top_right"></td>
</tr>
<tr>
<td class="frame_y frame_middle_left"></td>
<td class="frame_middle_middle">
<?php } ?><a href="home.php?mod=space&amp;uid=<?php echo $pic['uid'];?>&amp;do=<?php echo $do;?>&amp;picid=<?php echo $nextid;?>&amp;goto=down#pic_block"><img src="<?php echo $pic['pic'];?>" id="pic" alt="" /></a>
<script type="text/javascript">
function createElem(e){
var obj = document.createElement(e);
obj.style.position = 'absolute';
obj.style.zIndex = '1';
obj.style.cursor = 'pointer';
obj.onmouseout = function(){ this.style.background = 'none';}
return obj;
}
function viewPhoto(){
var pager = createElem('div');
var pre = createElem('div');
var next = createElem('div');
var cont = $('photo_pic');
var tar = $('pic');
var space = 0;
var w = tar.width/2;
if(!!window.ActiveXObject && !window.XMLHttpRequest){
space = -(cont.offsetWidth - tar.width)/2;
}
var objpos = fetchOffset(tar);

pager.style.position = 'absolute';
pager.style.top = '0';
pager.style.left = objpos['left'] + 'px';
pager.style.top = objpos['top'] + 'px';
pager.style.width = tar.width + 'px';
pager.style.height = tar.height + 'px';
pre.style.left = 0;
next.style.right = 0;
pre.style.width = next.style.width = w + 'px';
pre.style.height = next.style.height = tar.height + 'px';
pre.innerHTML = next.innerHTML = '<img src="<?php echo IMGDIR;?>/emp.gif" width="' + w + '" height="' + tar.height + '" />';

pre.onmouseover = function(){ this.style.background = 'url(<?php echo IMGDIR;?>/pic-prev.png) no-repeat 0 100px'; }
pre.onclick = function(){ window.location = 'home.php?mod=space&uid=<?php echo $pic['uid'];?>&do=<?php echo $do;?>&picid=<?php echo $upid;?>&goto=up#pic_block'; }

next.onmouseover = function(){ this.style.background = 'url(<?php echo IMGDIR;?>/pic-next.png) no-repeat 100% 100px'; }
next.onclick = function(){ window.location = 'home.php?mod=space&uid=<?php echo $pic['uid'];?>&do=<?php echo $do;?>&picid=<?php echo $nextid;?>&goto=down#pic_block'; }

//cont.style.position = 'relative';
cont.appendChild(pager);
pager.appendChild(pre);
pager.appendChild(next);
}
$('pic').onload = function(){
viewPhoto();
}
</script>
<?php if($pic['magicframe']) { ?>
</td>
<td class="frame_y frame_middle_right"></td>
</tr>
<tr>
<td class="frame_jiao frame_bottom_left"></td>
<td class="frame_x frame_bottom_middle"></td>
<td class="frame_jiao frame_bottom_right"></td>
</tr>
</table>
</div>
<?php } ?>
</div>

<div class="pns mlnv vm mtm cl">
<a href="home.php?mod=space&amp;uid=<?php echo $pic['uid'];?>&amp;do=<?php echo $do;?>&amp;picid=<?php echo $upid;?>&amp;goto=up#pic_block" class="btn" title="上一张"><img src="<?php echo STATICURL;?>image/common/pic_nv_prev.gif" alt="上一张"/></a><?php if(is_array($piclist)) foreach($piclist as $value) { ?><a href="home.php?mod=space&amp;uid=<?php echo $value['uid'];?>&amp;do=album&amp;picid=<?php echo $value['picid'];?>#pic_block"><img alt="" src="<?php echo $value['pic'];?>"<?php if($value['picid']==$picid) { ?> class="a"<?php } ?> /></a><?php } ?><a href="home.php?mod=space&amp;uid=<?php echo $pic['uid'];?>&amp;do=<?php echo $do;?>&amp;picid=<?php echo $nextid;?>&amp;goto=down#pic_block" class="btn" title="下一张"><img src="<?php echo STATICURL;?>image/common/pic_nv_next.gif" alt="下一张"/></a>
</div>

<div class="d bbs">
<p id="a_set_title" class="albim_pic_title"><?php if($pic['title']) { ?><?php echo $pic['title'];?><?php } else { ?><?php echo substr($pic['filename'], 0, strrpos($pic['filename'], '.'));?><?php } if($pic['status'] == 1) { ?><b>(待审核)</b><?php } ?></p>
<p class="xg1 xs1">
<?php if($pic['hot']) { ?><span class="hot">热度 <em><?php echo $pic['hot'];?></em></span><?php } if($do=='event') { ?><a href="home.php?mod=space&amp;uid=<?php echo $pic['uid'];?>" target="_blank"><?php echo $pic['username'];?></a><?php } ?>
上传于 <?php echo dgmdate($pic[dateline]);?> (<?php echo $pic['size'];?>)
</p>
<?php if(isset($_GET['exif'])) { if($exifs) { if(is_array($exifs)) foreach($exifs as $key => $value) { if($value) { ?><p><?php echo $key;?> : <?php echo $value;?></p><?php } } } else { ?>
<p>无 EXIF 信息</p>
<?php } } ?>
<div class="o cl bw0 xs1 pbn">
<?php if(helper_access::check_module('share')) { ?>
<a href="home.php?mod=spacecp&amp;ac=share&amp;type=pic&amp;id=<?php echo $pic['picid'];?>&amp;handlekey=sharealbumhk_<?php echo $pic['picid'];?>" id="a_share_<?php echo $pic['picid'];?>" onclick="showWindow(this.id, this.href, 'get', 0);" class="oshr">分享</a>
<?php } ?>
<?php if(!empty($_G['setting']['pluginhooks']['space_album_pic_op_extra'])) echo $_G['setting']['pluginhooks']['space_album_pic_op_extra'];?>
<?php if($pic['uid'] == $_G['uid']) { if($_G['magic']['frame']) { ?>
<img src="<?php echo STATICURL;?>image/magic/frame.small.gif" alt="frame" class="vm" />
<?php if($pic['magicframe']) { ?>
<a id="a_magic_frame" href="home.php?mod=spacecp&amp;ac=magic&amp;op=cancelframe&amp;idtype=picid&amp;id=<?php echo $pic['picid'];?>" onclick="ajaxmenu(event,this.id)">取消相框</a>
<?php } else { ?>
<a id="a_magic_frame" href="home.php?mod=magic&amp;mid=frame&amp;idtype=picid&amp;id=<?php echo $pic['picid'];?>" onclick="ajaxmenu(event,this.id, 1)">加相框</a>
<?php } ?>
<span class="pipe">|</span>
<?php } } if($_G['uid'] == $pic['uid'] || checkperm('managealbum')) { ?>
<a href="home.php?mod=spacecp&amp;ac=album&amp;op=editpic&amp;albumid=<?php echo $pic['albumid'];?>&amp;picid=<?php echo $pic['picid'];?>">管理图片</a><span class="pipe">|</span>
<a href="home.php?mod=spacecp&amp;ac=album&amp;op=edittitle&amp;albumid=<?php echo $pic['albumid'];?>&amp;picid=<?php echo $pic['picid'];?>&amp;handlekey=edittitlehk_<?php echo $pic['picid'];?>" id="a_set_title" onclick="showWindow(this.id, this.href, 'get', 0);">编辑说明</a>
<?php } if(checkperm('managealbum')) { ?>
<span class="pipe">|</span>IP: <?php echo $pic['postip'];?>
<span class="pipe">|</span><a href="home.php?mod=spacecp&amp;ac=album&amp;picid=<?php echo $pic['picid'];?>&amp;op=edithot&amp;handlekey=picedithothk_<?php echo $pic['picid'];?>" id="a_hot_<?php echo $pic['picid'];?>" onclick="showWindow(this.id, this.href, 'get', 0);">热度</a>
<?php } ?>
<!--a href="home.php?mod=spacecp&amp;ac=common&amp;op=report&amp;idtype=picid&amp;id=<?php echo $pic['picid'];?>&amp;handlekey=reportpichk_<?php echo $pic['picid'];?>" id="a_report" onclick="showWindow(this.id, this.href, 'get', 0);">举报</a-->

<span class="z">
<a href="<?php echo $pic['pic'];?>" target="_blank">查看原图</a>
<?php if(!isset($_GET['exif'])) { ?>
<span class="pipe">|</span><a href="<?php echo $theurl;?>&exif=1">查看 EXIF 信息</a>
<?php } if($_G['group']['allowdiy'] || getstatus($_G['member']['allowadmincp'], 4) || getstatus($_G['member']['allowadmincp'], 5)) { ?>
<span class="pipe">|</span><a href="portal.php?mod=portalcp&amp;ac=portalblock&amp;op=recommend&amp;idtype=picid&amp;id=<?php echo $pic['picid'];?>" onclick="showWindow('recommend', this.href, 'get', 0)">模块推送</a>
<?php } if($pic['uid'] != $_G['uid']) { ?>
<span class="pipe">|</span><a href="javascript:;" onclick="showWindow('miscreport<?php echo $pic['picid'];?>', 'misc.php?mod=report&rtype=pic&uid=<?php echo $pic['uid'];?>&rid=<?php echo $pic['picid'];?>', 'get', -1);return false;">举报</a>
<?php } ?>
<?php if(!empty($_G['setting']['pluginhooks']['space_album_pic_bottom'])) echo $_G['setting']['pluginhooks']['space_album_pic_bottom'];?>
</span>
</div>
</div>

</div>
<!--[diy=diyclicktop]--><div id="diyclicktop" class="area"></div><!--[/diy]-->
<?php if($album['friend'] != 3) { ?>
<div id="click_div"><?php include template('home/space_click'); ?></div>
<?php } ?>
<!--[diy=diycommenttop]--><div id="diycommenttop" class="area"></div><!--[/diy]-->
<div id="pic_comment" class="bm bw0 mtm mbm">
<h3 class="pbn bbs">
<?php if(!empty($list)) { ?>
<a href="home.php?mod=space&amp;uid=<?php echo $pic['uid'];?>&amp;do=<?php echo $do;?>&amp;picid=<?php echo $pic['picid'];?>#quickcommentform_<?php echo $picid;?>" onclick="if($('comment_message')){$('comment_message').focus();return false;}" class="y xi2 xw0">发表评论</a>
<?php } ?>
评论
</h3>
<div id="comment">
<?php if($cid) { ?>
<div class="i">
当前只显示与您操作相关的单个评论，<a href="<?php echo $theurl;?>#comment">点击此处查看全部评论</a>
</div>
<?php } ?>

<div id="comment_ul" class="xld xlda"><?php if(is_array($list)) foreach($list as $value) { include template('home/space_comment_li'); } ?>
</div>
</div>
<?php if($multi) { ?><div class="pgs cl mtm"><?php echo $multi;?></div><?php } ?>
</div>
<?php if(helper_access::check_module('album')) { ?>
<form id="quickcommentform_<?php echo $picid;?>" name="quickcommentform_<?php echo $picid;?>" action="home.php?mod=spacecp&amp;ac=comment&amp;handlekey=qcpic_<?php echo $picid;?>" method="post" autocomplete="off" onsubmit="ajaxpost('quickcommentform_<?php echo $picid;?>', 'return_qcpic_<?php echo $picid;?>');doane(event);" class="bm bw0" style="width: 600px;">
<?php if($_G['uid']) { ?>
<p>
<span id="comment_face" onclick="showFace(this.id, 'comment_message');return false;" class="cur1"><img src="<?php echo IMGDIR;?>/facelist.gif" alt="facelist" class="vm" /></span>
<?php if(!empty($_G['setting']['pluginhooks']['space_album_pic_face_extra'])) echo $_G['setting']['pluginhooks']['space_album_pic_face_extra'];?>
<?php if($_G['setting']['magicstatus'] && !empty($_G['setting']['magics']['doodle'])) { ?>
<a id="a_magic_doodle" href="home.php?mod=magic&amp;mid=doodle&amp;showid=comment_doodle&amp;target=comment_message" onclick="showWindow(this.id, this.href, 'get', 0)"><img src="<?php echo STATICURL;?>image/magic/doodle.small.gif" alt="doodle" class="vm" /> <?php echo $_G['setting']['magics']['doodle'];?></a>
<?php } ?>
</p>
<?php } ?>
<div class="tedt mtn mbn">
<div class="area">
<?php if($_G['uid']) { ?>
<textarea id="comment_message" onkeydown="ctrlEnter(event, 'commentsubmit_btn');" name="message" rows="3" class="pt"></textarea>
<?php } else { ?>
<div class="pt hm">您需要登录后才可以评论 <a href="member.php?mod=logging&amp;action=login" onclick="showWindow('login', this.href)" class="xi2">登录</a> | <a href="member.php?mod=<?php echo $_G['setting']['regname'];?>" class="xi2"><?php echo $_G['setting']['reglinkname'];?></a></div>
<?php } ?>
</div>

</div>
<?php if(checkperm('seccode') && ($secqaacheck || $seccodecheck)) { ?><?php
$sectpl = <<<EOF
<sec> <span id="sec<hash>" onclick="showMenu(this.id);"><sec></span><div id="sec<hash>_menu" class="p_pop p_opt" style="display:none"><sec></div>
EOF;
?>
<div class="mtm mbm sec"><?php $_G['sechashi'] = !empty($_G['cookie']['sechashi']) ? $_G['sechash'] + 1 : 0;
$sechash = 'S'.($_G['inajax'] ? 'A' : '').$_G['sid'].$_G['sechashi'];
$sectpl = !empty($sectpl) ? explode("<sec>", $sectpl) : array('<br />',': ','<br />','');
$sectpldefault = $sectpl;
$sectplqaa = str_replace('<hash>', 'qaa'.$sechash, $sectpldefault);
$sectplcode = str_replace('<hash>', 'code'.$sechash, $sectpldefault);
$secshow = !isset($secshow) ? 1 : $secshow;
$sectabindex = !isset($sectabindex) ? 1 : $sectabindex;?><?php
$__STATICURL = STATICURL;$seccheckhtml = <<<EOF

<input name="sechash" type="hidden" value="{$sechash}" />

EOF;
 if($sectpl) { if($secqaacheck) { 
$seccheckhtml .= <<<EOF

{$sectplqaa['0']}验证问答{$sectplqaa['1']}<input name="secanswer" id="secqaaverify_{$sechash}" type="text" autocomplete="off" style="width:100px" class="txt px vm" onblur="checksec('qaa', '{$sechash}')" tabindex="{$sectabindex}" />
<a href="javascript:;" onclick="updatesecqaa('{$sechash}');doane(event);" class="xi2">换一个</a>
<span id="checksecqaaverify_{$sechash}"><img src="{$__STATICURL}image/common/none.gif" width="16" height="16" class="vm" /></span>
{$sectplqaa['2']}<span id="secqaa_{$sechash}"></span>

EOF;
 if($secshow) { 
$seccheckhtml .= <<<EOF
<script type="text/javascript" reload="1">updatesecqaa('{$sechash}');</script>
EOF;
 } 
$seccheckhtml .= <<<EOF

{$sectplqaa['3']}

EOF;
 } if($seccodecheck) { 
$seccheckhtml .= <<<EOF

{$sectplcode['0']}验证码{$sectplcode['1']}<input name="seccodeverify" id="seccodeverify_{$sechash}" type="text" autocomplete="off" style="
EOF;
 if($_G['setting']['seccodedata']['type'] != 1) { 
$seccheckhtml .= <<<EOF
ime-mode:disabled;
EOF;
 } 
$seccheckhtml .= <<<EOF
width:100px" class="txt px vm" onblur="checksec('code', '{$sechash}')" tabindex="{$sectabindex}" />
<a href="javascript:;" onclick="updateseccode('{$sechash}');doane(event);" class="xi2">换一个</a>
<span id="checkseccodeverify_{$sechash}"><img src="{$__STATICURL}image/common/none.gif" width="16" height="16" class="vm" /></span>
{$sectplcode['2']}<span id="seccode_{$sechash}"></span>

EOF;
 if($secshow) { 
$seccheckhtml .= <<<EOF
<script type="text/javascript" reload="1">updateseccode('{$sechash}');</script>
EOF;
 } 
$seccheckhtml .= <<<EOF

{$sectplcode['3']}

EOF;
 } } 
$seccheckhtml .= <<<EOF


EOF;
?><?php unset($secshow);?><?php if(empty($secreturn)) { ?><?php echo $seccheckhtml;?><?php } ?></div>
<?php } ?>
<p class="pns">
<input type="hidden" name="refer" value="<?php echo $theurl;?>" />
<input type="hidden" name="id" value="<?php echo $picid;?>" />
<input type="hidden" name="idtype" value="picid" />
<input type="hidden" name="commentsubmit" value="true" />
<input type="hidden" name="quickcomment" value="true" />
<button type="submit" name="commentsubmit_btn" value="true" id="commentsubmit_btn" class="pn"<?php if(!$_G['uid']) { ?> onclick="showWindow(this.id, this.form.action);return false;"<?php } ?>><strong>评论</strong></button>
<span id="__quickcommentform_<?php echo $picid;?>"></span>
<span id="return_qcpic_<?php echo $picid;?>"></span>
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
</p>
</form>
<?php } ?>
</div>


<script type="text/javascript">
function succeedhandle_qcpic_<?php echo $picid;?>(url, msg, values) {
if(values['cid']) {
comment_add(values['cid']);
} else {
$('return_qcpic_<?php echo $picid;?>').innerHTML = msg;
}
<?php if(checkperm('seccode') && $sechash) { if($secqaacheck) { ?>
updatesecqaa('<?php echo $sechash;?>');
<?php } if($seccodecheck) { ?>
updateseccode('<?php echo $sechash;?>');
<?php } } ?>
}
</script>

<script type="text/javascript">
var interval = 5000;
var timerId = -1;
var derId = -1;
var replay = false;
var num = 0;
var endPlay = false;
function forward() {
window.location.href = 'home.php?mod=space&uid=<?php echo $pic['uid'];?>&do=<?php echo $do;?>&picid=<?php echo $nextid;?>&goto=down&play=1#pic_block';
}
function derivativeNum() {
num++;
$('displayNum').innerHTML = '[' + (interval/1000 - num) + ']';
}
function playNextPic(stat) {
if(stat || replay) {
derId = window.setInterval('derivativeNum();', 1000);
$('displayNum').innerHTML = '[' + (interval/1000 - num) + ']';
$('playid').onclick = function (){replay = false;playNextPic(false);};
$('playid').innerHTML = '停止播放';
timerId = window.setInterval('forward();', interval);
} else {
replay = true;
num = 0;
if(endPlay) {
$('playid').innerHTML = '重新播放';
} else {
$('playid').innerHTML = '幻灯播放';
}
$('playid').onclick = function (){playNextPic(true);};
$('displayNum').innerHTML = '';
window.clearInterval(timerId);
window.clearInterval(derId);
}
}
<?php if($_GET['play']) { if($sequence && $album['picnum']) { ?>
if(<?php echo $sequence;?> == <?php echo $album['picnum'];?>) {
endPlay = true;
playNextPic(false);
} else {
playNextPic(true);
}
<?php } else { ?>
playNextPic(true);
<?php } } ?>

function update_title() {
$('title_form').style.display='';
}

var elems = selector('dd[class~=magicflicker]');
for(var i=0; i<elems.length; i++){
magicColor(elems[i]);
}
</script>

<!--end bm-->

<?php if(!$_G['setting']['homepagestyle']) { ?><!--[diy=diycontentbottom]--><div id="diycontentbottom" class="area"></div><!--[/diy]--><?php } ?>
</div>
</div>
<?php if($_G['setting']['homepagestyle']) { ?>
<div class="sd"><div id="pcd" class="bm cl"><?php $encodeusername = rawurlencode($space[username]);?><div class="bm_c">
<div class="hm">
<p><a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>"><?php echo avatar($space[uid],middle);?></a></p>
<h2 class="xs2"><a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>"><?php echo $space['username'];?></a></h2>
</div>
<ul class="xl xl2 cl ul_list">
<?php if($space['self']) { if($_G['setting']['homepagestyle']) { ?>
<li class="ul_diy"><a href="home.php?mod=space&amp;do=index&amp;diy=yes">装扮空间</a></li>
<?php } if(helper_access::check_module('wall')) { ?>
<li class="ul_msg"><a href="home.php?mod=space&amp;do=wall">查看留言</a></li>
<?php } ?>
<li class="ul_avt"><a href="home.php?mod=spacecp&amp;ac=avatar">编辑头像</a></li>
<li class="ul_profile"><a href="home.php?mod=spacecp&amp;ac=profile">更新资料</a></li>
<?php } else { ?>
<li class="ul_broadcast"><a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>">查看广播</a></li>
<?php if(helper_access::check_module('follow') && $space['uid'] != $_G['uid']) { ?>
<li class="ul_flw"><?php $follow = 0;?><?php $follow = C::t('home_follow')->fetch_all_by_uid_followuid($_G['uid'], $space['uid']);?><?php if(!$follow) { ?>
<a id="followmod" onclick="showWindow(this.id, this.href, 'get', 0);" href="home.php?mod=spacecp&amp;ac=follow&amp;op=add&amp;hash=<?php echo FORMHASH;?>&amp;fuid=<?php echo $space['uid'];?>">收听TA</a>
<?php } else { ?>
<a id="followmod" onclick="showWindow(this.id, this.href, 'get', 0);" href="home.php?mod=spacecp&amp;ac=follow&amp;op=del&amp;fuid=<?php echo $space['uid'];?>">取消收听</a>
<?php } ?>
</li>
<?php } ?><?php require_once libfile('function/friend');$isfriend=friend_check($space[uid]);?><?php if(!$isfriend) { ?>
<li class="ul_add"><a href="home.php?mod=spacecp&amp;ac=friend&amp;op=add&amp;uid=<?php echo $space['uid'];?>&amp;handlekey=addfriendhk_<?php echo $space['uid'];?>" id="a_friend_li_<?php echo $space['uid'];?>" onclick="showWindow(this.id, this.href, 'get', 0);">加为好友</a></li>
<?php } else { ?>
<li class="ul_ignore"><a href="home.php?mod=spacecp&amp;ac=friend&amp;op=ignore&amp;uid=<?php echo $space['uid'];?>&amp;handlekey=ignorefriendhk_<?php echo $space['uid'];?>" id="a_ignore_<?php echo $space['uid'];?>" onclick="showWindow(this.id, this.href, 'get', 0);">解除好友</a></li>
<?php } if(helper_access::check_module('wall')) { ?>
<li class="ul_contect"><a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=wall">给我留言</a></li>
<?php } ?>
<li class="ul_poke"><a href="home.php?mod=spacecp&amp;ac=poke&amp;op=send&amp;uid=<?php echo $space['uid'];?>&amp;handlekey=propokehk_<?php echo $space['uid'];?>" id="a_poke_<?php echo $space['uid'];?>" onclick="showWindow(this.id, this.href, 'get', 0);">打个招呼</a></li>

<li class="ul_pm"><a href="home.php?mod=spacecp&amp;ac=pm&amp;op=showmsg&amp;handlekey=showmsg_<?php echo $space['uid'];?>&amp;touid=<?php echo $space['uid'];?>&amp;pmid=0&amp;daterange=2" id="a_sendpm_<?php echo $space['uid'];?>" onclick="showWindow('showMsgBox', this.href, 'get', 0)">发送消息</a></li>
<?php } ?>
</ul>
<?php if(checkperm('allowbanuser') || checkperm('allowedituser') || $_G['adminid'] == 1) { ?>
<hr class="da mtn m0">
<ul class="ptn xl xl2 cl">
<?php if(checkperm('allowbanuser') || checkperm('allowedituser')) { ?>
<li>
<?php if(checkperm('allowbanuser')) { ?>
<a href="<?php if($_G['adminid'] == 1) { ?>admin.php?action=members&operation=ban&username=<?php echo $encodeusername;?>&frames=yes<?php } else { ?>forum.php?mod=modcp&action=member&op=ban&uid=<?php echo $space['uid'];?><?php } ?>" id="usermanageli" onmouseover="showMenu(this.id)" class="showmenu" target="_blank">用户管理</a>
<?php } else { ?>
<a href="<?php if($_G['adminid'] == 1) { ?>admin.php?action=members&operation=search&username=<?php echo $encodeusername;?>&submit=yes&frames=yes<?php } else { ?>forum.php?mod=modcp&action=member&op=edit&uid=<?php echo $space['uid'];?><?php } ?>" id="usermanageli" onmouseover="showMenu(this.id)" class="showmenu" target="_blank">用户管理</a>
<?php } ?>
</li>
<?php } if($_G['adminid'] == 1) { ?>
<li><a href="forum.php?mod=modcp&amp;action=thread&amp;op=post&amp;do=search&amp;searchsubmit=1&amp;users=<?php echo $encodeusername;?>" id="umanageli" onmouseover="showMenu(this.id)" class="showmenu">内容管理</a></li>
<?php } ?>
</ul>
<?php if(checkperm('allowbanuser') || checkperm('allowedituser')) { ?>
<ul id="usermanageli_menu" class="p_pop" style="width: 80px; display:none;">
<?php if(checkperm('allowbanuser')) { ?>
<li><a href="<?php if($_G['adminid'] == 1) { ?>admin.php?action=members&operation=ban&username=<?php echo $encodeusername;?>&frames=yes<?php } else { ?>forum.php?mod=modcp&action=member&op=ban&uid=<?php echo $space['uid'];?><?php } ?>" target="_blank">禁止用户</a></li>
<?php } if(checkperm('allowedituser')) { ?>
<li><a href="<?php if($_G['adminid'] == 1) { ?>admin.php?action=members&operation=search&username=<?php echo $encodeusername;?>&submit=yes&frames=yes<?php } else { ?>forum.php?mod=modcp&action=member&op=edit&uid=<?php echo $space['uid'];?><?php } ?>" target="_blank">编辑用户</a></li>
<?php } ?>
</ul>
<?php } if($_G['adminid'] == 1) { ?>
<ul id="umanageli_menu" class="p_pop" style="width: 80px; display:none;">
<li><a href="forum.php?mod=modcp&amp;action=thread&amp;op=post&amp;searchsubmit=1&amp;do=search&amp;users=<?php echo $encodeusername;?>" target="_blank">管理帖子</a></li>
<?php if(helper_access::check_module('doing')) { ?>
<li><a href="admin.php?action=doing&amp;searchsubmit=1&amp;detail=1&amp;search=true&amp;fromumanage=1&amp;users=<?php echo $encodeusername;?>" target="_blank">管理记录</a></li>
<?php } if(helper_access::check_module('blog')) { ?>
<li><a href="admin.php?action=blog&amp;searchsubmit=1&amp;detail=1&amp;search=true&amp;fromumanage=1&amp;uid=<?php echo $space['uid'];?>" target="_blank">管理日志</a></li>
<?php } if(helper_access::check_module('feed')) { ?>
<li><a href="admin.php?action=feed&amp;searchsubmit=1&amp;detail=1&amp;fromumanage=1&amp;uid=<?php echo $space['uid'];?>" target="_blank">管理动态</a></li>
<?php } if(helper_access::check_module('album')) { ?>
<li><a href="admin.php?action=album&amp;searchsubmit=1&amp;detail=1&amp;search=true&amp;fromumanage=1&amp;uid=<?php echo $space['uid'];?>" target="_blank">管理相册</a></li>
<li><a href="admin.php?action=pic&amp;searchsubmit=1&amp;detail=1&amp;search=true&amp;fromumanage=1&amp;users=<?php echo $encodeusername;?>" target="_blank">管理图片</a></li>
<?php } if(helper_access::check_module('wall')) { ?>
<li><a href="admin.php?action=comment&amp;searchsubmit=1&amp;detail=1&amp;fromumanage=1&amp;authorid=<?php echo $space['uid'];?>" target="_blank">管理评论</a></li>
<?php } if(helper_access::check_module('share')) { ?>
<li><a href="admin.php?action=share&amp;searchsubmit=1&amp;detail=1&amp;search=true&amp;fromumanage=1&amp;uid=<?php echo $space['uid'];?>" target="_blank">管理分享</a></li>
<?php } if(helper_access::check_module('group')) { ?>
<li><a href="admin.php?action=threads&amp;operation=group&amp;searchsubmit=1&amp;detail=1&amp;search=true&amp;fromumanage=1&amp;users=<?php echo $encodeusername;?>" target="_blank">群组主题</a></li>
<li><a href="admin.php?action=prune&amp;searchsubmit=1&amp;detail=1&amp;operation=group&amp;fromumanage=1&amp;users=<?php echo $encodeusername;?>" target="_blank">群组帖子</a></li>
<?php } ?>
</ul>
<?php } } ?>
</div>
</div>
</div>
<script type="text/javascript">
function succeedhandle_followmod(url, msg, values) {
var fObj = $('followmod');
if(values['type'] == 'add') {
fObj.innerHTML = '取消收听';
fObj.href = 'home.php?mod=spacecp&ac=follow&op=del&fuid='+values['fuid'];
} else if(values['type'] == 'del') {
fObj.innerHTML = '收听TA';
fObj.href = 'home.php?mod=spacecp&ac=follow&op=add&hash=<?php echo FORMHASH;?>&fuid='+values['fuid'];
}
}
</script><?php } ?>
</div>
</div>

<?php if(!$_G['setting']['homepagestyle']) { ?>
<div class="wp mtn">
<!--[diy=diy3]--><div id="diy3" class="area"></div><!--[/diy]-->
</div>
<?php } ?>	</div>
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