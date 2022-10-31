<?php
// 函数内使用全局变量
$name = 'up';
function user(&$name){
    // 使用global关键字
    global $name;
    // 使用超全局数组$GLOBALS['']
    echo  $GLOBALS['name'];
    // 直接进行传址,也可以改变变量的值
}
user($name);

// 静态变量在函数内实现累加

function sum(int ...$vars):int{
    static $count = 0;
    // 切记函数内要有返回值
    return  $count += array_sum($vars);
}
echo sum(1,2,3,4);
echo '<hr/>';
echo sum(1,2,3,4);