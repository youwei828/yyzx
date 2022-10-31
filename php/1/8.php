<?php
// 定义函数
function user(){
    return 'csm';
}
// 调用函数
user();

// 函数命名空间 namespace

// 使用命名空间的函数
include 'User.php';
// 要使用反斜杠
echo User\user();

// 参数传递
// function mobile($tel){
//     return substr($tel,0,-4).'****';
// }
// echo mobile(12345678910);
echo '<hr/>';
// 注意传值和传值的问题
// 如果全局和函数内使用同一个使用&符号
function show(&$var){
    $var++;
    echo $var;
}
$var = 1;
show($var);
echo '<hr/>';
echo $var;

echo '<hr/>';
// 使用点语法进行计算
function sum(...$vars){
    return array_sum($vars);
}
echo sum(1,2,3,4,5,6,7,8,3);
echo '<hr/>';
// 同时可以输入函数默认值
function mobile($tel,$fix='****'){
    return substr($tel,0,-4).$fix;
}
echo mobile(12345678910,'····');

// str_repeat($str,$num)  某个字符串重复，num重复几次