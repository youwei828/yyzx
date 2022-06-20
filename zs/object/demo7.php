<?php
// /**
//  *CreateBy:PhpStrom
//  *User:youwei
//  *Date:2022/6/13/013
//  *Time:12:47
//  */
//
// trait Log{
//     protected function save(){
//         return __METHOD__;
//     }
// }
//
//
// trait Comment{
//     public function save(){
//         return __METHOD__;
//     }
// }
//
// class Topic {
//     use Log, Comment{
//         Log::save instanceof Comment;   //使用Log替换掉了Comment
//         Log::save as protected;         //将这个方法保护起来
//         Comment::save as send;          //如果使用Comment起个别名
//     }
// }
//
// $total = new Topic();
// echo $total->send();
// echo "<hr>";
// // echo $total->total();