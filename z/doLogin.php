<?php
    include 'Database/Connection.php';
    $u = $_POST["u"];
    $p = $_POST["p"];
    $v = $_POST["vid"];

    $login = mysqli_query($conn,
        "SELECT * FROM users WHERE uname='$u' AND password=md5('$p')");
    $num = mysqli_num_rows($login);
    if($num>0){
        session_start();
        $_SESSION["name"] = $u;
        if ($v != null){
            session_start();
            $_SESSION["msg"] = "登录成功！";
            header("location:Home/show.php?vid=$v&page=1");
        }else{
            session_start();
            $_SESSION["msg"] = "登录成功！";
            header("refresh:0;url='index.php'");
        }

        }
    else{
        session_start();
        $_SESSION["msg"] = "登录失败！";
        header("refresh:0;url='index.php'");
    }
?>