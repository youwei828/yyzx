<?php
// 严格模式  使用字符型的数字会报错
declare(strict_types = 1);
// 函数类型约束
function show(int $num){
    return $num;
}
// var_dump(show('123'));

// 产生错误抛出异常
try {
    echo show('123');
} catch (\Throwable $th) {
    echo $th->getMessage();
}
echo '<hr/>';
// 返回值约束
// function sum():int{
//     // return '返回值必须是数值';
//     return 123;
// }
// echo sum();

// 加上问号返回值可以为空，必须是null,也就是返回值可有可无
function sum():?int{
    // return '返回值必须是数值';
    return 123;
    return null;
}
echo sum();

try {
    echo sum();
} catch (\Throwable $th) {
    echo $th->getMessage();
}

// 函数不需要返回值加上void
function add ():void
{
    // 函数必须有返回值，void可以不需要返回值
}
add();