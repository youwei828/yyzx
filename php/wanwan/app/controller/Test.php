<?php
namespace app\controller;
class Test
{
    public function index($value='')
    {
        return 'hello '.$value ;
    }
    public function arrayOutput(){
        $data = ['a'=>1,'b'=>2,'c'=>3];
        // 助手函数halt中断函数执行
        halt('中断程序运行');
        return json($data);
    }
}