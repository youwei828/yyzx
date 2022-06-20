<?php
include "../Database/Connection.php";

/*********用$_POST从前端获取数据********/
$Password = md5($_POST['password']);
$newPassword = md5($_POST['newPassword']);
$rePassword = md5($_POST['rePassword']);
session_start();
$u = $_SESSION['name'];
$sql = "SELECT * FROM users WHERE password='$Password' AND uname='$u'";
$res = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($res);
$pass = $row['password'];

if ($pass){
    if ($newPassword == $rePassword){
        $sqll = "UPDATE users SET password='$newPassword' WHERE password='$pass' AND uname='$u'";
        mysqli_query($conn,$sqll);
        echo "修改成功";
//        header("refresh:1;url='index.php'");
    }else{
        echo "密码不一致";
//        header("refresh:1;url='Modify.php'");
    }
}else{
    echo "原密码错误";
//    header("refresh:1;url='Modify.php'");
}