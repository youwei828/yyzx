<?php
$config = include '24database.php';
// 序列化
$ser =  serialize($config);

// 反序列化
print_r( unserialize($ser));
print_r( unserialize($ser)['host']);