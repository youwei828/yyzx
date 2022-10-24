<?php
    $string = 'youwei';
    echo strlen($string);
    echo'<hr/>';
    // 截取变量的空格  使字符串的长度变少
    // 第二个参数删除单个字母
    echo trim($string,' wei');
    echo'<hr/>';
    // 只删除右边 左边ltrim
    echo rtrim($string,' ');
    echo'<hr/>';
    // 转小写
    $str1 = 'YOUwei';
    echo'<hr/>';
    echo strtolower($str1);
    // 转大写 strtoupper
    // 单词首字母变大写
    echo'<hr/>';
    echo ucfirst($string);
    // 每个单词首字母大写  第二个参数为分隔符
    echo'<hr/>';
    echo ucwords($string,'|');
    // 把一个字符串哈希成为32位字符
    echo'<hr/>';
    echo md5($string);
    // 拆分字符串成数组 按点拆
    echo'<hr/>';
    print_r( explode('.','you.wei.de.xue.xi'));

    // 合并 第一个参数是以什么来合并，可以是空
    echo'<hr/>';
    echo( implode('',['you','wei','de','xue','xi']));
    echo'<hr/>';

    // 从某个索引往后截取字符串
    echo substr('you.wei.de.xue.xi',0,-4);
    echo'<hr/>';
    // 截取中文可能会有问题
    echo mb_substr('大家好，这是我的php',0,5,'utf-8');


    