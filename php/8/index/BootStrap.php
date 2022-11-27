<?php
// 面向对象实现自动加载
namespace App;

class Bootstrap{
    public static function  boot()
    {
        spl_autoload_register([new self,'autoload']);
    }

    public function autoload(string $class)
    {
        $file = str_replace('\\','/',$class) . '.php';
        require $file;
    }
}
Bootstrap::boot();