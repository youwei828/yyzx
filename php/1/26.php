<?php
$config = include '24database.php';
function cache(string $name,array $data=null){
    $file = 'cache'.DIRECTORY_SEPARATOR.md5($name).'.php';
    if(is_null($data)){
        // 取缓存
        $content = is_file($file)? file_get_contents($file):null;
        return unserialize($content)?:null;
    }else{
        // 写缓存
        return file_put_contents($file,serialize($data));
    }
}
print_r(cache('database'));