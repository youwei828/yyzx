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

// 设置线条的宽度  设置宽度需要先使用宽度
// 绘制线条
imagesetthickness($res,10);
imageline($res,0,0,490,490,$blue);
imagesetthickness($res,30);
// 设置线条风格需要在线条设置,IMG_COLOR_STYLED
imagesetstyle($res,[$red,$blue,$green]);
imageline($res,490,0,0,490,IMG_COLOR_STYLED);



// 输出图像
imagepng($res);