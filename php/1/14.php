<?php
$arr=['lisi','wanhwu'];
// 通过key可以得到索引  通过value可以得到value
echo key($arr);
echo current($arr);
// 通过next往下取 并返回当前元素的值
echo '<hr/>';
echo next($arr);
// echo key($arr);
// echo current($arr);
// 通过prev往下取 并返回当前元素的值
echo prev($arr);