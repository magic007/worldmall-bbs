<? if(!defined('IN_DISCUZ')) exit('Access Denied'); funcstat(); stat_code(); $s = ob_get_contents(); ob_end_clean(); $s = preg_replace("/([\x01-\x08\x0b-\x0c\x0e-\x1f])+/", ' ', $s); $s = str_replace(array(chr(0), ']]>'), array(' ', ']]&gt;'), $s); ?><?=$s?>
<? if($prompts['newbietask'] && $newbietasks) { include template('task_newbie_js', '0', ''); } ?>
]]></root><? exit; ?>