<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); include template('common/header_ajax'); ?><script type="text/javascript">
if(!isUndefined(checkForumnew_handle)) {
clearTimeout(checkForumnew_handle);
}
<?php if($threadlist) { ?>
if($('separatorline')) {
var table = $('separatorline').parentNode;
} else {
var table = $('forum_' + <?php echo $fid;?>);
}
var newthread = [];<?php $i = 0;?><?php if(is_array($threadlist)) foreach($threadlist as $thread) { ?>newthread[<?php echo $i;?>] = {'tid':<?php echo $thread['tid'];?>, 'thread': {'icn':{'className':'icn','val':'<a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>" target="_blank"><img src="<?php echo IMGDIR;?>/folder_new.gif"></a>'}<?php if($_G['forum']['ismoderator']) { ?>, 'o':{'className':'o','val':'<input type="checkbox" value="<?php echo $thread['tid'];?>" name="moderate[]" onclick="tmodclick(this)">'}<?php } ?> ,'common':{'className':'new','val':'<?php echo $thread['threadurl'];?>'}, 'author':{'className':'by','val':'<cite><?php echo $thread['authorurl'];?></cite><em><span><?php echo $thread['dateline'];?></span></em>'}, 'num':{'className':'num','val':'<a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>"><?php echo $thread['replies'];?></a><em><?php echo $thread['views'];?></em>'}, 'lastpost':{'className':'by','val':'<cite><?php echo $thread['lastposterurl'];?></cite><em><a href="forum.php?mod=redirect&amp;tid=<?php echo $thread['tid'];?>&amp;goto=lastpost#lastpost"><?php echo $thread['lastpost'];?></a></em>'}}};<?php $i++;?><?php } ?>
removetbodyrow(table, 'forumnewshow');
for(var i = 0; i < newthread.length; i++) {
if(newthread[i].tid) {
addtbodyrow(table, ['tbody', 'newthread'], ['normalthread_', 'normalthread_'], 'separatorline', newthread[i]);
}
}
function readthread(tid) {
if($("checknewthread_"+tid)) {
$("checknewthread_"+tid).className = "";
}
}
<?php } elseif(!$threadlist && $_GET['uncheck'] == 2) { ?>
showDialog('暂无新回复主题', 'notice', null, null, 0, null, null, null, null, 3);
<?php } ?>
checkForumnew_handle = setTimeout(function () {checkForumnew('<?php echo $fid;?>', '<?php echo $_G['timestamp'];?>');}, checkForumtimeout);
</script><?php include template('common/footer_ajax'); ?>