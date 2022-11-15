<?php
// 递归算法改变多为数组建名
$database = ['host'=>'localhost','port'=>'2323',['UseR'=>'youwei']];
function you_array_change_key_case(array $data,int $type=CASE_UPPER)
    :array{
    foreach($data as $key=>$value):
        $action = $type==CASE_UPPER?"strtoupper":"strtolower";
        // 删除老的数据追加键名变大写的数据
        unset($data[$key]);
        $data[$action($key)]=is_array($value)?you_array_change_key_case($value, $type):$value;
    endforeach;
    // 做类型约束，必须有返回值
    return $data;
}
print_r(you_array_change_key_case($database));