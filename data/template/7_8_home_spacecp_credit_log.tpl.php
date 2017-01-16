<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('spacecp_credit_log');
0
|| checktplrefresh('./template/yesmmc_N3BSK2vfZ0FtHwIb/home/spacecp_credit_log.htm', './template/yesmmc_N3BSK2vfZ0FtHwIb/common/header.htm', 1383879512, '8', './data/template/7_8_home_spacecp_credit_log.tpl.php', './template/yesmmc_N3BSK2vfZ0FtHwIb', 'home/spacecp_credit_log')
|| checktplrefresh('./template/yesmmc_N3BSK2vfZ0FtHwIb/home/spacecp_credit_log.htm', './template/yesmmc_N3BSK2vfZ0FtHwIb/home/spacecp_header.htm', 1383879512, '8', './data/template/7_8_home_spacecp_credit_log.tpl.php', './template/yesmmc_N3BSK2vfZ0FtHwIb', 'home/spacecp_credit_log')
|| checktplrefresh('./template/yesmmc_N3BSK2vfZ0FtHwIb/home/spacecp_credit_log.htm', './template/yesmmc_N3BSK2vfZ0FtHwIb/home/spacecp_credit_header.htm', 1383879512, '8', './data/template/7_8_home_spacecp_credit_log.tpl.php', './template/yesmmc_N3BSK2vfZ0FtHwIb', 'home/spacecp_credit_log')
|| checktplrefresh('./template/yesmmc_N3BSK2vfZ0FtHwIb/home/spacecp_credit_log.htm', './template/yesmmc_N3BSK2vfZ0FtHwIb/home/spacecp_footer.htm', 1383879512, '8', './data/template/7_8_home_spacecp_credit_log.tpl.php', './template/yesmmc_N3BSK2vfZ0FtHwIb', 'home/spacecp_credit_log')
|| checktplrefresh('./template/yesmmc_N3BSK2vfZ0FtHwIb/home/spacecp_credit_log.htm', './template/yesmmc_N3BSK2vfZ0FtHwIb/common/footer.htm', 1383879512, '8', './data/template/7_8_home_spacecp_credit_log.tpl.php', './template/yesmmc_N3BSK2vfZ0FtHwIb', 'home/spacecp_credit_log')
|| checktplrefresh('./template/yesmmc_N3BSK2vfZ0FtHwIb/home/spacecp_credit_log.htm', './template/yesmmc_N3BSK2vfZ0FtHwIb/common/header_common.htm', 1383879512, '8', './data/template/7_8_home_spacecp_credit_log.tpl.php', './template/yesmmc_N3BSK2vfZ0FtHwIb', 'home/spacecp_credit_log')
|| checktplrefresh('./template/yesmmc_N3BSK2vfZ0FtHwIb/home/spacecp_credit_log.htm', './template/yesmmc_N3BSK2vfZ0FtHwIb/home/spacecp_header_name.htm', 1383879512, '8', './data/template/7_8_home_spacecp_credit_log.tpl.php', './template/yesmmc_N3BSK2vfZ0FtHwIb', 'home/spacecp_credit_log')
|| checktplrefresh('./template/yesmmc_N3BSK2vfZ0FtHwIb/home/spacecp_credit_log.htm', './template/yesmmc_N3BSK2vfZ0FtHwIb/home/spacecp_header_name.htm', 1383879512, '8', './data/template/7_8_home_spacecp_credit_log.tpl.php', './template/yesmmc_N3BSK2vfZ0FtHwIb', 'home/spacecp_credit_log')
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
<base href="<?php echo $_G['siteurl'];?>" /><link rel="stylesheet" type="text/css" href="data/cache/style_<?php echo STYLEID;?>_common.css?<?php echo VERHASH;?>" /><link rel="stylesheet" type="text/css" href="data/cache/style_<?php echo STYLEID;?>_home_spacecp.css?<?php echo VERHASH;?>" /><?php if($_G['uid'] && isset($_G['cookie']['extstyle']) && strpos($_G['cookie']['extstyle'], TPLDIR) !== false) { ?><link rel="stylesheet" id="css_extstyle" type="text/css" href="<?php echo $_G['cookie']['extstyle'];?>/style.css" /><?php } elseif($_G['style']['defaultextstyle']) { ?><link rel="stylesheet" id="css_extstyle" type="text/css" href="<?php echo $_G['style']['defaultextstyle'];?>/style.css" /><?php } ?><script type="text/javascript">var STYLEID = '<?php echo STYLEID;?>', STATICURL = '<?php echo STATICURL;?>', IMGDIR = '<?php echo IMGDIR;?>', VERHASH = '<?php echo VERHASH;?>', charset = '<?php echo CHARSET;?>', discuz_uid = '<?php echo $_G['uid'];?>', cookiepre = '<?php echo $_G['config']['cookie']['cookiepre'];?>', cookiedomain = '<?php echo $_G['config']['cookie']['cookiedomain'];?>', cookiepath = '<?php echo $_G['config']['cookie']['cookiepath'];?>', showusercard = '<?php echo $_G['setting']['showusercard'];?>', attackevasive = '<?php echo $_G['config']['security']['attackevasive'];?>', disallowfloat = '<?php echo $_G['setting']['disallowfloat'];?>', creditnotice = '<?php if($_G['setting']['creditnotice']) { ?><?php echo $_G['setting']['creditnames'];?><?php } ?>', defaultstyle = '<?php echo $_G['style']['defaultextstyle'];?>', REPORTURL = '<?php echo $_G['currenturl_encode'];?>', SITEURL = '<?php echo $_G['siteurl'];?>', JSPATH = '<?php echo $_G['setting']['jspath'];?>';</script>
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
<a href="home.php?mod=spacecp">设置</a> <em>&rsaquo;</em><?php if($actives['profile']) { ?>
个人资料
<?php } elseif($actives['verify']) { ?>
认证
<?php } elseif($actives['avatar']) { ?>
修改头像
<?php } elseif($actives['credit']) { ?>
积分
<?php } elseif($actives['usergroup']) { ?>
用户组
<?php } elseif($actives['privacy']) { ?>
隐私筛选
<?php } elseif($actives['sendmail']) { ?>
邮件提醒
<?php } elseif($actives['password']) { ?>
密码安全
<?php } elseif($actives['promotion']) { ?>
访问推广
<?php } elseif($actives['plugin']) { ?>
<?php echo $_G['setting']['plugins'][$pluginkey][$_GET['id']]['name'];?>
<?php } ?></div>
</div>
<div id="ct" class="ct2_a wp cl">
<div class="mn">
<div class="bm bw0">
<h1 class="mt"><?php if($actives['profile']) { ?>
个人资料
<?php } elseif($actives['verify']) { ?>
认证
<?php } elseif($actives['avatar']) { ?>
修改头像
<?php } elseif($actives['credit']) { ?>
积分
<?php } elseif($actives['usergroup']) { ?>
用户组
<?php } elseif($actives['privacy']) { ?>
隐私筛选
<?php } elseif($actives['sendmail']) { ?>
邮件提醒
<?php } elseif($actives['password']) { ?>
密码安全
<?php } elseif($actives['promotion']) { ?>
访问推广
<?php } elseif($actives['plugin']) { ?>
<?php echo $_G['setting']['plugins'][$pluginkey][$_GET['id']]['name'];?>
<?php } ?></h1>
<!--don't close the div here--><?php if(!empty($_G['setting']['pluginhooks']['spacecp_credit_top'])) echo $_G['setting']['pluginhooks']['spacecp_credit_top'];?><ul class="tb cl">
<li <?php echo $opactives['base'];?>><a href="home.php?mod=spacecp&amp;ac=credit&amp;op=base">我的积分</a></li>
<?php if($_G['setting']['ec_ratio'] && ($_G['setting']['ec_account'] || $_G['setting']['ec_tenpay_opentrans_chnid'] || $_G['setting']['ec_tenpay_bargainor']) || $_G['setting']['card']['open']) { ?>
<li <?php echo $opactives['buy'];?>><a href="home.php?mod=spacecp&amp;ac=credit&amp;op=buy">充值</a></li>
<?php } if($_G['setting']['transferstatus'] && $_G['group']['allowtransfer']) { ?>
<li <?php echo $opactives['transfer'];?>><a href="home.php?mod=spacecp&amp;ac=credit&amp;op=transfer">转帐</a></li>
<?php } if($_G['setting']['exchangestatus']) { ?>
<li <?php echo $opactives['exchange'];?>><a href="home.php?mod=spacecp&amp;ac=credit&amp;op=exchange">兑换</a></li>
<?php } ?>
<li <?php echo $opactives['log'];?>><a href="home.php?mod=spacecp&amp;ac=credit&amp;op=log">积分记录</a></li>
<li <?php echo $opactives['rule'];?>><a href="home.php?mod=spacecp&amp;ac=credit&amp;op=rule">积分规则</a></li>
<?php if(!empty($_G['setting']['plugins']['spacecp_credit'])) { if(is_array($_G['setting']['plugins']['spacecp_credit'])) foreach($_G['setting']['plugins']['spacecp_credit'] as $id => $module) { if(!$module['adminid'] || ($module['adminid'] && $_G['adminid'] > 0 && $module['adminid'] >= $_G['adminid'])) { ?><li<?php if($_GET['id'] == $id) { ?> class="a"<?php } ?>><a href="home.php?mod=spacecp&amp;ac=plugin&amp;op=credit&amp;id=<?php echo $id;?>"><?php echo $module['name'];?></a></li><?php } } } if($op == 'rule') { ?>
<li class="y">
<select onchange="location.href='home.php?mod=spacecp&ac=credit&op=rule&fid='+this.value"><option value="">全局规则</option><?php echo $select;?></select>
</li>
<?php } ?>
</ul><p class="tbmu bw0">
<a<?php if($_GET['suboperation'] != 'creditrulelog') { ?> class="a"<?php } ?> href="home.php?mod=spacecp&amp;ac=credit&amp;op=log" hidefocus="true">积分收益</a><span class="pipe">|</span>
<a<?php if($_GET['suboperation'] == 'creditrulelog') { ?> class="a"<?php } ?> href="home.php?mod=spacecp&amp;ac=credit&amp;op=log&amp;suboperation=creditrulelog" hidefocus="true">系统奖励</a>

