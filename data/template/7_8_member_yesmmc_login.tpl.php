<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
<link href="http://www.worldmall.cn/themes/mall/red2/styles/default/css/bbscommon.css" rel="stylesheet" type="text/css" />
<link href="http://www.worldmall.cn/themes/mall/red2/styles/default/css/bbsheader.css" rel="stylesheet" type="text/css" />
<script LANGUAGE="JavaScript">
var search_isclick=0;
function keyword_onclick(obj_this)
{				
if(search_isclick==0)
obj_this.value='';
search_isclick++;

}

</script>
    <!--bbs我的信息块开始-->
      <div class="wp" style="position:relative;z-index:10000;">
<div id="mys" style="display: none; right:175px;top: 34px;">
<div class="mysn">
<div class="mysnb">
<div class="ums">
<div class="avt"><div class="avt y"><a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>"><?php echo avatar($_G[uid],small);?></a></div></a></div>
<div class="nam">
<strong class="vwmy<?php if($_G['setting']['connect']['allow'] && $_G['member']['conisbind']) { ?> qq<?php } ?>"><a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>" target="_blank" title="访问我的空间"><?php echo $_G['member']['username'];?></a></strong>
<p class="j"><a href="home.php?mod=spacecp&amp;ac=usergroup"<?php if($upgradecredit !== 'false') { ?> id="g_upmine" )"<?php } ?>><?php echo $_G['group']['grouptitle'];?></a></p>
<p class="j">查看<a href="home.php?mod=spacecp&amp;ac=credit&amp;showcredit=1" id="extcreditmenu"<?php if(!$_G['setting']['bbclosed']) { ?> onmouseover="delayShow(this, showCreditmenu);" <?php } ?>>积分: <?php echo $_G['member']['credits'];?></a></p>
</div>
</div>
<div class="ums2">
<?php if($_G['group']['allowinvisible']) { ?>
<span id="loginstatus">
<a id="loginstatusid" href="member.php?mod=switchstatus" title="切换在线状态" onClick="ajaxget(this.href, 'loginstatus');return false;" class="xi2"></a>
</span>
<?php } ?>
<a href="home.php?mod=spacecp">设置</a>
<a href="home.php?mod=space&amp;do=pm" id="pm_ntc"<?php if($_G['member']['newpm']) { ?> class="new"<?php } ?>>消息</a>
<a href="home.php?mod=space&amp;do=notice" id="myprompt"<?php if($_G['member']['newprompt']) { ?> class="new"<?php } ?>>提醒<?php if($_G['member']['newprompt']) { ?>(<?php echo $_G['member']['newprompt'];?>)<?php } ?></a><span id="myprompt_check"></span>
<?php if($_G['setting']['taskon'] && !empty($_G['cookie']['taskdoing_'.$_G['uid']])) { ?><a href="home.php?mod=task&amp;item=doing" id="task_ntc" class="new">进行中的任务</a><?php } if(($_G['group']['allowmanagearticle'] || $_G['group']['allowpostarticle'] || $_G['group']['allowdiy'] || getstatus($_G['member']['allowadmincp'], 4) || getstatus($_G['member']['allowadmincp'], 2) || getstatus($_G['member']['allowadmincp'], 3))) { ?>
<a href="portal.php?mod=portalcp"><?php if($_G['setting']['portalstatus'] ) { ?>门户管理<?php } else { ?>模块管理<?php } ?></a>
<?php } if($_G['uid'] && $_G['group']['radminid'] > 1) { ?>
<a href="forum.php?mod=modcp&amp;fid=<?php echo $_G['fid'];?>" target="_blank"><?php echo $_G['setting']['navs']['2']['navname'];?>管理</a>
<?php } if($_G['uid'] && getstatus($_G['member']['allowadmincp'], 1)) { ?>
<a href="admin.php" target="_blank">管理中心</a>
<a href="javascript:openDiy();" title="打开 DIY 面板">DIY面板</a>

<?php } ?>

