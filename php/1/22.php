<?php
// 递归算法改变多维数组键值
$database = ['host'=>'localhoST','port'=>'UTUUTUii',['UseR'=>'youwei']];
function you_array_change_value_case(array $data, int $type=CASE_UPPER)
:array {
        $action = $type==CASE_UPPER?"strtoupper":"strtolower";
        foreach($data as $key=>$value):
            // 根据type的类型定义变量函数
            $data[$key]=is_array($value)?you_array_change_value_case($value,$type):$action($value);
        endforeach;
    return $data;
}
print_r(you_array_change_value_case($database));