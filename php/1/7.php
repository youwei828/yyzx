<?php
// 文件引入
$name = 'youwie';
// include './7.html';
// include相当与代码粘贴
// 变量可以在被引入文件使用
// 可以进行语句判断，如果不存在，就执行另一个包含的文件
// if (!@include '2.html') {
//     include '1.html';
// }
// include_once  只加载一次



// require  强加载，必须加载，
require('./7.html');

// require_once  只加载一次，防止文件多次加载