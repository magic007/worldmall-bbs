<? if(!defined('IN_DISCUZ')) exit('Access Denied'); ?><?
$__IMGDIR = IMGDIR;$__VERHASH = VERHASH;$__FONTSIZE = FONTSIZE;$__FONT = FONT;$__MIDTEXT = MIDTEXT;$writedata = <<<EOF

<script type="text/javascript">
var IMGDIR = '{$__IMGDIR}';
</script>
<script src="{$GLOBALS['jspath']}tree.js?{$__VERHASH}" type="text/javascript" /></script>
<style type="text/css">
.tree { font: {$__FONTSIZE} {$__FONT}; color: {$__MIDTEXT}; white-space: nowrap; padding-left: 0.4em; overflow-x: hidden; }
.tree img { border: 0px; vertical-align: middle; }
.tree .node a { text-decoration: none; }
</style>

<div class="sidebox">
<script type="text/javascript">
var tree = new dzTree('tree');
tree.addNode(0, -1, '{$GLOBALS['bbname']}', '{$GLOBALS['indexname']}', 'main', true);
EOF;
 if(is_array($forumlist)) { foreach($forumlist as $forumdata) { if($forumdata['type'] == 'group') { if($haschild[$forumdata['fid']]) { 
$writedata .= <<<EOF

tree.addNode({$forumdata['fid']}, {$forumdata['fup']}, '{$forumdata['name']}', 'index.php?gid={$forumdata['fid']}', '', false);

EOF;
 } } else { 
$writedata .= <<<EOF

tree.addNode({$forumdata['fid']}, {$forumdata['fup']}, '{$forumdata['name']}', 'forumdisplay.php?fid={$forumdata['fid']}', '', false);

EOF;
 } } } 
$writedata .= <<<EOF
tree.show();
</script>
</div>

EOF;
?>