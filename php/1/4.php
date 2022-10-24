<?php
    // 常量  第三个参数false严格区分大小写
    // 函数定义常量
    define("NAME","有为",false);
    echo NAME;
    // 语言结构定义 执行效率比define快
    const URL = '年少有为';
    echo URL;
    // 也可以定义常量数组
    const MSG = 'zyw';
    // 常量不受访问限制
    function show(){
        echo MSG;
    }
    show();
    // 检测常量是否存在  常量名需要加双引号
    var_dump(defined('MSG'));

    // 系统提供的常量
    echo PHP_VERSION;
    echo PHP_OS;
    // TRUE FALSE  true false

    class Demo{
        public function show(){
            // 打印当前类名
            echo __CLASS__;
            // 打印当前类名和方法
            echo __METHOD__;
        }
    }
    (new Demo())->show();

    // 查看系统常量
    print_r(get_defined_constants(true));