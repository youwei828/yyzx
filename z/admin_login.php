<?php
/*********用$_POST从前端获取数据********/
$username = trim($_POST['username']);//trim() 函数移除字符串两侧的空白字符或其他预定义字符
$password = md5($_POST['password']);//md5()进行MD5算法加密
include 'Database/Connection.php';

$sql = "SELECT * FROM admins WHERE admin_name='$username' AND password='$password'";

$result = mysqli_query($conn,$sql);
$num = mysqli_num_rows($result);
if ($num){
    session_start();//启动session，为储存数据做准备
    $_SESSION['name'] = $username;//存储登录名到session
    $_SESSION["msg"] = "登陆成功";
    header("refresh:0;url='Admin/welcome.php'");
}else{
    session_start();
    $_SESSION["msg"] = "登陆失败";
    header("refresh:0;url='index.php'");
}