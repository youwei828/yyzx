<?php
// // 向上取整，向下取整
// echo ceil(1.2);
// echo floor(2.5);
// // 取最大值、最小值
// echo max(2,3);
// echo min(1,2);
// // 四舍五入
// echo round(1.3);
// // 随机数
// echo mt_rand(1,999);

// 随机生成验证码
function outCode(int $len=5):string{
    $str = '1234567890asdfghjkl';
    $code = '';
    for ($i=0; $i < $len; $i++) { 
        $index = mt_rand(0,strlen($str)-1);
        $code = $code.$str[$index];
    }
    return $code;
}
echo outCode();