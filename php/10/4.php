<?php
header("COntent-type:text/html;charset:utf8");
try {
    $pdo = new PDO("mysql:host=localhost;dbname=houdunren;charset=utf8",'root','root');
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
    // $query = $pdo->query("SELECT * FROM news  LIMIT 2");
    // 预准备语句防止SQL注入
    // :id是命名符
    // $sth = $pdo->prepare("SELECT * FROM news WHERE id = :id");
    // $sth->execute([":id"=>$_GET['id']]);
    // $rows = $sth->fetchAll();
    // print_r($rows);
    
    // $sth = $pdo->prepare('INSERT INTO news (title,author,description) VALUES (:title,:author,:description)');
    // $sth->execute([':title'=>'家庭','author'=>'幸福','description'=>null]);
    // echo $pdo->lastInsertId();

    // 占位符
    $sth = $pdo->prepare('SELECT * FROM news WHERE id>=? AND id<=?');
    $sth->execute([$_GET['begin'],$_GET['end']]);
    print_r($sth->fetchAll());
} catch (PDOException $e) {
    die($e->getMessage());
}