<?php
header("COntent-type:text/html;charset:utf8");
try {
    $pdo = new PDO("mysql:host=localhost;dbname=houdunren;charset=utf8",'root','root');
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
    $query = $pdo->query("SELECT * FROM news  LIMIT 2");
    while($row = $query->fetch()){
        echo sprintf("标题：%s\t作者：%s<br/>",$row['title'],$row['author']);
    }
} catch (PDOException $e) {
    die($e->getMessage());
}