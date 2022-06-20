<?php
    include 'Database/Connection.php';
    session_start();
    $sql1 = "SELECT * FROM videotype WHERE typename='电影'";
    $result1 = mysqli_query($conn,$sql1);
    $row1 = mysqli_fetch_assoc($result1);
    $tid1 = $row1["tid"];

    $sql11 = "SELECT * FROM videos WHERE tid=$tid1 limit 6";
    $result11=mysqli_query($conn,$sql11);

    $sql2 = "SELECT * FROM videotype WHERE typename='电视剧'";
    $result2 = mysqli_query($conn,$sql2);
    $row2 = mysqli_fetch_assoc($result2);
    $tid2 = $row2["tid"];

    $sql22 = "SELECT * FROM videos WHERE tid=$tid2 limit 6";
    $result22 = mysqli_query($conn,$sql22);

    $sql3 = "SELECT * FROM videotype WHERE typename='动画片'";
    $result3 = mysqli_query($conn,$sql3);
    $row3 = mysqli_fetch_assoc($result3);
    $tid3 = $row3["tid"];

    $sql33 = "SELECT * FROM videos WHERE tid=$tid3 limit 6";
    $result33 = mysqli_query($conn,$sql33);

    $sql5 = "SELECT * FROM videos   ORDER BY hittimes DESC limit 4";
    $result5 = mysqli_query($conn,$sql5);
    $sql6 = "SELECT * FROM videos   ORDER BY downtimes DESC limit 4";
    $result6 = mysqli_query($conn,$sql6);
?>

<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>视频信息管理系统</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/offcanvas.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>
    <script src="Js/js/2.1.1.jquery.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="Js/js/3.7.2.html5shiv.min.js"></script>
    <script src="Js/js/1.4.2.respond.min.js"></script>
    <![endif]-->
</head>

