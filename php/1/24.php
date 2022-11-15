<?php
// // 使用serialize序列化操作与var_export文件持久化
// $database = ['host'=>'localhoST','port'=>'UTUUTUii',['UseR'=>'youwei']];
// // print_r($database);
// // var_export($database);
// $config = var_export($database,true);
// // 在本目录创建一个文件，并写入内容
// file_put_contents('24database.php',
//     '<?php return '.$config.';'
//     );

$config = include '24database.php';
print_r($config);