<?php
$res = imagecreatefromjpeg("./1.jpg"); 
$icon1 = imagecreatefromjpeg("./mingyue.jpg");
$icon2 = imagecreatefrompng("./mingyue.png");

// 将水印放在图片上面
// 兼容性更好，但是没有透明度选项
// imagecopy($res,$icon1,100,100,0,0,imagesx($icon1),imagesy($icon1));
// imagecopy($res,$icon1,100,100,0,0,imagesx($icon2),imagesy($icon2));

// 兼容性差，有透明度，但是不作用于png
imagecopymerge($res,$icon2,100,100,0,0,imagesx($icon1),imagesy($icon1),50);

// 输出图片
header("Content-type:image/jpeg");
imagejpeg($res);