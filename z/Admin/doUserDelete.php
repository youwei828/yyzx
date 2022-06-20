<?php
    $uid = $_GET['uid'];

    include "../Database/Connection.php";

    $sql = "SELECT * FROM users WHERE uid='$uid'";

    $res = mysqli_query($conn,$sql);

    $row = mysqli_fetch_assoc($res);

    $filename = "../images/".$row['pic'];

    if (file_exists($filename)){
        unlink($filename);//unlink() 函数删除文件。
    }

    $date = "DELETE  FROM users WHERE uid='$uid'";

    $res1 = mysqli_query($conn,$date);

    if (mysqli_affected_rows($conn)){
        session_start();
        $_SESSION["msg"] = "删除成功";
        header("refresh:0;url='UsersList.php?page=1'");
    }else{
        session_start();
        $_SESSION["msg"] = "删除失败";
        header("refresh:0;url='UsersList.php?page=1'");
}
?>