<?php if(!empty($_G['setting']['pluginhooks']['global_usernav_extra2'])) echo $_G['setting']['pluginhooks']['global_usernav_extra2'];?>
<a href="member.php?mod=logging&amp;action=logout&amp;formhash=<?php echo FORMHASH;?>" class="lot" >退出</a>
</div>
<div class="adm"></div>
<div class="ums3"><?php if(is_array($_G['setting']['mynavs'])) foreach($_G['setting']['mynavs'] as $nav) { if($nav['available'] && (!$nav['level'] || ($nav['level'] == 1 && $_G['uid']) || ($nav['level'] == 2 && $_G['adminid'] > 0) || ($nav['level'] == 3 && $_G['adminid'] == 1))) { ?>
<?php echo $nav['code'];?>
<?php } } ?>
</div>
</div>
</div>
</div>  
</div>
<!--bbs我的信息块结束-->
<div class="site_nav">
    <div class="main">
      <div class="fl navLogin">
         
        <form method="post" id="index_login_form" action="index.php?app=member&amp;act=login">
        <label>用户名：<input name="user_name" type="text" /></label>
    <label>密码：<input type="password" name="password" /></label>
    <input type="hidden" name="ret_url" ectype="head_ret_url" value="" size="12" />
    <input type="submit" value="登录" class="login"  />
    <a ectype="dialog" dialog_id='login' dialog_width="870" uri="index.php?app=member&amp;act=ajaxLogin&amp;ajax=1" href="javascript:;" class="register">免费注册</a>
    <a  title="通过QQ帐号登录世界窗"  href="index.php?app=member&amp;act=login&amp;qq=true"><img src="http://www.worldmall.cn/themes/mall/red2/styles/default/images/qq.png" alt="QQ" />登录</a>
    <a title="通过新浪微博帐号登录世界窗" href="index.php?app=member&amp;act=login&amp;sina=true"><img src="http://www.worldmall.cn/themes/mall/red2/styles/default/images/sina.png" alt="新浪" />登录</a>
        </form>
     
        
        <!--您好，欢迎来到世界窗！查看批发价请<a href="#" class="cred">[请登录]</a><a href="#" class="cred">[免费注册]</a>--> 
      </div>
    <div class="fr shortcut">
      <a href="index.php?app=member&amp;act=go_buyer">我是买家</a>|
        <a href="index.php?app=apply" title="申请开店">我要开店</a>|
            <a href="index.php?app=article&amp;code=help">帮助中心</a>|
            <a href="javascript:;" onclick="addtofavorite();">收藏本站</a>|
        <strong>世界窗批发热线：020-86378968</strong>
      </div>
    </div>
  </div>
  <div id="header">

  <div class="main">
    <a id="logo" href="http://www.worldmall.cn"><h1 class="hide">世界窗在线皮具批发市场</h1></a>
    <div class="nav">
      <ul>
        <li><a href="http://www.worldmall.cn" class="current" >首页</a></li>
                <li><a class="hover" href="index.php?app=search&amp;goods_grade=0&amp;order=add_time desc">所有款式</a></li>
                <li><a class="hover" href="/search/products/new">网代专区</a></li>
                <li><a class="hover" href="/brand">品牌区</a></li>
                <li><a class="hover" href="http://bbs.worldmall.cn">同窗社区</a></li>
                
      </ul>
    </div>
  <!--<div class="attention"><wb:follow-button uid="2095506602" type="red_2" width="136" height="24" ></wb:follow-button></div> -->
  </div>
   
<div class="mall_search">
  <div class="main">
  <form action="index.php" method="get" class="search_main">
        <div class="search_type">
    <ul class="pitch_up">
    <li>商品<i></i></li>
    </ul>
    <ul class="toselect" style="display:none;">
    <li class="curr"><a val="search">商品</a></li>
    <li ><a val="brand">品牌</a></li>
    </ul>
        <input type="hidden" id="act" name="act" value="index" />
    </div>
        <input name="keyword" type="text" value="请输入关键词" />
        <!--<input id="act" name="act" value="groupbuy" type="hidden">
                <input id="act" name="act" value="store" type="hidden">-->
        <input type="hidden" id="app" name="app" value="search"/>
        <input type="hidden" id="order" name="order" value="sales desc" />
        <button>搜索</button>
    </form>
        <div class="hotwords">热门搜索： 
           
          <a href="index.php?app=search&amp;keyword=宾利">宾利</a>| 
           
          <a href="index.php?app=search&amp;keyword=时尚">时尚</a>| 
           
          <a href="index.php?app=search&amp;keyword=真皮">真皮</a> 
           
        </div>
        <div class="mymall">
        <div class="user">
          <a class="menu_hd user_hd" href="index.php?app=member">用户中心<i></i></a>
          <div class="mymall_bd" style="display: none; ">
            <div class="hd"><b>用户名</b><a href="#">世界窗首页</a></div>
            <div class="bd">
              <ul>
                                              <li><a href="index.php?app=my_question">咨询回复</a></li>
                <li><a href="index.php?app=my_favorite">我收藏的商品</a></li>
                <li><a href="index.php?app=buyer_order&amp;type=pending">未付款的订单</a></li>
                <li><a href="index.php?app=buyer_order&amp;type=finished">历史订单</a></li>
                <li><a href="index.php?app=my_address">我的地址</a></li>
                
                <!--<li><a href="javascript:;">我的积分（）</a></li> -->
                
                <li><a href="index.php?app=recharge">我的账户</a></li>
                <li><a href="index.php?app=my_comment">待评价的商品</a></li>
                              </ul>
            </div>
          </div>
        </div>
        <div class="mycart">
          <a class="menu_hd mycart_hd" href="index.php?app=cart">去购物车结算<i></i></a>         
          <div class="mymall_bd" style="display: none; ">
          <div class="no-goods">购物车中还没有商品，赶紧选购吧!</div>
          </div>
        </div>
        </div>
    </div>
  </div>
