<?php
    include '../Database/Connection.php';
    $tid = $_GET["tid"];

    $sql = "SELECT * FROM videos WHERE tid='$tid'";
    $res = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($res);
    if($num > 0){
        session_start();
        $_SESSION["msg"] = "该视频类型下有视频，无法删除";
        header("refresh:0;url='TypeList.php'");
    }
    else{
        $sql2 = "DELETE FROM videotype WHERE tid=$tid";

        $res2 = mysqli_query($conn,$sql2);
        if($res2 == 1){
            session_start();
            $_SESSION["msg"] = "视频类型删除成功";
            header("refresh:0;url='TypeList.php'");
        }
        else{
            session_start();
            $_SESSION["msg"] = "视频类型删除失败";
            header("refresh:0;url='TypeList.php'");
        }
    }
?>

 