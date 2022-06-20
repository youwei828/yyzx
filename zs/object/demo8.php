<?php
/**
 *CreateBy:PhpStrom
 *User:youwei
 *Date:2022/6/13/013
 *Time:13:19
 */
class Code{
    protected $width;
    public function __construct(int $width =1){  //构造方法，创建构造方法对象的时候自动方执行方法,widt可以做设置固定的值
        $this->width = $width;
    }

    public function make (){
        return '您生成了长度为'.$this->width.'验证码';
    }

    public function __destruct() {         //析构函数自动执，通常为关闭服务，或者删除数
        echo '我死了';
    }
}

$a = (new Code(100));      //构造的对象调用方法可以改变固定的参数值
echo $a->make();
echo '<hr/>';