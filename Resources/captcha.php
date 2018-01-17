<?php
session_start();

$Random=rand(10001,99999);
$_SESSION['captcha']=md5($Random);
$im=imagecreatetruecolor(130, 30);
imagefilledrectangle($im,0,0,130,30,imagecolorallocate($im,175,198,234));////imagecolorallocate($im,175,198,234)  fundalul imaginii rgb codului captcha cu alte cuvinte
imagettftext($im, 30, 0, 15, 25,imagecolorallocate($im,02,02,02),'../Resources/font.ttf',$Random);

header('Expires: Wed, 1 Jan 1994 00:00:00 GMT');
header('Last-Modified: '.gmdate('D, d M Y H:i:s').'GMT');
header('Cache-Control: no-store,no-cache,must-revalidate');
header('Cache-Control: post-check=0, pre-check=0',false);
header('Pragma:no-cache');
header('Content-type: image/gif');

imagegif($im);
imagedestroy($im);

session_destroy();
?>