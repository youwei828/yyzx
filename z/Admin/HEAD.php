<?php @session_start();?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <!-- Iconos -->
    <link rel="stylesheet" type="text/css" href="http://www.jq22.com/jquery/font-awesome.4.6.0.css">
    <link rel="stylesheet" href="css/leftnav.css" media="screen" type="text/css"/>
    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="js/2.1.1.jquery.min.js"></script>
    <script src="js/3.3.7.bootstrap.min.js"></script>
    <link rel="stylesheet" href="../Js/js/font-awesome.4.6.0.css">
    <script src='js/1.12.3.jquery.min.js'></script>
    <script src='js/bootstrap.min.css'></script>
    <script src='../layer/layer.js'></script>
    <title>欢迎登陆管理员后台系统</title>
    <style>
        body{
            padding-left: 25px;
            padding-right: 25px;
            height: auto;
            width: auto;
        }
        div #top{
            height: 70px;
            width: auto;
        }
        #top h1{
            color: #0b0b0b;
            margin: 0px;
            padding: 10px;
            text-align: center;
            height: 70px;
        }
        div #left{
            /*float: left;*/
            width: 200px;
            margin: 0px;
        }
    </style>
</head>

<body>
<div  class="col-md-12">
    <h1>视频网站管理系统</h1>
    <hr style="height: 3px; border: none;border-top: 3px double chocolate;" />
</div>

<div class="col-md-3" id="left" style="margin: 0px;float: left;width: 204px">
    <div id="sidebar1">
        <div class="account-l fl">
            <a class="list-title">后台管理系统</a>
            <ul id="accordion" class="accordion">
                <li>
                    <div class="link"><i class="fa fa-leaf"></i>个人信息<i class="fa fa-chevron-down"></i></div>
                    <ul class="submenu">
                        <li id="shop"><a href="welcome.php">欢迎页</a></li>
                        <li id="publicproducts"><a href="Modify.php">修改密码</a></li>
                    </ul>
                </li>
                <li>
                    <div class="link"><i class="fa fa-shopping-cart"></i>用户管理<i class="fa fa-chevron-down"></i></div>
                    <ul class="submenu">
                        <li id="publishpurchase"><a href="UsersList.php?page=1">查看用户</a></li>
                    </ul>
                </li>
                <li>
                    <div class="link"><i class="fa fa-pencil-square-o"></i>类型管理<i class="fa fa-chevron-down"></i></div>
                    <ul class="submenu">
                        <li id="buyerxunpanlist"><a href="TypeList.php">查看类型</a></li>
                        <li id="publishrequire"><a href="TypeAdd.php">添加类型</a></li>
                    </ul>
                </li>
                <li>
                    <div class="link"><i class="fa fa-file-text"></i>视频管理<i class="fa fa-chevron-down"></i></div>
                    <ul class="submenu">
                        <li id="myorder"><a href="VideoList.php?page=1">查看视频</a></li>
                        <li><a href="VideoAdd.php">添加视频</a></li>
                    </ul>
                </li>
                <li>
                    <div class="link"><i class="fa fa-star"></i>留言管理<i class="fa fa-chevron-down"></i></div>
                    <ul class="submenu">
                        <li id="usercomments"><a href="commentList.php?page=1">留言列表</a></li>
                    </ul>
                </li>
                <li>
                    <div class="link"><i class="fa fa-globe"></i>其他<i class="fa fa-chevron-down"></i></div>
                    <ul class="submenu">
                        <li id="myloan"><a href="../index.php">回到视频主页</a></li>
                        <li id="financialmanage"><a href="../Logout.php">注销并退出</a></li>
                    </ul>
                </li>
            </ul>
            <script src="http://www.jq22.com/jquery/jquery-1.10.2.js"></script>
            <script src='js/leftnav.js'></script>
        </div>
    </div>
</div>
