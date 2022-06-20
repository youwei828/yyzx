<?php
/**
 *CreateBy:PhpStrom
 *User:youwei
 *Date:2022/6/14/014
 *Time:9:58
 */
class Person{
    //下面是封装的私有成员
    private $name;
    private $sex;
    private $age;

    //__get获取私有属性
    public function __get($propertyName){
        echo "在获取私有属性时，自动调用了这个__get方法<hr>";
        if(isset($this->$propertyName)){
            return $this->$propertyName;
        }else{
            return null;
        }
    }

    //__set设置私有属性
    public function __set($propertyName, $value)
    {
        echo "在设置私有属性时直接调用这个__set方法<hr>";
        $this->$propertyName = $value;
    }
}
$user = new Person();
//为私有属性赋值操作时，会直接调用set
$user->name = 'youwei';
$user->sex = 'male';
$user->age = '21';
//获取私有属性值时，会直接调用get
echo $user->name ."这是你的名字<hr>";
echo $user->sex ."这是你的性别<hr>";
echo $user->age ."这是你的年龄<hr>";









