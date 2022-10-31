<?php
// 递归函数实现阶乘，注意要在某个时间点退出递归
function recursive($num){
    if($num==1){
        return $num;
    }
    return $num*recursive($num-1);
}
echo recursive(6);