</p>
<?php if($_GET['suboperation'] != 'creditrulelog') { ?>
<script src="<?php echo $_G['setting']['jspath'];?>calendar.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<form method="post" action="home.php?mod=spacecp&amp;ac=credit&amp;op=log">
<div class="exfm" style="margin-top: 0;">
<table cellspacing="0" cellpadding="0">
<tr>
<th>积分:</th>
<td>
<span class="ftid">
<select id="exttype" name="exttype" class="ps" width="168">
<option value="0">不限</option><?php if(is_array($_G['setting']['extcredits'])) foreach($_G['setting']['extcredits'] as $id => $credit) { ?><option value="<?php echo $id;?>"<?php if($_GET['exttype']==$id) { ?> selected="selected"<?php } ?>><?php echo $credit['title'];?></option>
<?php } ?>
</select>
</span>
</td>
<th>时间范围:</th>
<td>
<input type="text" name="starttime" class="px" size="11" value="<?php echo $_GET['starttime'];?>" onclick="showcalendar(event, this)" readonly="readonly" /> 至 <input type="text" name="endtime" class="px" size="11" value="<?php echo $_GET['endtime'];?>" readonly="readonly" onclick="showcalendar(event, this)" />
</td>
</tr>
<tr>
<th>收支:</th>
<td>
<span class="ftid">
<select id="income" name="income" class="ps" width="168">
<option value="0"<?php echo $incomeactives['0'];?>>不限</option>
<option value="-1"<?php echo $incomeactives['-1'];?>>支出</option>
<option value="1"<?php echo $incomeactives['1'];?>>收入</option>
</select>
</span>
</td>
<th>操作:</th>
<td><span class="ftid"><?php echo $optypehtml;?></span></td>
</tr>
<tr>
<th>&nbsp;</th>
<td><button type="submit" class="pn" name="search" value="true"><strong>查询</strong></button></td>
</tr>
</table>
<script type="text/javascript">
simulateSelect('exttype');
simulateSelect('income');
simulateSelect('optype');
</script>
</div>
<table summary="主题付费" cellspacing="0" cellpadding="0" class="dt">
<tr>
<th width="80">操作</th>
<th width="80">积分变更</th>
<th>详情</th>
<th width="100">变更时间</th>
</tr><?php if(is_array($loglist)) foreach($loglist as $value) { ?><?php $value = makecreditlog($value, $otherinfo);?><tr>
<td><a href="home.php?mod=spacecp&amp;ac=credit&amp;op=log&amp;optype=<?php echo $value['operation'];?>"><?php echo $value['optype'];?></a></td>
<td><?php echo $value['credit'];?></td>
<td><?php echo $value['opinfo'];?></td>
<td><?php echo $value['dateline'];?></td>
</tr>
<?php } ?>
</table>
<input type="hidden" name="op" value="log" />
<input type="hidden" name="ac" value="credit" />
<input type="hidden" name="mod" value="spacecp" />
</form>
<?php } elseif($_GET['suboperation'] == 'creditrulelog') { ?>
<table summary="积分获得历史" cellspacing="0" cellpadding="0" class="dt">
<tr>
<th class="xw1" width="80">动作名称</th>
<th class="xw1" width="60">总次数</th>
<th class="xw1" width="60">周期次数</th><?php if(is_array($_G['setting']['extcredits'])) foreach($_G['setting']['extcredits'] as $key => $value) { ?><th class="xw1"><?php echo $value['title'];?></th>
<?php } ?>
<th class="xw1" width="100">最后奖励时间</th>
</tr><?php $i = 0;?><?php if(is_array($list)) foreach($list as $key => $log) { ?><?php $i++;?><tr<?php if($i % 2 == 0) { ?> class="alt"<?php } ?>>
<td><a href="home.php?mod=spacecp&amp;ac=credit&amp;op=rule&amp;rid=<?php echo $log['rid'];?>"><?php echo $log['rulename'];?></a></td>
<td><?php echo $log['total'];?></td>
<td><?php echo $log['cyclenum'];?></td><?php if(is_array($_G['setting']['extcredits'])) foreach($_G['setting']['extcredits'] as $key => $value) { ?><?php $creditkey = 'extcredits'.$key;?><td><?php echo $log[$creditkey];?></td>
<?php } ?>
<td><?php echo dgmdate($log[dateline], 'Y-m-d H:i');?></td>
</tr>
<?php } ?>
</table>
<?php } if($multi) { ?><div class="pgs cl mtm"><?php echo $multi;?></div><?php } ?>
<?php if(!empty($_G['setting']['pluginhooks']['spacecp_credit_bottom'])) echo $_G['setting']['pluginhooks']['spacecp_credit_bottom'];?>
</div>
</div>
<div class="appl"><div class="tbn">
<h2 class="mt bbda">设置</h2>
<ul>
<li<?php echo $actives['avatar'];?>><a href="home.php?mod=spacecp&amp;ac=avatar">修改头像</a></li>
<li<?php echo $actives['profile'];?>><a href="home.php?mod=spacecp&amp;ac=profile">个人资料</a></li>
<?php if($_G['setting']['verify']['enabled'] && allowverify() || $_G['setting']['my_app_status'] && $_G['setting']['videophoto']) { ?>
<li<?php echo $actives['verify'];?>><a href="<?php if($_G['setting']['verify']['enabled']) { ?>home.php?mod=spacecp&ac=profile&op=verify<?php } else { ?>home.php?mod=spacecp&ac=videophoto<?php } ?>">认证</a></li>
<?php } ?>
<li<?php echo $actives['credit'];?>><a href="home.php?mod=spacecp&amp;ac=credit">积分</a></li>
<li<?php echo $actives['usergroup'];?>><a href="home.php?mod=spacecp&amp;ac=usergroup">用户组</a></li>
<li<?php echo $actives['privacy'];?>><a href="home.php?mod=spacecp&amp;ac=privacy">隐私筛选</a></li>

