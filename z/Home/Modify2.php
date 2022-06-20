<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>视频信息管理系统</title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../assets/css/offcanvas.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <script src="../assets/js/ie-emulation-modes-warning.js"></script>
    <script src="../Js/js/2.1.1.jquery.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="../Js/js/3.7.2.html5shiv.min.js"></script>
    <script src="../Js/js/1.4.2.respond.min.js"></script>
    <![endif]-->
</head>
<body>

<?php
    session_start();
    $u = $_SESSION['name'];
    include '../Database/Connection.php';
    $sql = "SELECT * FROM users WHERE uname='$u'";
    $res = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($res);
?>
<form class="form-horizontal"  action="../Admin/doUserEdit.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="uid" value="<?php echo $row['uid'] ?>">
    <table class="col-md-12 table table-striped" align="center" style="margin: 0px">

        <tr>
            <td>用户名</td>
            <td><input type="text" name="username" value="<?php echo $row['uname'] ?>"></td>
        </tr>
        <tr>
            <td>性别</td>
            <td>
                <input type="radio" name="gender" value="0" <?php if ($row['gender']==0) echo 'checked'?>>男
                <input type="radio" name="gender" value="1" <?php if ($row['gender']==1) echo 'checked'?>>女
            </td>
        </tr>
        <tr>
            <td>生日</td>

            <td><input type="date" name="birthdate" value=<?php echo $row['birthdate'] ?> >
            </td>
        </tr>
        <tr>
            <td>头像</td>
            <td>
                <div style="margin-left: 0px">
                    原头像 <img src="../images/<?php echo $row['pic'] ?>" width="90px"
                             height="90px" style="margin-top: 0px;border-radius: 10px">
                    <input type="file" name="pic" align="left" style="margin-top: 10px;width: 300px">
                </div>

            </td>
        </tr>
        <tr>
            <td>邮箱</td>
            <td><input type="email" name="email" value="<?php echo $row['email'] ?>" >
            </td>
        </tr>
        <tr >
            <td colspan="2"> <input type="submit" class="btn btn-default" value="更新用户信息"></td>
            <a href="../index.php">返回主页不修改</a>

        </tr>
    </table>
</body>
</html>