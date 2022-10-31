<?php
// 声明数组
// $arr = array(1,2,3);
// var_dump($arr);
$arr=[1,2,3];
// print_r($arr);
echo $arr[0];
echo'<hr/>';

// 另一种数组 切记加引号
$article =[
    'title'=>'visual',
    'id'=>'1234556'
];
echo $article['id'];

// 定义二维数组
$towArr = [['id'=>'1','name'=>'tom'],['id'=>'2','name'=>'lisa'],['id'=>'3','name'=>'Dva']];
echo $towArr[1]['name'];