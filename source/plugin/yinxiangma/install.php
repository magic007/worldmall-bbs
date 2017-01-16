<?php


if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$sql = <<<EOF

UPDATE pre_common_setting SET svalue ='a:3:{i:0;s:5:"login";i:2;s:9:"newthread";i:3;s:5:"reply";}' WHERE skey ='disallowfloat';


EOF;

runquery($sql);

$finish = TRUE;
?>