<?php
    session_start();
    include '../Database/Connection.php';
    $videoname = trim($_POST["videoname"]);
    $videotype = $_POST["videotype"];
    $videointro = $_POST["videointro"];
    if ($videotype==null){
        $_SESSION["msg"] = "必须选择一个视频类型";
        header("refresh:0;url='VideoAdd.php'");
    }else{
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
        //视频
        if($_FILES['address']['error']>0){
            switch ($_FILES['address']['error']) {
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
            $arr2 = array('mp4','avi','flv','mpeg');
            $a2 = explode('.', $_FILES['address']['name']);
            $ex2 = $a2[count($a2)-1];//扩展名
            if(!in_array($ex2, $arr2)){
                echo "文件类型不正确，只能选择mp4/
                        avi/flv/mpeg等类型的视频文件";
                exit;
            }
            $fname2 = date("YmdHis").rand(100,999).".".$ex2;

            move_uploaded_file($_FILES['address']['tmp_name'],"../videos/$fname2");
            $address2 = "/videos/".$fname2;
        }
        $name = (string)$_SESSION['name'];
        $time = date('Y-m-d H:i:s', time());
        $sql = "INSERT INTO videos VALUES
                (null,'$videoname','$videotype','$pic','$videointro','$time','$name',0,0,'$address2')";
        $res = mysqli_query($conn,$sql);

        if($res == 1){
            $_SESSION["msg"] = "视频类型添加成功";
            header("refresh:0;url='VideoAdd.php'");
        }
        else{
            $_SESSION["msg"] = "视频添加失败";
            header("refresh:0;url='VideoAdd.php'");
        }
    }