<?php if($_G['setting']['sendmailday']) { ?><li<?php echo $actives['sendmail'];?>><a href="home.php?mod=spacecp&amp;ac=sendmail">邮件提醒</a></li><?php } ?>
<li<?php echo $actives['password'];?>><a href="home.php?mod=spacecp&amp;ac=profile&amp;op=password">密码安全</a></li>

<?php if($_G['setting']['creditspolicy']['promotion_visit'] || $_G['setting']['creditspolicy']['promotion_register']) { ?>
<li<?php echo $actives['promotion'];?>><a href="home.php?mod=spacecp&amp;ac=promotion">访问推广</a></li>
<?php } if(!empty($_G['setting']['plugins']['spacecp'])) { if(is_array($_G['setting']['plugins']['spacecp'])) foreach($_G['setting']['plugins']['spacecp'] as $id => $module) { if(!$module['adminid'] || ($module['adminid'] && $_G['adminid'] > 0 && $module['adminid'] >= $_G['adminid'])) { ?><li<?php if($_GET['id'] == $id) { ?> class="a"<?php } ?>><a href="home.php?mod=spacecp&amp;ac=plugin&amp;id=<?php echo $id;?>"><?php echo $module['name'];?></a></li><?php } } } ?>
</ul>
</div></div>
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