<?php
// 正则表达式
// $status = preg_match('/a/','1bca');
// echo $status;
// 元字符
// \d  表示0-9
// \D  ^0-9  表示除了数字之外的字符
// $status = preg_match('/\d/','1asdf23');
// echo $status;

// \w  表示a-zA-Z0-9_
// \w  ^a-zA-Z0-9_  表示除了字符之外的字符

// \s 匹配任意空白 换行 回车
// \S 除了空白
// \n换行符  在双引号里起作用
// \t制表符
$status = preg_match('/\W/','asdf12');
echo $status;