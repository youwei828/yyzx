<?php
include '../Database/Connection.php';
$uid = $_POST['uid'];
$username = $_POST['username'];
$gender = $_POST['gender'];
$birthdate = $_POST['birthdate'];
$email = $_POST['email'];

//有图片更新图片和页面上的信息，没有图片就不更新图片，更新其他信息
if($_FILES["pic"]['size']>0) {
    if ($_FILES['pic']['error'] > 0) {
        switch ($_FILES['pic']['error']) {
            case 1:
                echo "文件过大";
                break;
            case 3:
                echo "部分未上传";
                break;
            default:
                break;
        }
    } else {

        $arr = explode(".", $_FILES["pic"]["name"]);//explode() 函数把字符串打散为数组。

        $extension = end($arr);
        $allowedExts = array("gif", "jpeg", "JPG", "png", "jpg");
        if (!in_array($extension, $allowedExts)) {
            echo "文件格式错误";
            exit;
        }
        $filepath = "../images/";
        $name = date("YmdHis") . rand(10000, 99999) . "." . $extension;
        if (move_uploaded_file($_FILES["pic"]["tmp_name"], "$filepath" . $name)) {
            $sql1 = "SELECT * FROM users WHERE uid='$uid'";
            $result = mysqli_query($conn, $sql1);
            $row1 = mysqli_fetch_assoc($result);
            $filename = $filepath . $row1['pic'];

            if (file_exists($filename)) {
                unlink($filename);
            }
            $sql2 = "UPDATE users SET uname='$username',gender='$gender',birthdate='$birthdate',email='$email',pic='$name' WHERE uid='$uid'";
            $ress = mysqli_query($conn, $sql2);
        } else {
            echo "更新图片失败";
            exit;
        }
    }
}elseif($_FILES["pic"]['size']<=0){//此处就要这样判断，不能简单用else
    $sql2 = "UPDATE users SET uname='$username',gender='$gender',birthdate='$birthdate',email='$email' WHERE uid='$uid'";
    $ress = mysqli_query($conn, $sql2);
}

$num = mysqli_affected_rows($conn);

if($num == 0){
    echo "没有修改任何信息或者更新失败";
    echo "正在跳回主页...";
    header("refresh:1;url='../index.php'");
}else{
    echo "更新成功";
    echo "正在跳回主页...";
    header("refresh:1;url='../index.php'");
}








