<?php
/**
 *CreateBy:PhpStrom
 *User:youwei
 *Date:2022/6/12/012
 *Time:16:02
 */
    //类常量用关键字const定义
    //类常量永远不会被改变，常量的调用参考静态变量
class Model{
    const EXISTS_VALIDATE = '1';
    public function validate(){
        return self:: EXISTS_VALIDATE;
    }
}

echo Model::EXISTS_VALIDATE;
echo "<hr>";
echo (new Model())->validate();