<body>
<nav class="navbar navbar-fixed-top navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="index.php">首页</a></li>
                <?php
                $result = mysqli_query($conn,"SELECT * FROM videotype");
                while($row = mysqli_fetch_assoc($result)){
                    ?>
                    <li><a href="Home/list.php?tid=<?php echo $row["tid"]; ?>&page=1"><?php echo $row["typename"]; ?></a></li>
                    <?php
                }
                ?>

            </ul>
            <form class="navbar-form navbar-left" role="search" action="Home/search.php">
                <div class="form-group">
                    <input name="key" type="text" class="form-control" placeholder="Search" required>
                    <input name="page" type="text" value="1" style="display: none">
                </div>
                <button type="submit" class="btn btn-default">搜索</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <?php
                if(!isset($_SESSION["name"])){

                    ?>
                <li><a href="#" data-toggle="modal" data-target="#myModal" >登录/注册</a></li>
                    <div class="modal fade" id="myModal" style="margin-top: 100px" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                        &times;</button>
                                    <h4 class="modal-title" id="myModalLabel">
                                        Don't Wait, Login now!</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-8" style="border-right: 1px dotted #C2C2C2;padding-right: 30px;">
                                            <!-- Nav tabs -->
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a href="#Login" data-toggle="tab">登陆</a></li>
                                                <li><a href="#Registration" data-toggle="tab">注册</a></li>
                                            </ul>
                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="Login">
                                                    <!--登陆-->
                                                    <form role="form" class="form-horizontal" action="doLogin.php" method="post">
                                                        <div class="form-group">
                                                            <br>
                                                            <label class="col-sm-2 control-label">
                                                                账户</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" name="u" class="form-control" placeholder="请输入用户名..." />
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1" class="col-sm-2 control-label">
                                                                密码</label>
                                                            <div class="col-sm-10">
                                                                <input type="password" name="p" class="form-control" id="exampleInputPassword1" placeholder="请输入密码..." />
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-2">
                                                            </div>
                                                            <div class="col-sm-10">
                                                                <button type="submit" class="btn btn-primary btn-sm">
                                                                    登陆</button>
                                                                <a href="javascript:;">忘记密码?</a>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!--注册-->
                                                <div class="tab-pane" id="Registration">
                                                    <br>
                                                    <form role="form" class="form-horizontal" action="do_Register.php" method="post" enctype="multipart/form-data">

                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">
                                                                账户</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" name="username" placeholder="请输入用户名..." />
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">
                                                                密码</label>
                                                            <div class="col-sm-10">
                                                                <input type="password" class="form-control" name="password" placeholder="请输入密码..." />
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">
                                                                性别</label>
                                                            <div class="col-sm-10">
                                                                男&nbsp;<input type="radio" value="1" name="gender"/>
                                                                女&nbsp;<input type="radio" value="0" name="gender"/>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">
                                                                生日</label>
                                                            <div class="col-sm-10">
                                                                <input type="date" name="birthdate" class="form-control"  placeholder="请输入生日(xxxx-xx-xx)..." />
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">
                                                                邮箱</label>
                                                            <div class="col-sm-10">
                                                                <input type="email" name="email" class="form-control"  placeholder="请输入邮箱..." />
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">
                                                                头像</label>
                                                            <div class="col-sm-10">
                                                                <input type="file" name="pic" class="form-control"  placeholder="请选择你的头像..." />
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-2">
                                                            </div>
                                                            <div class="col-sm-10">
                                                                <button type="submit" class="btn btn-primary btn-sm">
                                                                    注册用户</button>
                                                                <button type="reset" class="btn btn-default btn-sm">
                                                                    重新填写</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="row text-center sign-with">
                                                <div class="col-md-12">
                                                    <h5 style="color: darkblue">
                                                        如果你是管理员，请从这里登陆！
                                                    </h5><br>

                                                    <form role="form" class="form-horizontal" action="admin_login.php" method="post">
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">
                                                            </label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" name="username" placeholder="管理员账号" />
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">
                                                            </label>
                                                            <div class="col-sm-10">
                                                                <input type="password" name="password" class="form-control" placeholder="管理员密码" />
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-2">
                                                            </div>
                                                            <div class="col-sm-10">
                                                                <button type="submit" class="btn btn-primary btn-sm">
                                                                    管理员登陆登陆</button>
                                                            </div>
                                                        </div>
                                                    </form>

                                                </div>
                                                <div class="col-md-12">
                                                    <div class="btn-group btn-group-justified">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }else{
                    ?>
                    <button type="button" class="btn btn-default" style="margin-top: 10px">欢迎：<?php echo $_SESSION["name"]; ?></button>
                    <a href="Logout.php" style="margin-top: 10px;">登出</a>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            个人中心
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#" data-toggle="modal" data-target="#login2">修改密码</a></li>
                            <li><a href="Home/Modify2.php">修改信息</a></li>
                            <li><a href="Home/myComment.php">留言修改</a></li>
                        </ul>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>
</nav>


<div class="modal fade" id="login2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">用户登陆</h4>
            </div>
            <div class="modal-body">

                <form class="form-horizontal"  action="doModify.php" method="post">
                    <div class="form-group">
                        <label for="username" class="col-md-3 control-label">原密码</label>
                        <div class="col-md-6">
                            <input type="password" class="form-control" id="username" name="password" placeholder="原密码">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-md-3 control-label">新密码</label>
                        <div class="col-md-6">
                            <input type="password" class="form-control" id="password" name="newPassword" placeholder="新密码">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-md-3 control-label">重复新密码</label>
                        <div class="col-md-6">
                            <input type="password" class="form-control" id="password" name="rePassword" placeholder="新密码">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-6">
                            <input type="submit" class="btn btn-default" value="修改">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            </div>
        </div>
    </div>
</div>

﻿
<div class="container">
    <!--幻灯片开始-->
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" style="width: auto;margin-left: -70px;margin-right: -70px;margin-top: -40px">
            <div class="item active" style="height: 300px">
                <img src="images/banner1.png" class="img-responsive" alt="img4" style="width:1600px;height: 300px">


            </div>
            <div class="item" style="height: 300px">
                <img src="images/banner2.png" class="img-responsive" alt="img2" style="width:1600px;height: 300px">


            </div>
            <div class="item" style="height: 300px">
                <img src="images/banner3.png" class="img-responsive" alt="img3" style="width:1600px;height: 300px">


            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev" style="margin-left: -70px;margin-right: -70px">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next" style="margin-left: -70px;margin-right: -70px">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>
    <!--幻灯片结束-->



    <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">


            <div class="row text-center">
                <div class="col-xs-12 col-lg-12 mlist">
                    <h2>电影</h2>
                    <ul class="list-inline row text-center">
                        <?php
                        while ($row1 = mysqli_fetch_assoc($result11)) {
                            ?>
                            <li class="col-xs-4 col-sm-3 col-lg-2">
                                <a href="Home/show.php?vid=<?php echo $row1["vid"]; ?>&page=1">
                                    <img src="posters/<?php echo "..".$row1["pic"]; ?>" class="responsive img-thumbnail"/>
                                    <p><?php echo $row1["videoname"]; ?></p>
                                </a>
                            </li>

                            <?php
                        }
                        ?>
                    </ul>
                    <p><a class="btn btn-default" href="Home/list.php?tid=<?php echo $tid1 ?>&page=1" role="button">更多 &raquo;</a></p>
                </div>
                <!--/.col-xs-6.col-lg-4-->

            </div>
            <!--/row-->
            <div class="row text-center">
                <div class="col-xs-12 col-lg-12 mlist">
                    <h2>电视剧</h2>
                    <ul class="list-inline row text-center">
                        <?php
                        while ($row2 = mysqli_fetch_assoc($result22)) {
                            ?>
                            <li class="col-xs-4 col-sm-3 col-lg-2">
                                <a href="Home/show.php?vid=<?php echo $row2["vid"]; ?>&page=1">
                                    <img src="./posters/<?php echo "..".$row2["pic"]; ?>" class="responsive img-thumbnail"/>
                                    <p><?php echo $row2["videoname"]; ?></p>
                                </a>
                            </li>

                        <?php
                        }
                        ?>
                    </ul>
                    <p><a class="btn btn-default" href="Home/list.php?tid=<?php echo $tid2 ?>&page=1" role="button">更多 &raquo;</a></p>
                </div>
                <!--/.col-xs-6.col-lg-4-->

            </div>
            <!--/row-->
            <div class="row text-center">
                <div class="col-xs-12 col-lg-12 mlist">
                    <h2>动画片</h2>
                    <ul class="list-inline row text-center">
                        <?php
                        while ($row3 = mysqli_fetch_assoc($result33)) {
                            ?>
                            <li class="col-xs-4 col-sm-3 col-lg-2">
                                <a href="Home/show.php?vid=<?php echo $row3["vid"]; ?>&page=1">
                                    <img src="./posters/<?php echo "..".$row3["pic"]; ?>" class="responsive img-thumbnail"/>
                                    <p><?php echo $row3["videoname"]; ?></p>
                                </a>
                            </li>

                            <?php
                        }
                        ?>
                    </ul>
                    <p><a class="btn btn-default" href="Home/list.php?tid=<?php echo $tid3 ?>&page=1" role="button">更多 &raquo;</a></p>
                </div>
                <!--/.col-xs-6.col-lg-4-->

            </div>
            <!--/row-->
        </div>
        <!--/.col-xs-12.col-sm-9-->

        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
            <div class="list-group text-center">
                <h2 style="color:black;" >点击排行</h2>
                <ul class="list-inline row text-center">
                    <?php
                    while($row5 = mysqli_fetch_assoc($result5)){
                        ?>
                        <li class="col-xs-12 col-lg-6">
                            <a href="Home/show.php?vid=<?php echo $row5["vid"]; ?>&page=1">
                                <img src="./posters/<?php echo "..".$row5["pic"]; ?>" class="responsive img-thumbnail"/>
                                <p><?php echo mb_substr($row5["videoname"],0,6,'utf-8'); ?></p>
                            </a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>

            <div class="list-group text-center">
                <h2 style="color:black;" >下载排行</h2>
                <ul class="list-inline row text-center">
                    <?php
                    while($row6 = mysqli_fetch_assoc($result6)){
                        ?>
                        <li class="col-xs-12 col-lg-6">
                            <a href="Home/show.php?vid=<?php echo $row6["vid"]; ?>&page=1">
                                <img src="./posters/<?php echo "..".$row6["pic"]; ?>" class="responsive img-thumbnail"/>
                                <p><?php echo mb_substr($row6["videoname"],0,6,'utf-8'); ?></p>
                            </a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>

        </div>
        <!--/.sidebar-offcanvas-->
    </div>
    <!--/row-->



</div>
<!--/.container-->
<hr>

<footer>
    <p>视频网站&copy; PHP应用开发课程 2016-2017</p>
    <p>此网站源码开源&copy; <a href="https://gitee.com/jollyson/NeuVideo#neuvideo">点击进入开源项目Star</a></p>
</footer>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="assets/js/bootstrap.min.js"></script>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="assets/js/ie10-viewport-bug-workaround.js"></script>
<script>layer.msg('<?php echo $_SESSION["msg"]; ?>');</script>
<?php unset($_SESSION['msg']); ?>
</body>
</html>




