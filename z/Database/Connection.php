<?php

$conn = mysqli_connect("127.0.0.1","root","root","neuvideo");
date_default_timezone_set('PRC');
mysqli_query($conn,"set names utf8");
// 检测连接
if (!$conn) {
    die("数据库连接失败: " . $conn->connect_error);
}