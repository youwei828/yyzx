<?php

// 静态变量的写法
class User{
    // 对象公用的属性
    protected static $name = 'mingyue';
    public function say(){
        // 使用静态变量
        echo User::$name;
        // self表示当前类
        echo self::$name;
    }
    // 静态方法同理
    public static function sayName($name){
        echo self::$name;
    }
}

$obj = new User;
$obj -> say();
$obj::sayName('youwei');