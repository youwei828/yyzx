<?php
// 图片返回资源
$res = imagecreatefromjpeg('./1.jpg');
var_dump($res);

// 获取图片的信息  可以根据索引3来判断类型
$info = getimagesize("./1.jpg");
print_r($info);