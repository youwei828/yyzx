<?php
// 从数组后面添加数据
$users = ['lisi','wangwu'];
array_push($users,'zhangsan');
print_r($users);
echo '<hr/>';
// 从后面移除
// 返回值是移除的那个数据
$user = array_pop($users);
print_r($user);
echo '<hr/>';
// 从前面添加数据
array_unshift($users,'maliu');
print_r($users);
echo '<hr/>';

// 从前面移除上元教育
array_shift($users);
print_r($users);

// 统计还数组多少数据
echo count($users);