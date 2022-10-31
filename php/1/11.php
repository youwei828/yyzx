<?php
// 变量函数的使用
// function sum(){
//     return 1+2;
// }
// $action = sum();
// echo $action;

// 获取文件的后缀名
$file ='hdcms.png';
// 截取点后面的字符,
// strrchr()查找字符串在另一个字符串中最后一次出现的位置，并返回从该位置到字符串结尾的所有字符。
$msg= strrchr($file,'.');
echo $msg;
echo'<hr/>';
// 清除多余的字符
$ext = trim($msg,'.');
echo $ext;
echo'<hr/>';
// 转化为小写
$action = strtolower($ext);
echo $action;
echo'<hr/>';

function jpg($f){
    return 'this is jpg '.$f;
}
function png($f){
    return 'this is png '.$f;
}
echo $action($file);
// echo jpg($file);
echo'<hr/>';

// 判断函数是否存在
if(function_exists($action)){
    echo $action($file);
}else {
    echo '不能处理';
}