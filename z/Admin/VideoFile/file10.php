<?php

/*更新海报，不更新视频*/
    if($_FILES['pic']['error']>0){
        switch ($_FILES['pic']['error']) {
            case '1':
                echo "超过php.ini的设置";
                break;
            case '2':
                echo "超过HTML表单隐藏域的设置";
                break;
            default:
                echo "其他错误";
                break;
        }
        exit;
    }else{
        $arr = array('jpg','gif','jpeg','png');
        $a = explode('.', $_FILES['pic']['name']);
        $ex = $a[count($a)-1];//扩展名
        if(!in_array($ex, $arr)){
            echo "文件类型不正确，只能选择jpg/
                    gif/jpeg/png等类型的文件";
            exit;
        }
        $fname = date("YmdHis").rand(100,999).".".$ex;

        move_uploaded_file($_FILES['pic']['tmp_name'],"../posters/$fname");
        $pic = "/posters/".$fname;
    }
    $name = $_SESSION['name'];
    $time = date('Y-m-d H:i:s', time());
    $sql = "UPDATE videos SET
        videoname='$videoname',tid='$videotype',pic='$pic',intro='$videointro',uploaddate='$time',uploadadmin='$name',hittimes=0,downtimes=0
        WHERE vid=$vid";
