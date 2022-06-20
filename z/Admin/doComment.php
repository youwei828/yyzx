<?php
    include '../Database/Connection.php';

    $vid1 = $_POST["vid"];
    session_start();
    if(isset($_SESSION["name"])){
        $uname = $_SESSION["name"];

        $resultComment = mysqli_query($conn,"SELECT uid FROM users WHERE uname='$uname'");
        $rowComment = mysqli_fetch_assoc($resultComment);
        $uid = $rowComment["uid"];
    }

    $content = $_POST["content"];
    $time = date('Y-m-d H:i:s', time());
    $sql2 = "INSERT INTO comments VALUES (null,'$content','$time',$uid,$vid1)";

    $result2 = mysqli_query($conn,$sql2);
    if($result2>0){
        $_SESSION["msg"] = "留言成功！";
        header("refresh:0;url='../Home/show.php?vid=$vid1&page=1'");
    }
    else{
        $_SESSION["msg"] = "留言失败！";
        header("refresh:3;url='../Home/show.php?vid=$vid1&page=1'");
    }
?>