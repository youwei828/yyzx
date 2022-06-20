<?php
/**
 *CreateBy:PhpStrom
 *User:youwei
 *Date:2022/6/13/013
 *Time:12:36
 */
trait Log{
    public function save(){
        return __METHOD__;
    }
}

trait Comment{
    public function total(){
        return __METHOD__;
    }
}

class Site{
    public function total(){
        return __METHOD__;
    }
}

class Topic extends Site{
    use Log, Comment;                   //Comment >>>>  Site
}

$total = new Topic();
echo $total->save();
echo "<hr>";
echo $total->total();
