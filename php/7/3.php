<?php
//取别名
use Notify as GlobalNotify;

// 抽象类继承的子类必须实现里面的抽象方法

abstract class Notify{
    protected $credit = 10;
    // 抽象方法没有方法体,子类不实现就会报错
    // abstract public function doName();
    // final关键字禁止子类覆盖
    public final  function message(){
        return '发送消息'.'你的积分数是'.$this->credit();
    }
    public function credit(){
        return $this->credit;
    }

}

class User extends GlobalNotify{
    // 重写属性或者方法
    protected $credit = 5;
    public function register(){
        return $this->message();
    }
}

class Comment extends GlobalNotify{
    public function send(){
        return $this->message();
    }
}

$user = new User;
echo $user->register();
echo '<hr/>';
$comment = new Comment;
echo $comment->send();