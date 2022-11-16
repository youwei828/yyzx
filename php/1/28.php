<?php
$dateTIme1 = new DateTime();
$dateTIme2 = new DateTime('2022-12-12 12:00:00');
// 计算两个时间之间的差值
$interval = $dateTIme1->diff($dateTIme2);
echo $interval->format('%a天');
echo $interval->format('%m月%d天%h小时');