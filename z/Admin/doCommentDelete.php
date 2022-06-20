<?php
    include '../Database/Connection.php';
    $cid = $_GET["cid"];
    $sql = "DELETE FROM comments WHERE cid=$cid";
    $result = mysqli_query($conn,$sql);
    if($result){
        session_start();
        $_SESSION["msg"] = "删除留言成功";
        header("refresh:0;url='commentList.php?page=1'");
     }else{
        session_start();
        $_SESSION["msg"] = "删除留言失败";
        header("refresh:0;url='commentList.php?page=1'");
     }

