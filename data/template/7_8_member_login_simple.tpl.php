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

  	
 
<script language="javascript"> 
jq(function(){
   jq("#yesmmclogin").toggle(function(){
        jq("#login").parent("div").animate({ height : 85 } , 520 );
jq("#login").animate({marginTop : 0 } , 500 );
jq(this).blur();
   },function(){
    jq("#login").parent("div").animate({ height : 0 } , 500 );
jq("#login").animate({marginTop : -85 } , 520 ); 
jq(this).blur();
   });
   jq("#closeLogin").click(function(){
        jq("#login").parent("div").animate({ height : 0 } , 500 );
jq("#login").animate({marginTop : -85 } , 520 ); 
   });
})
</script>

 
