<?php
header('Content-type:image/png');

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


// 设置像素点
imagesetpixel($res,250,250,$red);

for ($i=0; $i < 5000; $i++) {
    imagesetpixel($res,mt_rand(0,500),mt_rand(0,500),$red);
}

for ($i=0; $i < 50; $i++) {
    imageline(
        $res,
        mt_rand(0,500),
        mt_rand(0,500),
        mt_rand(0,500),
        mt_rand(0,500),
        $red
    );
}



// 输出图像
imagepng($res,);

// 图片的保存在imagepng第二个参数加上
imagepng($res,'1.png');


// 释放资源
imagedestroy($res);