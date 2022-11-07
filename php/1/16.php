<?php
// list类似于解构赋值 不适用于二维数组
// $arr  =['youwei',123];
// list($a,$b) = $arr;
// echo $b;
// echo('<hr/>');
// // 关联数组使用
// $user = ['name'=>'youwei','age'=>'23'];
// list('name'=>$uname,'age'=>$uage) = $user;
// echo $uname;

$users = [
    ['id'=>1,'name'=>'lisi','age'=>'18'],
    ['id'=>2,'name'=>'zhangsan','age'=>'12'],
    ['id'=>3,'name'=>'wangwu','age'=>'15'],
];

while (list('id'=>$id,'name'=>$name,'age'=>$age)=current($users)):
    echo $id,$name,$age.'<hr/>';
    next($users);
endwhile;
echo '<hr/>';
foreach ($users as $key=>&$user) {
    print_r($users[$key]['age']);
}