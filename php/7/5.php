<?php
// trait变相实现多继承

use Comment as GlobalComment;
use Log as GlobalLog;
use Topic as GlobalTopic;

/**
 * 日志
 */
trait Log
{
    public function save(){
        echo __METHOD__;
    }
}

/**
 * 评论
 */
trait Comment
{
    public function total(){
        echo __METHOD__;
    }
}

// 实现多继承使用use
class Topic{
    use GlobalLog,GlobalComment;
}

$topic = new GlobalTopic;
$topic -> save();
$topic -> total();