<?php
    include '../Database/Connection.php';
?>

<?php

    $typename = $_POST["typename"];
    $sql = "SELECT * FROM videotype WHERE typename='$typename'";
    $res = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($res);
    if($num != 0){
        session_start();
        $_SESSION["msg"] = "该视频类型已存在";
        header("refresh:1;url='typeAdd.php'");
    }
    else{
    	$sql = "INSERT INTO videotype VALUES(null,'$typename')";
    
        $res = mysqli_query($conn,$sql);
        if($res==1){
            session_start();
            $_SESSION["msg"] = "视频类型添加成功";
            header("refresh:0;url='typeAdd.php'");
        }
        else{
            session_start();
            $_SESSION["msg"] = "视频类型添加失败";
            header("refresh:0;url='typeAdd.php'");
        }
    }
?>