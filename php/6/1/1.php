<?php
include './Water.php';
try{
    // 生成水印
    $water = new Water('./mingyue.jpg');
// s水印放在大图上
$water ->make('./1.jpg','a.jpg',3);
}catch(Exception $error){
    echo $error -> getMessage();}