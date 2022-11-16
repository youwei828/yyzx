<?php
// 获取的值不存在使用双？返回值；
// 最大值100，最小值1
$total = 100;
echo min($total,max(1,$_GET['page']??1));