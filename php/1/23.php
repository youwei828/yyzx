<?php
// 递归数组
$database = ['host'=>'localhoST','port'=>'UTUUTUii',['UseR'=>'youwei']];
function array_change_value( array $data, int $case=CASE_UPPER):array{
    array_walk_recursive($data,function(&$value,$key,$case){
        $action = $case==CASE_UPPER?'strtoupper':'strtolower';
        $value = $action($value);
    },$case);
    return $data;
}
print_r(array_change_value($database));