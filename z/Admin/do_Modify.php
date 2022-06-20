<?php
include "../Database/Connection.php";

/*********用$_POST从前端获取数据********/
$Password = md5($_POST['Password']);
$newPassword = md5($_POST['newPassword']);
$rePassword = md5($_POST['rePassword']);

$sql = "SELECT * FROM admins WHERE password='$Password'";
$res = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($res);
$pass = $row['password'];

if ($pass){
    if ($newPassword == $rePassword){
        $sqll = "UPDATE admins SET password='$newPassword' WHERE password='$pass'";
        mysqli_query($conn,$sqll);
        session_start();
        $_SESSION["msg"] = "修改成功";
        header("refresh:0;url='Modify.php'");
    }else{
        session_start();
        $_SESSION["msg"] = "密码不一致";
        header("refresh:0;url='Modify.php'");
    }
}else{
    session_start();
    $_SESSION["msg"] = "原密码错误";
    header("refresh:0;url='Modify.php'");
}