<?php
$users = [
    ['id'=>1,'name'=>'lisi','age'=>'18'],
    ['id'=>2,'name'=>'zhangsan','age'=>'12'],
    ['id'=>3,'name'=>'wangwu','age'=>'15'],
];
// 根据条件过滤
$filterUsers = array_filter($users,function($user){
    // 返回年龄大于20
    return $user['age']>15;
});
print_r($filterUsers);
echo '<hr/>';
// array_map()对每个数组作用
$mapUsers  = array_map(function($user){
    // 删除数组里某一个
    unset($user['age']);
    // 全部添加
    $user['class'] = 'dianshang';
    return $user;
},$users);
print_r($mapUsers);
echo '<hr/>';
// 返回函数的值
$stringUsers = array_map(function($user){
    // 合并字符串
    return implode('-',array_values($user));
},$users);
print_r($stringUsers);