</div>
 <div id="head">
<div id="head_b" style="background: repeat-x 0 bottom;border-top:1px;height: 37px;">
<div class="head_b">
<div class="mu_a">
<?php if($_G['setting']['subnavs']) { if(is_array($_G['setting']['subnavs'])) foreach($_G['setting']['subnavs'] as $navid => $subnav) { if($_G['setting']['navsubhover'] || $mnid == $navid) { ?>
<ul class="cl <?php if($mnid == $navid) { ?>current<?php } ?>" id="snav_<?php echo $navid;?>" style="display:<?php if($mnid != $navid) { ?>none<?php } ?>">
<?php echo $subnav;?>
</ul>
<?php } } } ?>
</div>

<div class="r">
<div id="scs" class="cl" onClick="showMenu({'ctrlid':'scs','ctrlclass':'a','duration':2})">
<form id="scbar_form" method="post" autocomplete="off" onsubmit="searchFocus($(&#39;scbar_txt&#39;))" action="search.php?searchsubmit=yes" target="_blank">
<input type="hidden" name="mod" id="scbar_mod" value="forum">
<input type="hidden" name="formhash" value="ecae1a97">
<input type="hidden" name="srchtype" value="title">
<input type="hidden" name="srhfid" value="">
<input type="hidden" name="srhlocality" value="forum::index">			
        <table cellspacing="0" cellpadding="0">
<tbody><tr>
                   
<td><input type="text" name="srchtxt" id="scbar_txt" class="px pxsr xg1" value="请输入搜索内容" autocomplete="off"></td>
 <td><button type="submit" name="searchsubmit" id="scbar_btn" value="true" class="xw1 hsea"> </button></td>
</tr>
                
</tbody></table>
 
</form>
 
 
</div>
    <div id="scs_menu" style="display: none;" class="scspy">
 
<div id="scs_t">
<div class="scs_t">
<a href="javascript:;" id="scbar_type" class="px pxxl">帖子</a>
<ul id="scbar_type_menu" class="sx"><li><a href="javascript:;" rel="forum" class="curtype">帖子</a></li><li><a href="javascript:;" rel="user">用户</a></li></ul>
<script type="text/javascript"> 
initSearchmenu('scbar');
</script>
</div>
<?php if($_G['setting']['srchhotkeywords']) { ?>
<strong class="xw1 cl"><span><a href="search.php?mod=forum&amp;adv=yes" target="_blank">高级搜索</a></span>热搜</strong><?php if(is_array($_G['setting']['srchhotkeywords'])) foreach($_G['setting']['srchhotkeywords'] as $val) { if($val=trim($val)) { ?><?php $valenc=rawurlencode($val);?><?php
$__FORMHASH = FORMHASH;$srchhotkeywords[] = <<<EOF
<a href="search.php?mod=forum&amp;srchtxt={$valenc}&amp;formhash={$__FORMHASH}&amp;searchsubmit=true&amp;source=hotsearch" target="_blank" class="xi2">{$val}</a>
EOF;
?>
<?php } } echo implode('', $srchhotkeywords);; } ?>
</div>
 
 
</div>
 
 
</div>
 
 
</div>
</div>
</div>

    <div id="nv_e">
<?php if(!empty($_G['setting']['plugins']['jsmenu'])) { ?>
<ul class="p_pop h_pop" id="plugin_menu" style="display: none"><?php if(is_array($_G['setting']['plugins']['jsmenu'])) foreach($_G['setting']['plugins']['jsmenu'] as $module) { ?> <?php if(!$module['adminid'] || ($module['adminid'] && $_G['adminid'] > 0 && $module['adminid'] >= $_G['adminid'])) { ?>
 <li><?php echo $module['url'];?></li>
 <?php } } ?>
</ul>
<?php } ?>
<?php echo $_G['setting']['menunavs'];?>
 
</div>
</div>
<?php if(!IS_ROBOT) { if($_G['uid'] && !empty($_G['style']['extstyle'])) { ?>
<div id="sslct_menu" class="cl p_pop" style="display: none;">
<?php if(!$_G['style']['defaultextstyle']) { ?><span class="sslct_btn" onclick="extstyle('')" title="默认"><i></i></span><?php } if(is_array($_G['style']['extstyle'])) foreach($_G['style']['extstyle'] as $extstyle) { ?><span class="sslct_btn" onclick="extstyle('<?php echo $extstyle['0'];?>')" title="<?php echo $extstyle['1'];?>"><i style='background:<?php echo $extstyle['2'];?>'></i></span>
<?php } ?>
</div>
<?php } ?>
 
<?php } ?>
 
                </div>