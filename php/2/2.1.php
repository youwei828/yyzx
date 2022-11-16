<?php
function upload(){
    if(is_uploaded_file($_FILES['up']['tmp_name'])){
        $path = 'upload'.DIRECTORY_SEPARATOR.$_FILES['up']['name'];
        if(move_uploaded_file($_FILES['up']['tmp_name'],$path)){
            return $path;
        }
    }
}

upload();
print_r($_FILES);