<? if(!defined('IN_DISCUZ')) exit('Access Denied'); global $catlist, $advitems, $postlist, $admode; if(!$admode) { ?>
<div style="display: none" id="hide_ads">
<div id="hide_ad_headerbanner"><? if(!empty($advlist['headerbanner'])) { ?><?=$advlist['headerbanner']?><? } ?></div>
<? if(!empty($advlist['text'])) { ?><div class="ad_text" id="hide_ad_text"><table summary="Text Ad" cellpadding="0" cellspacing="1"><?=$advlist['text']?></table></div><? } if(CURSCRIPT == 'index' && !empty($advlist['intercat'])) { if(is_array($catlist)) { foreach($catlist as $key => $cat) { if($advlist['intercat'][$key] = array_merge(($advlist['intercat']['0'] ? $advlist['intercat']['0'] : array()), ($advlist['intercat'][$key] ? $advlist['intercat'][$key] : array()))) { ?>
<div class="ad_column" id="hide_ad_intercat_<?=$key?>"><? echo $advitems[$advlist['intercat'][$key][array_rand($advlist['intercat'][$key])]]; ?></div>
<? } } } } if(CURSCRIPT == 'viewthread') { if(is_array($postlist)) { foreach($postlist as $post) { if($post['count'] > 0) { if(!empty($advlist['thread1'][$post['count']])) { ?><div class="ad_textlink1" id="hide_ad_thread1_<?=$post['count']?>"><?=$advlist['thread1'][$post['count']]?></div><? } if(!empty($advlist['thread2'][$post['count']])) { ?><div class="ad_textlink2" id="hide_ad_thread2_<?=$post['count']?>"><?=$advlist['thread2'][$post['count']]?></div><? } if(!empty($advlist['thread3'][$post['count']])) { ?><div class="ad_pip" id="hide_ad_thread3_<?=$post['count']?>"><?=$advlist['thread3'][$post['count']]?></div><? } } else { ?>
<div class="ad_textlink1" id="hide_ad_thread1_0"><?=$advlist['thread1']['0']?></div>
<div class="ad_textlink2" id="hide_ad_thread2_0"><?=$advlist['thread2']['0']?></div>
<div class="ad_pip" id="hide_ad_thread3_0"><?=$advlist['thread3']['0']?></div>
<? } } } ?><div class="ad_column" id="hide_ad_interthread"><? if(!empty($advlist['interthread']) && $thread['replies']) { ?><?=$advlist['interthread']?><? } ?></div>
<? } ?>
<div class="ad_footerbanner" id="hide_ad_footerbanner1"><?=$advlist['footerbanner1']?></div>
<div class="ad_footerbanner" id="hide_ad_footerbanner2"><?=$advlist['footerbanner2']?></div>
<div class="ad_footerbanner" id="hide_ad_footerbanner3"><?=$advlist['footerbanner3']?></div>
</div>
<script type="text/javascript">
function showads(unavailables, filters) {
var ad, re;
var hideads = $('hide_ads').getElementsByTagName('div');
for(var i = 0; i < hideads.length; i++) {
if(hideads[i].id.substr(0, 8) == 'hide_ad_' && (ad = $(hideads[i].id.substr(5))) && hideads[i].innerHTML && trim(ad.innerHTML) == '') {
ad.innerHTML = hideads[i].innerHTML;
ad.className = hideads[i].className;
}
}
}
showads();
$('hide_ads').parentNode.removeChild($('hide_ads'));
</script>
<? } if(!empty($advlist['float'])) { ?>
<div class="ad_float_left"><?=$advlist['float']?></div>
<? } if(!empty($advlist['couplebanner'])) { ?>
<div class="ad_float_left ad_couplebanner"><?=$advlist['couplebanner']?></div><div class="ad_float_right ad_couplebanner"><?=$advlist['couplebanner']?></div>
<? } ?>