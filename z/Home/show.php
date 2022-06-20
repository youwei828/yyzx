<?php
    include '../Database/Connection.php';
    session_start();
    $temp1 = explode("=", $_SERVER['REQUEST_URI']);//获取URL
    $suffix1 = explode("&", $temp1[count($temp1) - 2]);
    $vid = $suffix1[count($suffix1) - 2];

    $result_ = mysqli_query($conn,"SELECT * FROM videos WHERE vid=$vid");
    $detail = mysqli_fetch_assoc($result_);

    //留言
    $sql = "SELECT * FROM comments WHERE vid=$vid ORDER BY cid DESC";
    $res = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($res);

    if (!isset($_GET['page'])){
        $page = 1;
    }else{
        $page = $_GET['page'];
    }
    //分移量
    $rowpage = 10;

    if ($num%$rowpage == 0){
        $totalpages = $num/$rowpage;
    }else{
        $totalpages = ceil($num/$rowpage);
    }
    $start = ($page-1)*$rowpage;
    $sql = "SELECT * FROM comments WHERE vid=$vid ORDER BY cid DESC LIMIT $start,$rowpage";

    $result0 = mysqli_query($conn,$sql);

    //点击次数
    $hit = $detail["hittimes"]+1;
    mysqli_query($conn,"UPDATE videos SET hittimes=$hit WHERE vid=$vid");
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
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../assets/css/offcanvas.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <script src="../assets/js/ie-emulation-modes-warning.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="../Js/js/3.7.2.html5shiv.min.js"></script>
    <script src="../Js/js/1.4.2.respond.min.js"></script>
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
                <li><a href="../index.php">首页</a></li>
                <?php
                $sql="SELECT * FROM videotype";
                $result = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_assoc($result)){
                    ?>
                    <li><a href="list.php?tid=<?php echo $row["tid"]; ?>&page=1"><?php echo $row["typename"]; ?></a></li>
                    <?php
                }
                ?>

            </ul>
            <form class="navbar-form navbar-left" role="search" action="search.php">
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
                                                        <form role="form" class="form-horizontal" action="../doLogin.php" method="post">
                                                            <div class="form-group">
                                                                <br>
                                                                <label class="col-sm-2 control-label">
                                                                    账户</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="vid" style="display: none"
                                                                           value="<?php
                                                                           $temp = explode("=", $_SERVER['REQUEST_URI']);//获取URL
                                                                           $suffix = $temp[count($temp) - 1];
                                                                           echo $suffix?>"/>
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
                                                        <form role="form" class="form-horizontal" action="../do_Register.php" method="post" enctype="multipart/form-data">

                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label">
                                                                    账户</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="vid" style="display: none"
                                                                           value="<?php
                                                                           $temp = explode("=", $_SERVER['REQUEST_URI']);//获取URL
                                                                           $suffix = $temp[count($temp) - 1];
                                                                           echo $suffix?>"/>
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

                                                        <form role="form" class="form-horizontal" action="../admin_login.php" method="post">
                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label">
                                                                </label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="vid" style="display: none"
                                                                           value="<?php
                                                                           $temp = explode("=", $_SERVER['REQUEST_URI']);//获取URL
                                                                           $suffix = $temp[count($temp) - 1];
                                                                           echo $suffix?>"/>
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
                    <button type="button" class="btn btn-default" style="margin-top: 10px;">欢迎：<?php echo $_SESSION["name"]; ?></button>
                    <a href="../Logout.php" style="margin-top: 10px;">登出</a>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                个人中心
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#" data-toggle="modal" data-target="#login2">修改密码</a></li>
                                <li><a href="Home/Modify2.php">修改信息</a></li>
                                <li><a href="Home/userComment.php">留言修改</a></li>
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






