<?php
// 接口定义规范

use Cache as GlobalCache;
use Mysql as GlobalMysql;
use Redis as GlobalRedis;

interface InterFaceCache{
    public function set($name,$value);
    public function get($name);
}

// 实现接口
class Mysql implements InterFaceCache
{
    public function set($name,$value){}
    public function get($name){}
}
class Redis implements InterFaceCache
{
    public function set($name,$value){}
    public function get($name){}
}
class Cache {
    public static function instance(string $name){
        switch(strtolower($name)){
            case 'mysql':
                return new GlobalMysql;
            case 'redis':
                return new GlobalRedis;
        }
    }
}

$cache = Cache::instance('mysql');
var_dump($cache);


$cache = new GlobalCache;
$cache->instance('mysql');
var_dump($cache);