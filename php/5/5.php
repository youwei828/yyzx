<?php
header('Content-type:image/png');
// 输出字体
// gd创建画布
$res = imagecreatetruecolor(500,500);
// var_dump($res);
// 设置颜色
$red = imagecolorallocate($res,255,0,0);
$green = imagecolorallocate($res,0,255,0);
$blue = imagecolorallocate($res,0,0,255);
$white = imagecolorallocate($res,255,255,255);
$black = imagecolorallocate($res,0,0,0);

// 填充颜色
imagefill($res,200,200,$white);







// 输出图像
imagepng($res,);

// 释放资源
imagedestroy($res);