<?php
    include '../Database/Connection.php';
    $typename = $_POST["typename"];
    $tid = $_POST["tid"];

    //把注册信息添加到用户名
    $sql = "SELECT * FROM videotype WHERE typename='$typename'";
    $res = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($res);
    if($num != 0){
        session_start();
        $_SESSION["msg"] = "该视频类型已存在";
        header("refresh:0;url='TypeList.php'");
    }
    else{
        $sql = "UPDATE videotype SET typename='$typename' WHERE tid=$tid";
        $res = mysqli_query($conn,$sql);
        if($res == 1){
            session_start();
            $_SESSION["msg"] = "视频类型修改成功";
            header("refresh:0;url='TypeList.php'");
        }
        else{
            session_start();
            $_SESSION["msg"] = "视频类型修改失败";
            header("refresh:0;url='TypeList.php'");
        }
    }

?>