<div class="container">

    <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-12">


            <div class="row box ">
                <div class="col-lg-4 text-center">
                  <video width="100%" height="345px" controls="controls" poster="<?php echo "..".$detail["pic"];?>">
                        <source src="<?php echo "..".$detail["address"];?>" type="video/mp4">  <!-- 视频地址 视频格式 -->
                   </video>    
                 <p><?php echo $detail["videoname"]; ?></p>
                </div><!--放视频海报和标题-->
                <div class="col-lg-8 text-center">
               <table class="table table-hover">
                   <tr>
                       <td>专栏</td>
                       <td>
                    <?php
                    $x = $detail['tid'];
                    $res11 = mysqli_query($conn,"SELECT * FROM videotype WHERE tid='$x'");
                    $typename1 = mysqli_fetch_assoc($res11);
                    echo $typename1["typename"];
                    ?>
                       </td>
                   </tr>
                   <tr>
                       <td>上传时间</td>
                       <td><?php echo $detail["uploaddate"]; ?></td>
                   </tr>
                   <tr>
                       <td>点击次数</td>
                       <td><?php echo $detail["hittimes"]; ?></td>
                   </tr>
                   <tr>
                       <td>上传人</td>
                       <td><?php echo $detail["uploadadmin"]; ?></td>
                   </tr>
                   <tr>
                       <td>下载次数</td>
                       <td><?php echo $detail["downtimes"]; ?></td>
                   </tr>
                   <tr>
                       <td>有事找站长</td>
                       <td> <a href="mailto: 878726628@qq.com">意见箱</a></td>
                   </tr>
                   <tr>
                       <!--这里用了ajax，参数是下面隐藏的input框-->
                       <input id="videoid" type="text" value="<?php echo $detail['vid']; ?>" style="display: none">
                       <td>下载地址</td>
                       <td><a onclick="countNum()" href="<?php
                           echo "..".$detail["address"];
                           ?>" download='video.mp4'>点击这里下载</a></td>
                   </tr>
               </table>

                </div><!--表格显示视频详细信息-->


            </div>
            <!--/row-->
            <div class="row box">

                <div class="col-lg-12">
                    <h2 class="intro-text text-center">内容简介

                    </h2>
        <?php echo $detail["intro"]; ?>

                </div>
            </div>  <!--/row-->
               <?php
                     if($num>0){
                ?>
            <div class="row box">

                <div class="col-lg-12">
                    <h2 class="intro-text text-center">留言列表

                    </h2>
                <table class="table" align="center">
                  <tr>
                    <th>序号</th>
                    <th>内容</th>
                    <th>评论人</th>
                    <th>发表时间</th>
                  </tr>
                  <?php 
                     $i=1;
                     while ($row=mysqli_fetch_assoc($result0)) {
                   ?>
                   <tr>
                     <td width="10%"><?php echo $i++; ?></td>
                     <td width="50%"><?php echo $row["content"]; ?></td>
                     <td width="20%"><?php  $uid=$row["uid"];
                     $userrs=mysqli_query($conn,"select * from users where uid=$uid");
                     $user=mysqli_fetch_assoc($userrs);
                     echo $user["uname"]; ?></td>
                     <td width="20%"><?php echo $row["cdate"]; ?></td>
                   </tr>
                   <?php 
                      }
                    ?>
                </table>

                </div>
            </div>  <!--/row-->
              <!--分页-->
            <nav aria-label="Page navigation" style="text-align: center">
            <ul class="pagination">
            <?php
            if ($page > 1){
            echo "<li><a href=?page=1>首页</a></li>";
            echo "<li>
            <a href=?vid=$vid&page=".($page-1)." aria-label=\'Previous\'>
            <span aria-hidden=\'true\'>&laquo;</span>
            </a>
            </li>";
            }else{
            echo "<li class='disabled'><a>首页</a></li>";
            echo "<li class='disabled'>
            <a aria-label=\'Previous\'>
            <span aria-hidden=\'true\'>&laquo;</span>
            </a>
            </li>";
            }
            ?>
            <!--循环输出页数-->
            <?php
            for ($i = 1;$i <= $totalpages;$i++){
            $temp = explode("=", $_SERVER['REQUEST_URI']);//获取URL
            $suffix = $temp[count($temp) - 1];
            if ($suffix == $i)
             echo "<li class=\"active\"><a href=?vid=$vid&page={$i}>{$i}</a></li>";
            else
             echo "<li><a href=?vid=$vid&page={$i}>{$i}</a></li>";
            }
            ?>
            <?php
            if ($page < $totalpages){
            echo "<li>
            <a href=?vid=$vid&page=".($page+1)." aria-label=\"Next\">
            <span aria-hidden=\'true\'>&raquo;</span>
            </a>
            </li>";
            echo "<li><a href=?vid=$vid&page=$totalpages>尾页</a></li>";
            }else{
            echo "<li class='disabled'>
            <a aria-label=\'Next\'>
            <span aria-hidden=\"Next\">&raquo;</span>
            </a>
            </li>";
            echo "<li class='disabled'><a>尾页</a></li>";
            }
            ?>
            </ul>
            </nav>


            <?php 
            }else{ ?>
            <div class="row box">
              <div class="col-md-12">
                <h3 class="intro-text text-center">暂无留言</h3>
              </div>
            </div>
            <?php 
          }
             ?>

            <?php
                if(isset($_SESSION["name"])){
            ?>
             <div class="row box">

                            <div class="col-lg-12">
                                <h2 class="intro-text text-center">您的留言

                                </h2>
            <form class="form-horizontal" action="../Admin/doComment.php" method="post">
              <input type="hidden" name="vid" value=<?php echo $vid; ?>>
              <div class="form-group">
                <div class="col-sm-12">
                  <textarea class="form-control" cols="80" rows="10" required name="content" style="1600px"></textarea>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12 text-center" style="text-align: center">
                  <input type="submit" class="btn btn-default" value="发表留言">
                </div>
              </div>
            </form>
                            </div>
                        </div>  <!--/row-->
        <?php
         }else{
          ?>
            <div class="row box">
              <div class="col-lg-12" style="align:center">
                <h2><a href="#" data-toggle="modal" data-target="#myModal">登录</a>后可以发表留言</h2>
              </div>
            </div>
      <?php
          }
     ?>

        </div>
        <!--/.col-xs-12.col-sm-12-->

       
    </div>
    <!--/row-->

    

</div>
<!--/.container-->
<hr>

<footer>
    <p>视频网站&copy; PHP应用开发课程 2016-2017</p>
</footer>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../assets/js/ie10-viewport-bug-workaround.js"></script>
<script type="text/javascript">
    function countNum()
    {
        var videoid = document.getElementById("videoid").value;
        var xmlhttp;
        if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        }
        else
        {// code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        var x = "./downloadTimes.php?vid="+videoid;
        console.log(x);
        xmlhttp.open("GET",x,true);
        xmlhttp.send();
    }
</script>
</body>
</html>