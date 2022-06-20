<?php
    include '../Database/Connection.php';

$vid = $_GET['vid'];
$sql = "select * from videos WHERE vid='$vid'";

$result = mysqli_query($conn,$sql);

$row = mysqli_fetch_assoc($result);

$filename1 = "..".$row['pic'];
$filename2 = "..".$row['address'];

if (file_exists($filename1) && file_exists($filename2)){
    unlink($filename1);
    unlink($filename2);
    $res = mysqli_query($conn,"DELETE  FROM videos WHERE vid='$vid'");
    if ($res){
        session_start();
        $_SESSION["msg"] = "删除成功";
        header("refresh:0;url='VideoList.php'");
    }else{
        session_start();
        $_SESSION["msg"] = "删除失败";
        header("refresh:0;url='VideoList.php?page=1'");
    }

}else{
    session_start();
    $_SESSION["msg"] = "删除失败";
    header("refresh:0;url='VideoList.php?page=1'");
}
