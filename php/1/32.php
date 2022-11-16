<?php
// 正则表达式原子表[abc]
// $status = preg_match('/[6-9]/','7');
// var_dump($status);
$status = preg_match('/./','a');
var_dump($status);
// .可以匹配除了换行符以外的字符

// ^ 取反

// 拆分不规则的字符串
$str  = '1.jpg#2.jpg@3.jpg';
$files = preg_split('/[#@]/',$str);
print_r($files);
// 合并数组
echo implode(',',$files);
echo '<hr/>';
// 原子组 (abc)

$str2 = 'baidu.com say.com top.com';
$preg = '/(\.)(com)/';
echo preg_replace($preg,'\1<span style="color:red">\2</span>',$str2);

// ^开始符  $结束符