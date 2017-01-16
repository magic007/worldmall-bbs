<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('spacecp_credit_base');
0
|| checktplrefresh('./template/yesmmc_N3BSK2vfZ0FtHwIb/home/spacecp_credit_base.htm', './template/yesmmc_N3BSK2vfZ0FtHwIb/common/header.htm', 1383879510, '8', './data/template/7_8_home_spacecp_credit_base.tpl.php', './template/yesmmc_N3BSK2vfZ0FtHwIb', 'home/spacecp_credit_base')
|| checktplrefresh('./template/yesmmc_N3BSK2vfZ0FtHwIb/home/spacecp_credit_base.htm', './template/yesmmc_N3BSK2vfZ0FtHwIb/home/spacecp_header.htm', 1383879510, '8', './data/template/7_8_home_spacecp_credit_base.tpl.php', './template/yesmmc_N3BSK2vfZ0FtHwIb', 'home/spacecp_credit_base')
|| checktplrefresh('./template/yesmmc_N3BSK2vfZ0FtHwIb/home/spacecp_credit_base.htm', './template/yesmmc_N3BSK2vfZ0FtHwIb/home/spacecp_credit_header.htm', 1383879510, '8', './data/template/7_8_home_spacecp_credit_base.tpl.php', './template/yesmmc_N3BSK2vfZ0FtHwIb', 'home/spacecp_credit_base')
|| checktplrefresh('./template/yesmmc_N3BSK2vfZ0FtHwIb/home/spacecp_credit_base.htm', './template/yesmmc_N3BSK2vfZ0FtHwIb/common/seccheck.htm', 1383879510, '8', './data/template/7_8_home_spacecp_credit_base.tpl.php', './template/yesmmc_N3BSK2vfZ0FtHwIb', 'home/spacecp_credit_base')
|| checktplrefresh('./template/yesmmc_N3BSK2vfZ0FtHwIb/home/spacecp_credit_base.htm', './template/yesmmc_N3BSK2vfZ0FtHwIb/home/spacecp_footer.htm', 1383879510, '8', './data/template/7_8_home_spacecp_credit_base.tpl.php', './template/yesmmc_N3BSK2vfZ0FtHwIb', 'home/spacecp_credit_base')
|| checktplrefresh('./template/yesmmc_N3BSK2vfZ0FtHwIb/home/spacecp_credit_base.htm', './template/yesmmc_N3BSK2vfZ0FtHwIb/common/footer.htm', 1383879510, '8', './data/template/7_8_home_spacecp_credit_base.tpl.php', './template/yesmmc_N3BSK2vfZ0FtHwIb', 'home/spacecp_credit_base')
|| checktplrefresh('./template/yesmmc_N3BSK2vfZ0FtHwIb/home/spacecp_credit_base.htm', './template/yesmmc_N3BSK2vfZ0FtHwIb/common/header_common.htm', 1383879510, '8', './data/template/7_8_home_spacecp_credit_base.tpl.php', './template/yesmmc_N3BSK2vfZ0FtHwIb', 'home/spacecp_credit_base')
|| checktplrefresh('./template/yesmmc_N3BSK2vfZ0FtHwIb/home/spacecp_credit_base.htm', './template/yesmmc_N3BSK2vfZ0FtHwIb/home/spacecp_header_name.htm', 1383879510, '8', './data/template/7_8_home_spacecp_credit_base.tpl.php', './template/yesmmc_N3BSK2vfZ0FtHwIb', 'home/spacecp_credit_base')
|| checktplrefresh('./template/yesmmc_N3BSK2vfZ0FtHwIb/home/spacecp_credit_base.htm', './template/yesmmc_N3BSK2vfZ0FtHwIb/home/spacecp_header_name.htm', 1383879510, '8', './data/template/7_8_home_spacecp_credit_base.tpl.php', './template/yesmmc_N3BSK2vfZ0FtHwIb', 'home/spacecp_credit_base')
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
</ul><?php if(in_array($_GET['op'], array('base', 'buy', 'transfer', 'exchange'))) { ?>
<ul class="creditl mtm bbda cl"><?php $creditid=0;?><?php if($_GET['op'] == 'base' && $_G['setting']['creditstrans']) { ?><?php $creditid=$_G['setting']['creditstrans'];?><?php if($_G['setting']['extcredits'][$creditid]) { ?><?php $credit=$_G['setting']['extcredits'][$creditid];?><li class="xi1 cl"><em><?php if($credit['img']) { ?> <?php echo $credit['img'];?><?php } ?> <?php echo $credit['title'];?>: </em><?php echo getuserprofile('extcredits'.$creditid);; ?> <?php echo $credit['unit'];?> &nbsp; <?php if(($_G['setting']['ec_ratio'] && ($_G['setting']['ec_tenpay_opentrans_chnid'] || $_G['setting']['ec_tenpay_bargainor'] || $_G['setting']['ec_account'])) || $_G['setting']['card']['open']) { ?><a href="home.php?mod=spacecp&amp;ac=credit&amp;op=buy" class="xi2">立即充值&raquo;</a><?php } ?></li>
<?php } } if(is_array($_G['setting']['extcredits'])) foreach($_G['setting']['extcredits'] as $id => $credit) { if($id!=$creditid) { ?>
<li><em><?php if($credit['img']) { ?> <?php echo $credit['img'];?><?php } ?> <?php echo $credit['title'];?>: </em><?php echo getuserprofile('extcredits'.$id);; ?> <?php echo $credit['unit'];?></li>
<?php } } if($_GET['op'] == 'base') { ?>
<li class="cl"><em>积分: </em><?php echo $_G['member']['credits'];?> <span class="xg1">( <?php echo $creditsformulaexp;?> )</span></li>
<?php } ?>
<?php if(!empty($_G['setting']['pluginhooks']['spacecp_credit_extra'])) echo $_G['setting']['pluginhooks']['spacecp_credit_extra'];?>
</ul>
<?php } if($_GET['op'] == 'base') { ?>
<table summary="转账与兑换" cellspacing="0" cellpadding="0" class="dt mtm">
<caption>
<h2 class="mbm xs2">
<a href="home.php?mod=spacecp&amp;ac=credit&amp;op=log" class="xi2 xs1 xw0 y">查看更多&raquo;</a>积分记录
</h2>
</caption>
<tr>
<th width="80">操作</th>
<th width="80">积分变更</th>
<th>详情</th>
<th width="100">变更时间</th>
</tr>
<?php if($loglist) { if(is_array($loglist)) foreach($loglist as $value) { ?><?php $value = makecreditlog($value, $otherinfo);?><tr>
<td><a href="home.php?mod=spacecp&amp;ac=credit&amp;op=log&amp;optype=<?php echo $value['operation'];?>"><?php echo $value['optype'];?></a></td>
<td><?php echo $value['credit'];?></td>
<td><?php echo $value['opinfo'];?></td>
<td><?php echo $value['dateline'];?></td>
</tr>
<?php } } else { ?>
<tr><td colspan="4"><p class="emp">目前没有积分交易记录</p></td></tr>
<?php } ?>
</table>

<?php } elseif($_GET['op'] == 'buy') { if(($_G['setting']['ec_ratio'] && ($_G['setting']['ec_account'] || $_G['setting']['ec_tenpay_opentrans_chnid'] || $_G['setting']['ec_tenpay_bargainor'])) || $_G['setting']['card']['open']) { ?>
<form id="addfundsform" name="addfundsform" method="post" autocomplete="off" action="home.php?mod=spacecp&amp;ac=credit&amp;op=buy" onsubmit="ajaxpost(this.id, 'return_addfundsform');">
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<input type="hidden" name="addfundssubmit" value="true" />
<input type="hidden" name="handlekey" value="buycredit" />
<table cellspacing="0" cellpadding="0" class="tfm mtn">
<tr>
<th>支付方式</th>
<td colspan="2"><?php $ecchecked = 'checked="checked"';?><?php if($_G['setting']['ec_ratio'] && ($_G['setting']['ec_tenpay_bargainor'] || $_G['setting']['ec_tenpay_opentrans_chnid'])) { ?>
<label onclick="$('apitype_tenpay').checked=true;<?php if($_G['setting']['card']['open']) { ?>$('cardbox').style.display='none';if($('card_box_sec')){$('card_box_sec').style.display='none';}$('paybox').style.display='';<?php } ?>"><input name="apitype" type="radio" value="tenpay" id="apitype_tenpay" <?php echo $ecchecked;?> /><img title="财付通" alt="财付通" onclick="$('apitype_tenpay').checked=true" src="<?php echo STATICURL;?>image/common/tenpay_logo.gif" /></label><?php $ecchecked = '';?><?php } if($_G['setting']['ec_ratio'] && $_G['setting']['ec_account']) { ?>
<label onclick="$('apitype_alipay').checked=true;<?php if($_G['setting']['card']['open']) { ?>$('cardbox').style.display='none';if($('card_box_sec')){$('card_box_sec').style.display='none';}$('paybox').style.display='';<?php } ?>"><input name="apitype" type="radio" value="alipay" id="apitype_alipay" <?php echo $ecchecked;?> /><img title="支付宝" alt="支付宝" onclick="$('apitype_alipay').checked=true" src="<?php echo STATICURL;?>image/common/alipay_logo.gif" /></label><?php $ecchecked = '';?><?php } if($_G['setting']['card']['open']) { ?>
<label onclick="$('apitype_card').checked=true;$('cardbox').style.display='';if($('card_box_sec')){$('card_box_sec').style.display='';}$('paybox').style.display='none';"><input name="apitype" type="radio" value="card" id="apitype_card" <?php echo $ecchecked;?> /><span class="xs2">充值卡充值</span></label>
<?php } ?>
</td>
</tr>
<tr id="paybox" style="<?php if(($_G['setting']['ec_tenpay_bargainor'] || $_G['setting']['ec_tenpay_opentrans_chnid'] || $_G['setting']['ec_account']) && empty($ecchecked) ) { ?>display:;<?php } else { ?>display:none;<?php } ?>">
<th>充值</th>
<td class="pns">
<input type="text" size="5" class="px" style="width: auto;" id="addfundamount" name="addfundamount" value="0" onkeyup="addcalcredit()" />
&nbsp;<?php echo $_G['setting']['extcredits'][$_G['setting']['creditstrans']]['title'];?>&nbsp;
所需&nbsp;人民币 <span id="desamount">0</span> 元
</td>
<td width="300" class="d">
人民币现金 <strong>1</strong> 元 =  <strong><?php echo $_G['setting']['ec_ratio'];?></strong> <?php echo $_G['setting']['extcredits'][$_G['setting']['creditstrans']]['unit'];?><?php echo $_G['setting']['extcredits'][$_G['setting']['creditstrans']]['title'];?>
<?php if($_G['setting']['ec_mincredits']) { ?><br />单次最低充值  <strong><?php echo $_G['setting']['ec_mincredits'];?></strong> <?php echo $_G['setting']['extcredits'][$_G['setting']['creditstrans']]['unit'];?><?php echo $_G['setting']['extcredits'][$_G['setting']['creditstrans']]['title'];?><?php } if($_G['setting']['ec_maxcredits']) { ?><br />单次最高充值  <strong><?php echo $_G['setting']['ec_maxcredits'];?></strong> <?php echo $_G['setting']['extcredits'][$_G['setting']['creditstrans']]['unit'];?><?php echo $_G['setting']['extcredits'][$_G['setting']['creditstrans']]['title'];?><?php } if($_G['setting']['ec_maxcreditspermonth']) { ?><br />最近 30 天最高充值  <strong><?php echo $_G['setting']['ec_maxcreditspermonth'];?></strong> <?php echo $_G['setting']['extcredits'][$_G['setting']['creditstrans']]['unit'];?><?php echo $_G['setting']['extcredits'][$_G['setting']['creditstrans']]['title'];?><?php } ?>
</td>
</tr>
<?php if($_G['setting']['card']['open']) { ?>
<tr id="cardbox" style="<?php if($_G['setting']['card']['open'] && $ecchecked) { ?>display:;<?php } else { ?>display:none;<?php } ?>">
<th>充值卡</th>
<td colspan="2">
<input type="text" class="px" id="cardid" name="cardid" />
</td>
</tr>
<?php if($_G['setting']['seccodestatus'] & 16) { ?><?php
$sectpl = <<<EOF
<tr><th><sec></th><td colspan="2"><span id="sec<hash>" onclick="showMenu({'ctrlid':this.id,'win':'{$_GET['handlekey']}'})"><sec></span><div id="sec<hash>_menu" class="p_pop p_opt" style="display:none"><sec></div></td></tr>
EOF;
?>
<tbody id="card_box_sec" style="<?php if($_G['setting']['card']['open'] && $ecchecked) { ?>display:;<?php } else { ?>display:none;<?php } ?>"><?php $_G['sechashi'] = !empty($_G['cookie']['sechashi']) ? $_G['sechash'] + 1 : 0;
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
?><?php unset($secshow);?><?php if(empty($secreturn)) { ?><?php echo $seccheckhtml;?><?php } ?></tbody>
<?php } } ?>
<tr>
<th>&nbsp;</th>
<td colspan="2">
<button type="submit" name="addfundssubmit_btn" class="pn" id="addfundssubmit_btn" value="true"><em>充值</em></button>
</td>
</tr>

</table>
</form>
<span style="display: none" id="return_addfundsform"></span>
<script type="text/javascript">
function addcalcredit() {
var addfundamount = $('addfundamount').value.replace(/^0/, '');
var addfundamount = parseInt(addfundamount);
$('desamount').innerHTML = !isNaN(addfundamount) ? Math.ceil(((addfundamount / <?php echo $_G['setting']['ec_ratio'];?>) * 100)) / 100 : 0;
}
</script>
<?php } } elseif($_GET['op'] == 'transfer') { if($_G['setting']['transferstatus'] && $_G['group']['allowtransfer']) { ?>
<form id="transferform" name="transferform" method="post" autocomplete="off" action="home.php?mod=spacecp&amp;ac=credit&amp;op=transfer" onsubmit="ajaxpost(this.id, 'return_transfercredit');">
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<input type="hidden" name="transfersubmit" value="true" />
<input type="hidden" name="handlekey" value="transfercredit" />
<table cellspacing="0" cellpadding="0" class="tfm mtn">
<tr>
<th>转账</th>
<td class="pns">
<input type="text" name="transferamount" id="transferamount" class="px" size="5" style="width: auto;" value="0" />
&nbsp;<?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['9']]['title'];?>&nbsp;
给&nbsp;
<input type="text" name="to" id="to" class="px" size="15" style="width: auto;" />
</td>
<td width="300" class="d">
转账后最低余额 <?php echo $_G['setting']['transfermincredits'];?> <?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['9']]['unit'];?><br />
<?php if(intval($taxpercent) > 0) { ?>积分交易税 <?php echo $taxpercent;?><?php } ?>
</td>
</tr>
<tr>
<th><span class="rq">*</span>登录密码</th>
<td><input type="password" name="password" class="px" value="" /></td>
</tr>
<tr>
<th>转账留言</th>
<td><input type="text" name="transfermessage" class="px" size="40" /></td>
</tr>
<tr>
<th>&nbsp;</th>
<td colspan="2">
<button type="submit" name="transfersubmit_btn" id="transfersubmit_btn" class="pn" value="true"><em>转账</em></button>
<span style="display: none" id="return_transfercredit"></span>
</td>
</tr>
</table>
</form>
<?php } } elseif($_GET['op'] == 'exchange') { if($_G['setting']['exchangestatus'] && ($_G['setting']['extcredits'] || $_CACHE['creditsettings'])) { ?>
<form id="exchangeform" name="exchangeform" method="post" autocomplete="off" action="home.php?mod=spacecp&amp;ac=credit&amp;op=exchange&amp;handlekey=credit" onsubmit="showWindow('credit', 'exchangeform', 'post');">
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<input type="hidden" name="operation" value="exchange" />
<input type="hidden" name="exchangesubmit" value="true" />
<input type="hidden" name="outi" value="" />
<table cellspacing="0" cellpadding="0" class="tfm mtn">
<tr>
<th>兑换</th>
<td class="pns">
<input type="text" id="exchangeamount" name="exchangeamount" class="px" size="5" style="width: auto;" value="0" onkeyup="exchangecalcredit()" />
<select name="tocredits" id="tocredits" class="ps" onChange="exchangecalcredit()"><?php if(is_array($_G['setting']['extcredits'])) foreach($_G['setting']['extcredits'] as $id => $ecredits) { if($ecredits['allowexchangein'] && $ecredits['ratio']) { ?>
<option value="<?php echo $id;?>" unit="<?php echo $ecredits['unit'];?>" title="<?php echo $ecredits['title'];?>" ratio="<?php echo $ecredits['ratio'];?>"><?php echo $ecredits['title'];?></option>
<?php } } ?><?php $i=0;?><?php if(is_array($_CACHE['creditsettings'])) foreach($_CACHE['creditsettings'] as $id => $data) { ?><?php $i++;?><?php if($data['title']) { ?>
<option value="<?php echo $id;?>" outi="<?php echo $i;?>"><?php echo $data['title'];?></option>
<?php } } ?>
</select>
&nbsp;所需&nbsp;
<input type="text" id="exchangedesamount" class="px" size="5" style="width: auto;" value="0" disabled="disabled" />
<select name="fromcredits" id="fromcredits_0" class="ps" style="display: none" onChange="exchangecalcredit();"><?php if(is_array($_G['setting']['extcredits'])) foreach($_G['setting']['extcredits'] as $id => $credit) { if($credit['allowexchangeout'] && $credit['ratio']) { ?>
<option value="<?php echo $id;?>" unit="<?php echo $credit['unit'];?>" title="<?php echo $credit['title'];?>" ratio="<?php echo $credit['ratio'];?>"><?php echo $credit['title'];?></option>
<?php } } ?>
</select><?php $i=0;?><?php if(is_array($_CACHE['creditsettings'])) foreach($_CACHE['creditsettings'] as $id => $data) { ?><?php $i++;?><select name="fromcredits_<?php echo $i;?>" id="fromcredits_<?php echo $i;?>" class="ps" style="display: none" onChange="exchangecalcredit()"><?php if(is_array($data['creditsrc'])) foreach($data['creditsrc'] as $id => $ratio) { ?><option value="<?php echo $id;?>" unit="<?php echo $_G['setting']['extcredits'][$id]['unit'];?>" title="<?php echo $_G['setting']['extcredits'][$id]['title'];?>" ratiosrc="<?php echo $data['ratiosrc'][$id];?>" ratiodesc="<?php echo $data['ratiodesc'][$id];?>"><?php echo $_G['setting']['extcredits'][$id]['title'];?></option>
<?php } ?>
</select>
<?php } ?>
<script type="text/javascript">
var tocredits = $('tocredits');
var fromcredits = $('fromcredits_0');
if(fromcredits.length > 1 && tocredits.value == fromcredits.value) {
fromcredits.selectedIndex = tocredits.selectedIndex + 1;
}
</script>
</td>
<td width="300" class="d">
<?php if($_G['setting']['exchangemincredits']) { ?>
兑换后最低余额 <?php echo $_G['setting']['exchangemincredits'];?><br />
<?php } ?>
<span id="taxpercent">
<?php if(intval($taxpercent) > 0) { ?>
积分交易税 <?php echo $taxpercent;?>
<?php } ?>
</span>
</td>
</tr>
<tr>
<th><span class="rq">*</span>登录密码</th>
<td colspan="2"><input type="password" name="password" class="px" value="" size="20" /></td>
</tr>
<tr>
<th>&nbsp;</th>
<td colspan="2">
<button type="submit" name="exchangesubmit_btn" id="exchangesubmit_btn" class="pn" value="true" tabindex="2"><em>兑换</em></button>
</td>
</tr>
</table>
</form>
<script type="text/javascript">
function exchangecalcredit() {
with($('exchangeform')) {
tocredit = tocredits[tocredits.selectedIndex];
if(!tocredit) {
return;
}<?php $i=0;?><?php if(is_array($_CACHE['creditsettings'])) foreach($_CACHE['creditsettings'] as $id => $data) { ?><?php $i++;?>$('fromcredits_<?php echo $i;?>').style.display = 'none';
<?php } ?>
if(tocredit.getAttribute('outi')) {
outi.value = tocredit.getAttribute('outi');
fromcredit = $('fromcredits_' + tocredit.getAttribute('outi'));
$('taxpercent').style.display = $('fromcredits_0').style.display = 'none';
fromcredit.style.display = '';
fromcredit = fromcredit[fromcredit.selectedIndex];
$('exchangeamount').value = $('exchangeamount').value.toInt();
if($('exchangeamount').value != 0) {
$('exchangedesamount').value = Math.floor( fromcredit.getAttribute('ratiosrc') / fromcredit.getAttribute('ratiodesc') * $('exchangeamount').value);
} else {
$('exchangedesamount').value = '';
}
} else {
outi.value = 0;
$('taxpercent').style.display = $('fromcredits_0').style.display = '';
fromcredit = fromcredits[fromcredits.selectedIndex];
$('exchangeamount').value = $('exchangeamount').value.toInt();
if(fromcredit.getAttribute('title') != tocredit.getAttribute('title') && $('exchangeamount').value != 0) {
if(tocredit.getAttribute('ratio') < fromcredit.getAttribute('ratio')) {
$('exchangedesamount').value = Math.ceil( tocredit.getAttribute('ratio') / fromcredit.getAttribute('ratio') * $('exchangeamount').value * (1 + <?php echo $_G['setting']['creditstax'];?>));
} else {
$('exchangedesamount').value = Math.floor( tocredit.getAttribute('ratio') / fromcredit.getAttribute('ratio') * $('exchangeamount').value * (1 + <?php echo $_G['setting']['creditstax'];?>));
}
} else {
$('exchangedesamount').value = '';
}
}
}
}
String.prototype.toInt = function() {
var s = parseInt(this);
return isNaN(s) ? 0 : s;
}
exchangecalcredit();
</script>
<?php } } else { ?><?php $_TPL['cycletype'] = array(
'0' => '一次性',
'1' => '每天',
'2' => '整点',
'3' => '间隔分钟',
'4' => '不限周期'
);?><div class="tbmu bw0">
<p>进行以下事件动作，会得到积分奖励。不过，在一个周期内，您最多得到的奖励次数有限制 </p>
</div>
<table cellspacing="0" cellpadding="0" class="dt valt">
<tr>
<th class="xw1">动作名称</th>
<th class="xw1">周期范围</th>
<th class="xw1">周期内最多奖励次数</th><?php if(is_array($_G['setting']['extcredits'])) foreach($_G['setting']['extcredits'] as $key => $value) { ?><th class="xw1"><?php echo $value['title'];?></th>
<?php } ?>
</tr><?php $i = 0;?><?php if(is_array($list)) foreach($list as $key => $value) { ?><?php $i++;?><tr<?php if($i % 2 == 0) { ?> class="alt"<?php } ?>>
<td><?php echo $value['rulename'];?></td>
<td><?php echo $_TPL['cycletype'][$value['cycletype']];?></td>
<td><?php if($value['rewardnum']) { ?><?php echo $value['rewardnum'];?><?php } else { ?>不限次数<?php } ?></td><?php if(is_array($_G['setting']['extcredits'])) foreach($_G['setting']['extcredits'] as $key => $credit) { ?><?php $creditkey = 'extcredits'.$key;?><td><?php if($value[$creditkey] > 0) { ?>+<?php echo $value[$creditkey];?><?php } elseif($value[$creditkey] < 0) { ?><?php echo $value[$creditkey];?><?php } else { ?>0<?php } ?></td>
<?php } ?>
</tr>
<?php } ?>
</table>
<?php } ?>
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