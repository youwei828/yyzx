<?php

use Database\DB;

include './DB.php';
$config = [
    // 主机
    'host'=>'localhost',
    // 用户名
    'user'=>'root',
    // 密码
    'password'=>'root',
    // 数据库
    'dbname'=>'houdunren',
    // 字符集
    'charset'=>'utf8'
];
try {
    $db = new DB($config);
    // 查询全部
    // $rows = $db->query("SELECT * FROM news WHERE id > :id",[':id'=>'1']);
    // print_r($rows);
    // 执行语句没有返回值
    // $db->execute('INSERT INTO news SET title = ?,author = ?',['今天','有点冷']);

    $rows = $db->table('news')->limit(2)->filed('title','author')->get();
    print_r($rows);
} catch (Exception $e) {
    die($e->getMessage());
}