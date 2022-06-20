<?php

/**
 *CreateBy:PhpStrom
 *User:youwei
 *Date:2022/6/13/013
 *Time:11:12
 */
interface InterFaceCache
{
    public function set($name, $value);

    public function get($name);
}

class Mysql implements InterFaceCache
{     //使用接口需要重写接口的方法；
    public function set($name, $value)
    {
        // TODO: Implement set() method.
    }

    public function get($name)
    {
        // TODO: Implement get() method.
    }
}

class Redis implements InterFaceCache
{
    public function set($name, $value)
    {
        // TODO: Implement set() method.
    }

    public function get($name)
    {
        // TODO: Implement get() method.
    }
}

class Cache
{
    public static function instance(string $drive)
    {
        switch ($drive) {
            case 'mysql':
                return new Mysql();
            case 'redis':
                return new Redis();
        }
    }
}

$cache = Cache::instance('mysql');
var_dump($cache);