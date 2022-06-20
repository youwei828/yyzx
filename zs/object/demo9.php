<?php
/**
 *CreateBy:PhpStrom
 *User:youwei
 *Date:2022/6/13/013
 *Time:13:50
 */
abstract class Query{
    public function select(){
        $this->rceord(['name'=>'youwei' , 'age'=>'21']);    //调用record函数，写入$data数据
    }
    abstract protected function rceord(array $data);
}

class Model extends Query{
    protected $filed = [];     //默认值为空的数组

    public function all()
    {
        $this->select();
        return $this->filed;
    }

    protected function rceord(array $data)    //$data已经通过继承有了查询到的值
    {
        // TODO: Implement reord() method.  再将$data数组的数据赋值给filed
        $this->filed = $data;
    }

    public function __get($name){

        if(isset($this->filed[$name])){
            return $this->filed[$name];
        }
        throw new Exception('参数错误');
    }
}

try {

    $user = new Model();
    print_r($user->all());
    echo $user->name;
} catch (Exception $exception) {
    echo $exception->getMessage();
}


