<?php

/**
 *CreateBy:PhpStrom
 *User:youwei
 *Date:2022/6/12/012
 *Time:16:02
 */
class Demo1
{
    protected $name;
    protected static $classnam = "19电商01";  //静态变量
    public function setName(string $name){
    $this->name = $name;     //$name 赋值给 this里的name
    }

    public function say(){
        return self::getClassName() . $this->getName() . 'youwei say:';
    // return Demo1::$classnam . $this->getName() . 'youwei say:';    self为当前类自己。科技调用静态的变量
    //    两个::为选择类里的静态变量
    }

    public function getName(){
        return $this->name;
    }

    public static function getClassName(){        //静态方法，只能用self进行调用
        return self::$classnam ;
    }



}
$yyzx = new Demo1();
$yyzx->setName("张有为");
echo $yyzx->say();
echo "<hr>";
$li = new Demo1();
$li->setName("lisi");
echo $li->say();