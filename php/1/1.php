<?php
//单行注释
#单行注释
/**
 *多行注释
 */

// 变量类型 变量命名字母下划线开始 php是弱类型语言
$name_ = '年少有为';
var_dump($nane);
$yu_an = 100;
var_dump($yu_an);
//普通赋值 传值
$a =$b;
//传地址
$a = &$b;
//特殊用法
$name = 'word';
$$name = 'youwei';
echo $word;
echo $$name;
//超全局变量
// $_GET        地址栏GET提交
// $_POST       表单POST提交
// $_FILES      文件上传变量
// $_SESSION    会话变量
// $_COOKIE     cookie变量
// $GLOBALS     全局变量
// $_REQUEST    包含$_GET\$_POST\$_COOKIE
// $_SERVER     服务器环境变量

// 函数内引入外部变量
$wangwu ='王五' ;
function show(){
    global $wangwu;
    //函数内使用外部变量必须使用global来引入  但是少使用，会造成变量污染
    echo $wangwu;
    //函数引用的全局变量删不掉 unset
    // 全局变量引入  推荐使用
    echo $GLOBALS['wangwu'];
}
show();

// 变量检测
var_dump(isset($bucunzai));
// 删除变量
unset($yichu);

//静态变量 实现累加
function make(){
    // static只在运行第一次执行  持久化数据储存
    static $num =1;
    $num++;
    return $num.'<hr/>'; } echo make(); echo make(); echo make();
