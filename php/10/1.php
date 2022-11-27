<?php
header("Content-type:text/html;charset=utf8mb4");
$config = [
    // 主机
    'host'=>'127.0.0.1',
    // 用户名
    'user'=>'root',
    // 密码
    'password'=>'root',
    // 数据库
    'database'=>'houdunren',
    // 字符集
    'charset'=>'utf8mb4'
];
$dsn = sprintf("mysql:host=%s;dbname=%s;charset=%s",$config['host'],$config['database'],$config['charset']);

try {
    // 连接数据库
    $pdo = new PDO($dsn,$config['user'],$config['password']);
    // 使用对象方式修改错误的模式
    // $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    // 执行数据库执行语句
    // 添加返回的是改变数据库的条数
    echo $pdo->exec("INSERT INTO news (title,author,description) VALUE ('js','坚持','就是胜利')");
    // 更新语句返回的是改变数据的条数
    // echo $pdo->exec("UPDATE news set title='position' WHERE id>5");

    // 删除语句返回的是改变的数据的条数
    // echo $pdo->exec("DELETE FROM news WHERE id>8");

    // 获得添加数据的主键
    $pdo->exec("INSERT INTO news (title,author,description) VALUE ('vue','MINGYUE','MINGYUE')");
    echo $pdo->lastInsertId();
} catch (PDOException $e) {
    die($e->getMessage());
}