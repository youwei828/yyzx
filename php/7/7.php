<?php
// 构造方法和析构方法
// 构造方法是对象创建时执行的方法
// 析构方法在对象引用完成后执行的

use Topic as GlobalTopic;

class Topic{
    public function __construct()
    {
        echo '__construct';
        echo '<hr/>';
    }
    public function __destruct()
    {
        echo '__destruct';
    }
}

new GlobalTopic;