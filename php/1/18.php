<?php
$allowImageType = ['jpeg'=>20000,'png'=>20000];
$file = 'hello.png';
// 先截取.后面的，再把点去掉
$ext = strtolower(substr(strchr($file,'.'),1));
// 检测数组是否有键名
if(!array_key_exists($ext,$allowImageType)){
    echo 'wrong';
}else{
    echo 'success';
}
// 检测数组值是否包括这个词
if(!in_array(000,$allowImageType)){
    echo 'success';
}
// 得到键名的新数组
var_dump(array_keys($allowImageType));