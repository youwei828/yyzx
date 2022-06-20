<?php
include 'Database/Connection.php';//连接数据库

/*********用$_POST从前端获取数据********/
$username=trim($_POST['username']);//trim() 函数移除字符串两侧的空白字符或其他预定义字符
$password=md5($_POST['password']);//md5()进行MD5算法加密
$gender=$_POST['gender'];
$email=$_POST['email'];
$birthdate=$_POST['birthdate'];

/*********判定注册的用户不能重名********/
$sql = "SELECT * FROM users where uname ='$username'";
$result = mysqli_query($conn,$sql);
$num = mysqli_num_rows($result);
if ($num != 0){
    session_start();
    $_SESSION["msg"] = "该用户名已被注册，请返回重新注册";
    exit();
}else{
    if ($_FILES["pic"]["error"] > 0){
        switch ($_FILES["pic"]["error"]){
            case 1:
                session_start();
                $_SESSION["msg"] = "上传的文件超过了PHP服务器规定的限制值！";
                break;
            case 3:
                session_start();
                $_SESSION["msg"] = "部分文件上传！";
                break;
            case 4:
                session_start();
                $_SESSION["msg"] = "没有选择任何头像文件！";
                break;
            default :
                session_start();
                $_SESSION["msg"] = "未知错误！";
                break;
        }
    }
}
/*********获取文件的后缀名********/
$temp = explode(".", $_FILES["pic"]["name"]);//explode() 函数把字符串打散为数组。
$suffix = $temp[count($temp) - 1];

/*********判断文件类型是否图片********/
$type = array("gif", "jpeg", "jpg", "png");//允许的图片类型
if (!in_array($suffix,$type)){
    //in_array() 函数搜索数组中是否存在指定的值。
    session_start();
    $_SESSION["msg"] = "你的文件类型为{$suffix}!文件类型不正确，请上传gif/jpeg/jpg/png格式的图片。";
    header("refresh:0;url='index.php'");
}

/*********指定头像的存放路径和文件名********/
$file_path = "./images/";
$pic_name = date("YmdHis").rand(10000,99999).".".$suffix;
if (!move_uploaded_file($_FILES["pic"]["tmp_name"], $file_path.$pic_name)){
    //move_uploaded_file() 函数将上传的文件移动到新位置。
    session_start();
    $_SESSION["msg"] = "图片上传到服务器失败，请重试！";
    header("refresh:0;url='index.php'");
}
/*********执行往数据库写的操作********/
$do_sql="INSERT INTO users VALUES (NULL,'$username','$password',$gender,'$birthdate','$pic_name','$email')";
$do_result = mysqli_query($conn,$do_sql) or die("注册时插入数据失败： " . $conn->connect_error);
$lines = mysqli_affected_rows($conn);
if ($lines != 1){
    session_start();
    $_SESSION["msg"] = "注册失败！";
    header("refresh:0;url='Register.html'");
}else{
    session_start();
    $_SESSION["msg"] = "注册成功！";
    header("refresh:0;url='index.php'");
}