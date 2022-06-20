<?php
/**
 *CreateBy:PhpStrom
 *User:youwei
 *Date:2022/6/12/012
 *Time:22:10
 */
// abstract class Notify{
// abstract function credit();   抽象类和抽象方法在父类写，如果子类没有重写该抽象方法，会报错
//}
class Notify {
    protected $color = "red";
    protected $credit = 10;
    public final function credit(){
        return 25;
    }
    public function message(){
        return '<span style="color:'. $this->color.'">欢迎您,您有'. $this->credit() ."个积分".'</span>';
    }
}

class User extends Notify {
    public function register(){
        echo $this->message();
    }

    // public  function credit(){         父类里的方法加上final，子类就不会覆盖，直接报错
    //     return 25;
    // }
}

class Comment extends Notify {
    public function send(){
        echo $this->message();
    }
}

echo (new User())->register();
echo('<hr/>');
echo (new Comment())->send();