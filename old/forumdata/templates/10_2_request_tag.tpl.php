<? if(!defined('IN_DISCUZ')) exit('Access Denied'); ?><?
$writedata = <<<EOF

<div class="sidebox taglist s_clear">
<h4><a href="tag.php">标签(TAG)</a></h4>

EOF;
 if($taglist) { if(is_array($taglist)) { foreach($taglist as $tag) { 
$writedata .= <<<EOF
<a href="{$boardurl}tag.php?name={$tag['tagnameenc']}" class="tagl{$tag['level']}" title="{$tag['total']}" target="_blank">{$tag['tagname']}</a> 
EOF;
 } } } else { 
$writedata .= <<<EOF

<em>标签信息不存在</em>

EOF;
 } 
$writedata .= <<<EOF

</div>

EOF;
?>