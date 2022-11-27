<?php

use Comment as GlobalComment;
use Log as GlobalLog;
use Topic as GlobalTopic;

trait Log{
    public function save(){
        echo __METHOD__;
    }
}

trait Comment{
    public function save(){
        echo __METHOD__;
    }
}

class Topic{
    use GlobalLog,
        GlobalComment{
            //替换重名方法
            GlobalLog::save insteadof GlobalComment;
            // 给重名方法取别名
            GlobalComment::save as  send;
            // 也可以将方法保护
            // GlobalLog::save as protected;
            // GlobalComment::save as protected send;
        }
}

(new GlobalTopic)->save();
(new GlobalTopic)->send();