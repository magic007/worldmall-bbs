<? if(!defined('IN_DISCUZ')) exit('Access Denied'); if($attentionlist) { ?>
<form method="post" action="my.php?item=attention">
<input type="hidden" name="formhash" value="<?=FORMHASH?>" />
<table cellspacing="0" cellpadding="0" summary="关注的主题" class="datatable">
<thead class="colplural">
<tr>
<td width="6%"></td>
<th>标题</th>
<td class="forum">版块</td>
<td class="nums">新回复</td>
<td class="nums">回复</td>
<td class="lastpost"><cite>最后发表</cite></td>
</tr>
</thead>
<tbody><? if(is_array($attentionlist)) { foreach($attentionlist as $attention) { ?><tr>
<td><input class="checkbox" type="checkbox" name="delete[]" value="<?=$attention['tid']?>"></td>
<? if($attention['newreplies']) { ?>
<th><strong><a href="redirect.php?tid=<?=$attention['tid']?>&amp;goto=lastpost#lastpost" target="_blank"><?=$attention['subject']?></a></strong></th>
<? } else { ?>
<th><a href="redirect.php?tid=<?=$attention['tid']?>&amp;goto=lastpost#lastpost" target="_blank"><?=$attention['subject']?></a></th>
<? } ?>
<td class="forum"><?=$attention['forumname']?></td>
<td class="nums"><?=$attention['newreplies']?></td>
<td class="nums"><?=$attention['replies']?></td>
<td class="lastpost"><cite><?=$attention['lastposter']?></cite><em><?=$attention['lastpost']?></em></td>
</tr><? } } ?><tr>
<td><input class="checkbox" type="checkbox" name="chkall" id="chkall" onclick="checkall(this.form)" /> <label for="chkall">删?</label></td>
<th><button type="submit" class="submit" name="attentionsubmit" value="true">提交</button></th>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
</tbody>
</table>
</form>
<? } else { ?>
<table cellspacing="0" cellpadding="0" class="datatable">
<tr><th><p class="nodata">暂无数据</p></th></tr>
</table>
<? } if(!empty($multipage)) { ?>
<div class="pages_btns"><?=$multipage?></div>
<? } ?>