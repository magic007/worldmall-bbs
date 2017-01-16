<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
<?php function tpl_cloudsearch_index_top($recwords, $searchparams, $srchotquery, $position = 'hotopicf') {
global $_G;
if($recwords) {
$recwords_tmp = $recwords;
$recwords = array();
foreach ($recwords_tmp as $k => $v) {
$recwords[$k+1] = $v;?><?php }?><?php }?><?php
$return = <<<EOF


EOF;
 if(is_array($recwords) && count($recwords) > 0 && !empty($searchparams['url'])) { 
$return .= <<<EOF

<div class="fl bm">
<div class="bm bmw hottopic cl">
<div class="bm_h cl">
<span class="y"></span>
<h2>
EOF;
 if($_G['fid']) { 
$return .= <<<EOF
æœ¬ç‰ˆ
EOF;
 } 
$return .= <<<EOF
çƒ­é—¨è¯é¢˜</h2>
</div>
<style>
.filter { padding: 10px; border-bottom: none; font-size: 12px; color: #999; }
.filter ul {}
.filter li { float: left; margin-right: 16px; height: 22px; line-height: 22px; white-space:nowrap; width:12.5%; }
.filter li a { margin-right: 2px; text-decoration: none; color: #369; }
.filter li.clewcolor a { background:url(source/plugin/cloudsearch/template/keyword_hot.gif) no-repeat 100% 2px; margin-right: 2px; text-decoration: none; color: #F00; padding-right:18px; }
.filter li a:hover { text-decoration: underline; }
.filter li a:visited { text-decoration: none; color: #666; }
.filter li.clewcolor a:visited { text-decoration: none; color: #F00; }
.filter .number { color: #666; } 
.filter li.clewcolor .number { color:#F00; }
</style>
<div class="filter">
<ul class="cl">
EOF;
 if(is_array($recwords)) foreach($recwords as $key => $recword) { if($encodeWord=rawurlencode(trim($recword['word']))) { if(empty($recword['inc_num'])) { 
$return .= <<<EOF

<li><a href="{$searchparams['url']}?q={$encodeWord}&source=word.{$position}.{$key}{$srchotquery}&num={$recword['result_num']}" sc="1" target="_blank">{$recword['word']}<span class="number">({$recword['result_num']})</span></a></li>

EOF;
 } else { 
$return .= <<<EOF

<li class="clewcolor"><a href="{$searchparams['url']}?q={$encodeWord}&source=word.{$position}.{$key}{$srchotquery}&num={$recword['result_num']}" sc="1"  target="_blank">{$recword['word']}<span class="number">({$recword['result_num']})</span></a></li>

EOF;
 } } } 
$return .= <<<EOF

</ul>
</div>
</div>
</div>

EOF;
 } 
$return .= <<<EOF



EOF;
?><?php return $return;?><?php }

function tpl_cloudsearch_global_footer_formula_output() {
global $_G;
$formHash = FORMHASH;
$cookie = $_G['cookie']['ffids' . $_G['uid']];?><?php
$return = <<<EOF


EOF;
 if(!$cookie) { 
$return .= <<<EOF

<script type="text/javascript">
_attachEvent(window, 'load', getForbiddenFormula, document);
function getForbiddenFormula() {
var toGetForbiddenFormulaFIds = function () {
ajaxget('plugin.php?id=cloudsearch&formhash={$formHash}');
};
var a = document.body.getElementsByTagName('a');
for(var i = 0;i < a.length;i++){
if(a[i].getAttribute('sc')) {
a[i].setAttribute('mid', hash(a[i].href));
a[i].onmousedown = function() {toGetForbiddenFormulaFIds();};
}
}
var btn = document.body.getElementsByTagName('button');
for(var i = 0;i < btn.length;i++){
if(btn[i].getAttribute('sc')) {
btn[i].setAttribute('mid', hash(btn[i].id));
btn[i].onmousedown = function() {toGetForbiddenFormulaFIds();};
}
}
}
</script>

EOF;
 } 
$return .= <<<EOF


EOF;
?><?php return $return;?><?php }

function tpl_cloudsearch_viewthread_modaction_output() {?><?php
$return = <<<EOF

<div id="relate_subject"></div>

EOF;
?><?php return $return;?><?php }

function tpl_cloudsearch_forumdisplay_threadtype_extra_output($recwords) {
global $_G;?><?php
$__IMGDIR = IMGDIR;$return = <<<EOF

<style>
.sort_ttp { padding-top: 0;margin-bottom:5px;}
.sort_tit { padding:4px 8px 3px 0; color:#999; }
.loadingCloud { text-align:center;line-height:50px; }
</style>
<script>
var currentKeyword = '';
var currentOrder = '';
function switchkeyword(keyword, order, page) {
page = page ? page : 1;
order = order ? order : '';
if (currentKeyword == keyword && order == '' && page == 1) {
window.location = 'forum.php?mod=forumdisplay&fid={$_G['fid']}';
return true;
}
if (currentKeyword != '') {
$("ckw_"+currentKeyword).className = '';
}
$("ckw_"+keyword).className = 'xw1 a';
currentKeyword = keyword;
currentOrder = order;
getclouddata(keyword, order, page);
}
function switchPage(page) {
getclouddata(currentKeyword, currentOrder, page);
}
function switchOrder(order) {
currentOrder = order;
getclouddata(currentKeyword, order, 1);
}
function getclouddata(keyword, order, page) {
$("threadlist").innerHTML = '<div class="loadingCloud"><img src="{$__IMGDIR}/loading.gif" alt="loading..." class="vm" /> æ­£åœ¨åŠ è½½â€¦â€¦</div>';
ajaxget('forum.php?mod=forumdisplay&fid={$_G['fid']}&cloudop=relatedthread&page='+page+'&of='+order+'&keyword='+keyword);
}
function succeedhandle_getRelatedData(url, msg, data) {
if(data['threaddiv']) { 
$("threadlist").innerHTML = data['threaddiv'];
$("fd_page_top").innerHTML = $("fd_page_bottom").innerHTML = data['page'];
}
}
function errorhandle_getRelatedData(msg, data) {
showError(msg);
}
</script>
<ul class="ttp cl" id="thread_types2" style="padding-top:0px;">
<li class="sort_tit">çƒ­é—¨è¯é¢˜</li>
EOF;
 if(is_array($recwords)) foreach($recwords as $keyword) { 
$return .= <<<EOF
<li id="ckw_{$keyword['0']}"><a href="javascript:void(0);return false;" onclick="switchkeyword('{$keyword['0']}');">{$keyword['0']}</a></li>

EOF;
 } 
$return .= <<<EOF

</ul>

EOF;
?><?php return $return;?><?php }

function tpl_cloudsearch_forumdisplay_threadtype_inner_output() {
global $_G;?><?php
$return = <<<EOF

<style>
.sort_tit { padding:4px 8px 3px 0; color:#999; }
</style>
<li class="sort_tit">ä¸»é¢˜åˆ†ç±»</li>

EOF;
?><?php return $return;?><?php }

function tpl_cloudsearch_collection_viewoptions_output() {
global $_G;?><?php
$return = <<<EOF

<a href="forum.php?mod=collection&amp;action=view&amp;ctid={$_G['collection']['ctid']}&amp;op=related" class="xi2">æœç´¢ç›¸å…³ä¸»é¢˜</a>
<span class="pipe">|</span>

EOF;
?><?php return $return;?><?php }

function tpl_cloudsearch_collection_relatedop_output($threadlist, $multipage) {
global $_G;?><?php
$__IMGDIR = IMGDIR;$__FORMHASH = FORMHASH;$return = <<<EOF


<ul class="ttp bm cl cttp">
<li
EOF;
 if(!$_GET['keyword']) { 
$return .= <<<EOF
 class="xw1 a"
EOF;
 } 
$return .= <<<EOF
>
<a href="forum.php?mod=collection&amp;action=view&amp;ctid={$_G['collection']['ctid']}&amp;op=related" class="xi2">{$_G['collection']['name']}</a>
</li>
EOF;
 if(is_array($_G['collection']['arraykeyword'])) foreach($_G['collection']['arraykeyword'] as $kid => $unique_keyword) { 
$return .= <<<EOF
<li
EOF;
 if($unique_keyword == $_GET['keyword']) { 
$return .= <<<EOF
 class="xw1 a"
EOF;
 } 
$return .= <<<EOF
>
<a href="forum.php?mod=collection&amp;action=view&amp;ctid={$_G['collection']['ctid']}&amp;op=related&amp;keyword={$_G['collection']['urlkeyword'][$kid]}" class="xi2">{$unique_keyword}</a>
</li>

EOF;
 } 
$return .= <<<EOF

</ul>
<div class="tl bm">

EOF;
 if($threadlist) { 
$return .= <<<EOF

<form action="forum.php?mod=collection&amp;action=edit&amp;op=addthread" method="POST">
<div class="th">
<table cellspacing="0" cellpadding="0">
<tr>
<td class="icn"></td>
<td class="o"><label class="z" onclick="checkall(this.form, 'tids')"><input class="pc" type="checkbox" name="chkall" title="!checkall!" /></label></td>
<td class="common">å¸–å­</td>
<td class="forum">ç‰ˆå—</td>
<td class="by">ä½œè€…</td>
</tr>
</table>
</div>

<div class="bm_c">
<table cellspacing="0" cellpadding="0">
EOF;
 if(is_array($threadlist)) foreach($threadlist as $thread) { 
$return .= <<<EOF
<tr>
<td class="icn">

EOF;
 if($thread['icon']) { 
$return .= <<<EOF

<img src="{$thread['icon']}" />

EOF;
 } else { 
$return .= <<<EOF

<img src="{$__IMGDIR}/folder_common.gif" />

EOF;
 } 
$return .= <<<EOF

</td>
<td class="o">

EOF;
 if(!isset($thread['icon'])) { 
$return .= <<<EOF

<input type="checkbox" value="{$thread['tThreadId']}" name="tids[]" />

EOF;
 } 
$return .= <<<EOF

</td>
<th>

EOF;
 if(!isset($thread['icon'])) { 
$return .= <<<EOF

<a href="forum.php?mod=viewthread&amp;tid={$thread['tThreadId']}" target="_blank" class="xst">{$thread['pSubject']}</a>

EOF;
 } else { 
$return .= <<<EOF

<a href="{$thread['mTargetUrl']}" target="_blank" class="xst">{$thread['mTitle']}</a>

EOF;
 } 
$return .= <<<EOF

</th>
<td class="forum">

EOF;
 if(!isset($thread['icon'])) { 
$return .= <<<EOF

<a href="forum.php?mod=forumdisplay&amp;fid={$thread['pForumId']}">{$thread['pForumName']}</a>

EOF;
 } else { 
$return .= <<<EOF

{$thread['mShowUrl']}

EOF;
 } 
$return .= <<<EOF

</td>
<td class="by">
<cite>

EOF;
 if($thread['pAuthorId'] && $thread['pAuthorName']) { 
$return .= <<<EOF

<a href="home.php?mod=space&amp;uid={$thread['pAuthorId']}">{$thread['pAuthorName']}</a>

EOF;
 } else { 
$return .= <<<EOF

åŒ¿å

EOF;
 } 
$return .= <<<EOF

</cite>

EOF;
 if(!isset($thread['icon'])) { 
$return .= <<<EOF

<em class="xi1">{$thread['dateline']}</em>

EOF;
 } 
$return .= <<<EOF

</td>
</tr>

EOF;
 } 
$return .= <<<EOF

</table>
</div>

<div class="bm_c cl">
<input type="hidden" value="{$_G['collection']['ctid']}" name="ctid" />
    <input type="hidden" name="formhash" id="formhash" value="{$__FORMHASH}" />
<input type="hidden" name="addthread" id="addthread" value="1" />
<button type="submit" class="pn pnc"><span>æ·»åŠ åˆ°æ·˜ä¸“è¾‘</span></button>
</div>
</form>

EOF;
 } else { 
$return .= <<<EOF

<p class="emp">
æš‚æ—¶è¿˜æ²¡æœ‰å†…å®¹
</p>

EOF;
 } 
$return .= <<<EOF

</div>

EOF;
 if($multipage) { 
$return .= <<<EOF
<div class="pgs mtm cl">{$multipage}</div>
EOF;
 } 
$return .= <<<EOF



EOF;
?><?php return $return;?><?php }

function tpl_cloudsearch_relate_threadlist_output($kw) {
global $_G;?><?php
$__IMGDIR = IMGDIR;$return = <<<EOF

<div id="cloudsearch_relate"><img src="{$__IMGDIR}/loading.gif" alt="loading..." class="vm" /> æ­£åœ¨åŠ è½½â€¦â€¦</div>
<script>
ajaxget('plugin.php?id=cloudsearch:forumdisplay&cloudop=relatelist&fid={$_G['fid']}&keyword={$kw}&page={$_G['page']}', 'cloudsearch_relate');
</script>

EOF;
?><?php return $return;?><?php }

function tpl_cloudsearch_relate_threadlist_js_output($relatethreadlist, $urlkw, $searchparams, $srchotquery) {
global $_G;?><?php
$__IMGDIR = IMGDIR;$return = <<<EOF


EOF;
 if($relatethreadlist) { 
$return .= <<<EOF

<div class="th">
<table cellspacing="0" cellpadding="0">
<tr>
<td class="icn"></td>
<td class="common">ç›¸å…³ä¸»é¢˜</td>
<td class="by">ç‰ˆå—</td>
<td class="by">ä½œè€…</td>
</tr>
</table>
</div>

<div class="bm_c">
<table cellspacing="0" cellpadding="0">
EOF;
 if(is_array($relatethreadlist)) foreach($relatethreadlist as $thread) { 
$return .= <<<EOF
<tbody id="{$thread['id']}">
<tr>
<td class="icn">

EOF;
 if($thread['icon']) { 
$return .= <<<EOF

<img src="{$thread['icon']}" />

EOF;
 } else { 
$return .= <<<EOF

<img src="{$__IMGDIR}/folder_common.gif" />

EOF;
 } 
$return .= <<<EOF

</td>
<th>

EOF;
 if(!isset($thread['icon'])) { 
$return .= <<<EOF

<a href="forum.php?mod=viewthread&amp;tid={$thread['tThreadId']}" target="_blank" class="xst">{$thread['pSubject']}</a>

EOF;
 } else { 
$return .= <<<EOF

<a href="{$thread['mTargetUrl']}" target="_blank" class="xst">{$thread['mTitle']}</a>

EOF;
 } 
$return .= <<<EOF

</th>
<td class="by">

EOF;
 if(!isset($thread['icon'])) { 
$return .= <<<EOF

<a href="forum.php?mod=forumdisplay&amp;fid={$thread['pForumId']}">{$thread['pForumName']}</a>

EOF;
 } else { 
$return .= <<<EOF

{$thread['mShowUrl']}

EOF;
 } 
$return .= <<<EOF

</td>
<td class="by">
<cite>

EOF;
 if($thread['pAuthorId'] && $thread['pAuthorName']) { 
$return .= <<<EOF

<a href="home.php?mod=space&amp;uid={$thread['pAuthorId']}">{$thread['pAuthorName']}</a>

EOF;
 } else { 
$return .= <<<EOF

åŒ¿å

EOF;
 } 
$return .= <<<EOF

</cite>

EOF;
 if(!isset($thread['icon'])) { 
$return .= <<<EOF

<em class="xi1">{$thread['dateline']}</em>

EOF;
 } 
$return .= <<<EOF

</td>
</tr>
</tbody>

EOF;
 } 
$return .= <<<EOF

<tr>
<td colspan="4" align="center" style="line-height:25px;">
<a href="{$searchparams['url']}?q={$urlkw}&source=word.tao_more.a{$srchotquery}">æŸ¥çœ‹æ›´å¤š</a>
</td>
</tr>
</table>
</div>

EOF;
 } 
$return .= <<<EOF


EOF;
?><?php return $return;?><?php }

function tpl_cloudsearch_global_footer_related() {
global $_G;
$rel_title = urlencode($_G['forum_thread']['subject']);
$widthauto = widthauto();
$get_reltid = dintval($_GET[reltid]);
$get_pre_pos = dhtmlspecialchars(trim($_GET[pre_pos]));?><?php
$return = <<<EOF


EOF;
 if(empty($_G['inajax'])) { 
$return .= <<<EOF

<script type="text/javascript">
var rel_tid = "{$_G['tid']}";
var rel_title = "{$rel_title}";
var rel_reltid = "{$get_reltid}";
var rel_prepos = "{$get_pre_pos}";
var my_siteid = "{$_G['setting']['my_siteid']}";
var rel_uid = "{$_G['uid']}";
var rel_views = "{$_G['forum_thread']['views']}";
var rel_replies = "{$_G['forum_thread']['replies']}";
var rel_page = "{$_G['page']}";
var rel_show = "{$widthauto}";
</script>
<script src="http://cache.soso.com/30d/js/discuz/relate_subject.js" type="text/javascript" charset="GBK"></script>

EOF;
 } 
$return .= <<<EOF


EOF;
?><?php return $return;?><?php }

function tpl_cloudsearch_global_footer_mini() {
global $_G;
$utilService = Cloud::loadClass('Service_Util');
$params = array(
's_site_gid' => $_G['groupid'],
'response_type' => 'js',
'referer' => $_SERVER['HTTP_REFERER'],
'from' => CURMODULE,
);
$signUrl = $utilService->generateSiteSignUrl($params);
$my_search_se_url = 'http://search.discuz.qq.com/api/site/se?' . $signUrl . "";?><?php
$return = <<<EOF


EOF;
 if(empty($_GET['inajax'])) { 
$return .= <<<EOF

<script src="{$my_search_se_url}" type="text/javascript"></script>

EOF;
 } 
$return .= <<<EOF


EOF;
?><?php return $return;?><?php }

function tpl_index_forum_extra_output($forum_recwords) {
global $_G;?><?php
$return = <<<EOF

    
EOF;
 if($forum_recwords) { 
$return .= <<<EOF

    <dd class="fl_g_hot">
        <strong>çƒ­ç‚¹: </strong>
        
EOF;
 if(is_array($forum_recwords)) foreach($forum_recwords as $k => $frecword) { 
$return .= <<<EOF
<a class="xi2" href="{$frecword['url']}" target="_blank">{$frecword['word']}</a>
EOF;
 } 
$return .= <<<EOF

    </dd>
    
EOF;
 } 
$return .= <<<EOF


EOF;
?><?php return $return;?><?php }

function tpl_cloudsearch_global_footer_suggest($queryString) {
global $_G;?><?php
$return = <<<EOF

    <script type="text/javascript">
    var cloudsearch_suggest = {};
    cloudsearch_suggest.cache = {}; // »º´æ
    cloudsearch_suggest.sId = "{$_G['setting']['my_siteid']}";
    cloudsearch_suggest.keyInterval = null; // °´×¡ÉÏÏÂ¼üÊ±µÄsetTimeoutÊ±¼äÖµ
    cloudsearch_suggest.requestTimeout = null; // ·¢ËÍjsonpÇëÇóÊ±µÄsetTimeoutÊ±¼äÖµ
    cloudsearch_suggest.responseTimeout = null; // jsonpÇëÇó³¬Ê±Ê±µÄsetTimeoutÊ±¼äÖµ
    cloudsearch_suggest.slideSpeed = 700; // °´×¡ÉÏÏÂ¼üÊ±µÄ¹ö¶¯ËÙ¶È
    cloudsearch_suggest.linenow = 0; // µ±Ç°ËùÔÚĞĞ
    cloudsearch_suggest.queryString = "{$queryString}"; // µ±Ç°ËùÔÚĞĞ
    
    function cloudsearch_suggest_preventEnter(oEvent) {

    	var code = oEvent.keyCode;
        var lines = $('sg').getElementsByTagName('li');
        
        if ((38 == code || 40 == code) && !cloudsearch_suggest.keyInterval) {
        	cloudsearch_suggest_moveOneStep(code, lines);
        }
    }
    
    function cloudsearch_suggest_moveOneStep(code, lines) {
        
    	if (38 == code || 40 == code) {
            var panel = $('sg');
            if ('block' == panel.style.display) {
            	
            	cloudsearch_suggest_clearStyle(); // ÇåµôËùÓĞliµÄÑ¡ÖĞ×´Ì¬
                var suggestNum = lines.length;

                if (38 == code) {
                    if (cloudsearch_suggest.linenow > 1) {
                    	cloudsearch_suggest.linenow--;
                    } else {
                    	cloudsearch_suggest.linenow = suggestNum;
                    }
                }

                if (40 == code) {
                	cloudsearch_suggest.linenow = (cloudsearch_suggest.linenow == suggestNum) ? 1 : (cloudsearch_suggest.linenow + 1);
                }
                lines[cloudsearch_suggest.linenow - 1].className = 'smo';
            }
            
            cloudsearch_suggest.keyInterval = setTimeout(function() {cloudsearch_suggest_moveOneStep(code, lines);}, cloudsearch_suggest.slideSpeed);
            cloudsearch_suggest.slideSpeed = 80;
        }
    }
    
    function cloudsearch_suggest_suggest(oEvent) {
        
    	var q = trim($('scbar_txt').value); // ÊäÈë¿òµÄÊäÈë
        
        var code = oEvent.keyCode; // ¼üÅÌ°´¼üÖµ
        var lines = $('sg').getElementsByTagName('li');

        if (38 == code || 40 == code) { // up down
            if (null != cloudsearch_suggest.keyInterval) {
                clearTimeout(cloudsearch_suggest.keyInterval);
                cloudsearch_suggest.keyInterval = null;
                cloudsearch_suggest.slideSpeed = 700;
            }
            // °ÑËùÑ¡Öµ·ÅÈëÊäÈë¿ò£¨È¥³ıhtml±êÇ©£©
            $('scbar_txt').value = lines[cloudsearch_suggest.linenow - 1].innerHTML.replace(/<\s*(\/)?\s*[0-9a-zA-Z]+\s*>/g, '');
        } else if (27 == code) { // ESC
        	
        	if (null != cloudsearch_suggest.requestTimeout) {
                clearTimeout(cloudsearch_suggest.requestTimeout);
            }
        
        	cloudsearch_suggest_hide();
        } else {
            if ('' != q) {
                var data = cloudsearch_suggest_getCache(q);
                if (data) {
                	cloudsearch_suggest_menuMaker(data);
                } else {
                    if (null != cloudsearch_suggest.requestTimeout) {
                        clearTimeout(cloudsearch_suggest.requestTimeout);
                    }
                    // ÇëÇóÑÓÊ±0.3ÃëÖ´ĞĞ£¬ÒòÎªÓĞ¿ÉÄÜÓÃ»§ÊÇÔÚ³ÖĞøÊäÈë
                    cloudsearch_suggest.requestTimeout = setTimeout(function() {cloudsearch_suggest_sendRequest(q);}, 500); 
                }
            } else {
            	
            	if (null != cloudsearch_suggest.requestTimeout) {
                    clearTimeout(cloudsearch_suggest.requestTimeout);
                }
            	
            	cloudsearch_suggest_hide();
            }
        }
    }

    function cloudsearch_suggest_sendRequest(q) {
    	
    	// É¾µôÖ®Ç°µÄÇëÇó£¨°üÀ¨³¬Ê±´¦Àí£©
    	if ($('cloudsearch_suggest') != null) {
    		document.getElementsByTagName('head')[0].removeChild($('cloudsearch_suggest'));
    		if (null != cloudsearch_suggest.responseTimeout) {
                clearTimeout(cloudsearch_suggest.responseTimeout);
            }
    	}
    	
    	var script = document.createElement('script');
        with (script) {
        	src = 'http://search.discuz.qq.com/api/suggest?q=' + encodeURIComponent(q) + '&' + cloudsearch_suggest.queryString;
        	id = 'cloudsearch_suggest';
        	charset = 'utf-8';
        }
        
        document.getElementsByTagName('head')[0].appendChild(script); // jsonp¼ÓÔØÍâÓò½Ó¿ÚÊı¾İ
        cloudsearch_suggest.responseTimeout = setTimeout(function() {cloudsearch_suggest_clearRequest();}, 1000); // 0.5ÃëºóÃ»·µ»Ø¾ÍÅ×Æú
    }
    
    function cloudsearch_suggest_clearRequest() {
    	// É¾µôÖ®Ç°µÄÇëÇó£¨°üÀ¨³¬Ê±´¦Àí£©
        if ($('cloudsearch_suggest') != null) {
            document.getElementsByTagName('head')[0].removeChild($('cloudsearch_suggest'));
        }
    }

    function cloudsearch_suggest_callback(data) {
    	
    	if (typeof data != undefined && 0 == data.status) {
    		
cloudsearch_suggest_menuMaker(data.result);

    		cloudsearch_suggest_setCache(data.q, data.result);
    	}
    }

function cloudsearch_suggest_menuMaker(data) {

if (data.length > 0) {

var list = '<ul>';
    		for (var i = 0; i < data.length; i++) {
    			  list += '<li class="sml" onmouseover="cloudsearch_suggest_mouseOver(this);" onclick="cloudsearch_suggest_mouseClick(this);">' + data[i] + '</li>';
    		}
    		list += '</ul>';
$('st_box').innerHTML = list;
    		
    		cloudsearch_suggest_show();
}
}
    
    function cloudsearch_suggest_mouseClick(obj) {
    	$('scbar_txt').value = obj.innerHTML.replace(/<\s*(\/)?\s*[0-9a-zA-Z]+\s*>/g, '');
    	$('scbar_btn').click();
    }
    
    function cloudsearch_suggest_mouseOver(obj) {
    	cloudsearch_suggest_clearStyle(); // ÇåµôÖ®Ç°µÄÑ¡ÖĞ×´Ì¬
    	obj.className = "smo"; // µ±Ç°µÄliÉèÖÃÎªÑ¡ÖĞ×´Ì¬
    	
    	// °ÑlinenowÉèÖÃÎªµ±Ç°ĞüÍ£µÄÖµ
        var lis = $('st_box').getElementsByTagName('li');
        if (typeof lis != undefined && lis.length > 0) {
            for (var i = 0; i < lis.length; i++) {
                if (lis[i] == obj) {
                	cloudsearch_suggest.linenow = i + 1;
                	break;
                }
            }
        }
    }
    
    function cloudsearch_suggest_show(oEvent) {
    	cloudsearch_suggest.linenow = 0;
    	cloudsearch_suggest.slideSpeed = 700;
        $('sg').style.display = 'block';
$('scbar_txt').focus();
    }
    
    function cloudsearch_suggest_hide() {
    	$('sg').style.display = 'none';
    }
    
    function cloudsearch_suggest_setCache(key, data) {
    	cloudsearch_suggest.cache[key] = data;
    }
    
    function cloudsearch_suggest_getCache(key) {
        return cloudsearch_suggest.cache[key];
    }
    
    function cloudsearch_suggest_clearStyle() {
    	var lis = $('st_box').getElementsByTagName('li');
    	if (typeof lis != undefined && lis.length > 0) {
    		for (var i = 0; i < lis.length; i++) {
    			lis[i].className = 'sml';
    		}
    	}
    }

function cloudsearch_suggest_sgMouseOver() {
$('scbar_txt').focus();
_detachEvent($('scbar_txt'), 'blur', cloudsearch_suggest_hide);
}

function cloudsearch_suggest_sgMouseOut() {
cloudsearch_suggest_clearStyle();
_attachEvent($('scbar_txt'), 'blur', cloudsearch_suggest_hide);
}
    
if (!BROWSER.ie || BROWSER.ie > 6) {
// ÊäÈë¿ò°ó¶¨onkeydownºÍonkeyupÊÂ¼ş
_attachEvent($('scbar_txt'), 'keydown', cloudsearch_suggest_preventEnter);
_attachEvent($('scbar_txt'), 'keyup', cloudsearch_suggest_suggest);
_attachEvent($('scbar_txt'), 'blur', cloudsearch_suggest_hide);
_attachEvent($('sg'), 'mouseover', cloudsearch_suggest_sgMouseOver);
_attachEvent($('sg'), 'mouseout', cloudsearch_suggest_sgMouseOut);
}
    </script>

EOF;
?><?php return $return;?><?php }?>