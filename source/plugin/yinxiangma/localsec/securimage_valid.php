<?php
require_once 'securimage.php';
require_once '../YinXiangMaLocalConfig.php';
$img = new securimage();
$code = $_GET['c'];
$level = $_GET['l'];
$token = $_GET['t'];
$img  = new Securimage();
$valid_result = 'false'; 
if ($img->check($code) == true) { $valid_result = 'true'; }
else { $valid_result = 'false'; }
$valid_result_hash=md5($valid_result.PRIVATE_KEY.$token);
if($level[0] == '3') { echo "var YXM_result_text ='$valid_result_hash';"; }
else { echo "var YXM_result_text = '$valid_result';"; }
echo "var YXM_ajax_result = '$valid_result';";
?>