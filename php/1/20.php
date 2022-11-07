<?php
// 两个数组合并，同名覆盖，不同名新增
$database = ['host'=>'localhost','port'=>'2323',['UseR'=>'youwei']];
$database = array_merge($database,['host'=>'127.0.0.1']);
print_r($database);
echo '<hr/>';
// 键名转换  1大写，0小写  但是不适用于多维数组，需要用递归
$keyNameConversion = array_change_key_case($database,1);
print_r($keyNameConversion);

// 递归改变多层数组