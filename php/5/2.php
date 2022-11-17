<?php
header('Content-type:image/png');
// readfile('1.jpg');
// gd创建画布
$res = imagecreatetruecolor(500,500);
// var_dump($res);
// 设置颜色
$red = imagecolorallocate($res,255,0,0);
$green = imagecolorallocate($res,0,255,0);
$blue = imagecolorallocate($res,0,0,255);

// 填充颜色
imagefill($res,200,200,$red);

// 空心矩形
imagerectangle($res,100,100,400,400,$green);
// 实心矩形
imagefilledrectangle($res,200,200,300,300,$blue);

// 空心圆形
imageellipse($res,250,250,400,400,$green);
// 实心圆形
imagefilledellipse($res,250,250,100,100,$green);

// 绘制线条
imageline($res,0,0,490,490,$blue);
imageline($res,490,0,0,490,$blue);

// 输出图像
imagepng($res);