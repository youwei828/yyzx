
<?php
    session_start();
    include '../Database/Connection.php';
    $videoname = trim($_POST["videoname"]);
    $videotype = $_POST["videotype"];
    $vid = $_POST["vid"];
    $videointro = $_POST["videointro"];

//有图片更新图片和页面上的信息，没有图片就不更新图片，更新其他信息
if($_FILES["pic"]['size']<=0 && $_FILES["address"]['size']<=0) {
    /*不更新任何文件*/
    include('VideoFile/file00.php');
}elseif($_FILES["pic"]['size']>0 && $_FILES["address"]['size']<=0) {//此处就要这样判断，不能简单用else
    /*更新海报，不更新视频*/
    include('VideoFile/file10.php');
}elseif($_FILES["pic"]['size']<=0 && $_FILES["address"]['size']>0) {//此处就要这样判断，不能简单用else
    /*不更新海报，更新视频*/
    include('VideoFile/file01.php');
}elseif($_FILES["pic"]['size']>0 && $_FILES["address"]['size']>0) {//此处就要这样判断，不能简单用else
    /*更新海报和更新视频*/
    include('VideoFile/file11.php');
}

$res = mysqli_query($conn,$sql);

    if($res == 1){
        $_SESSION["msg"] = "视频信息更新成功";
        header("refresh:0;url='VideoList.php?page=1'");
    }
    else{
        $_SESSION["msg"] = "视频信息更新失败";
        header("refresh:0;url='VideoList.php?page=1'");
    }















