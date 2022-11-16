<?php
echo '<hr/>';
// 时区的概念
// PRC  Asia/chongqing  Asia/shanghai
// 设置时区
date_default_timezone_set('PRC');
// echo date_default_timezone_get();
// 获取本地时间
echo date('Y-m-d H:i:s');
echo '<hr/>';

// 表当前时间戳
echo time();
// 微秒 百万分之一秒
echo '<hr/>';
echo microtime(true);
echo '<hr/>';

// 返回一个时间数组
print_r(getdate());
echo '<hr/>';

// 字符串转时间戳
// 2010-10-10  iso日期标准；
echo strtotime('2022-2-11');
echo '<hr/>';

// 得到当前的时间
echo '<hr/>';
echo strtotime("NOW");
echo '<hr/>';


// php carbon 时间扩展包

// 时间对象
$dateTime = new DateTime();
$dateTime->setDate(2019,12,12);
print_r($dateTime);
echo '<hr/>';

echo $dateTime->format('Y-m-d H:i:s');
echo '<hr/>';
// 显示时间戳
echo $dateTime->format('U');