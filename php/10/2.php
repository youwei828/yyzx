<?php
header("Content-type:text/html;charset=utf8");
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
    'charset'=>'utf8'
];
$dsn = sprintf("mysql:host=%s;dbname=%s;charset=%s",$config['host'],$config['database'],$config['charset']);

try {
    // 连接数据库
    $pdo = new PDO($dsn,$config['user'],$config['password']);
    // 设置查询返回的字段大小写
    // $pdo->setAttribute(PDO::ATTR_CASE,PDO::CASE_UPPER);
    // 设置返回数据的格式，关联数组或者索引数组
    // 返回关联数组
    // $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
    // 返回索引数组
    // $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_NUM);
    // 返回对象
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
    
    $query = $pdo->query("SELECT * FROM news");
    $rows = $query->fetchAll();
    print_r($rows);
    // 有了对象就可以获取其中的值
    echo $rows[0]->title;
} catch (PDOException $e) {
    die($e->getMessage());
}
