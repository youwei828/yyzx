<?php
    include '../Database/Connection.php';
?>
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
<div class="container">

    <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">


            <div class="row">


                <div class="col-xs-12 col-lg-12 mlist">

                    <?php
                    session_start();
                    $u = $_SESSION["name"];
                    $sql = "SELECT * FROM users WHERE uname='$u'";
                    $res = mysqli_query($conn,$sql);
                    $row = mysqli_fetch_assoc($res);
                    $uid = $row['uid'];
                    $res=mysqli_query($conn,"SELECT * FROM comments WHERE uid='$uid'");
                    ?>
                    <form>
                        <h1 align="center">留言列表</h1>
                        <table class="table">
                            <tr>
                                <th>
                                    序号
                                </th>
                                <th>
                                    视频名称
                                </th>
                                <th>
                                    评价内容
                                </th>
                                <th>
                                    发表评论的时间
                                </th>
                                <th>
                                    操作
                                </th>
                            </tr>
                            <?php

                            while ($row = mysqli_fetch_assoc($res)) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $row['cid'] ?>
                                    </td>
                                    <td>
                                        <?php
                                        $vid = $row['vid'];
                                        $usrs = mysqli_fetch_assoc(mysqli_query($conn,"select * from videos WHERE vid='$vid'"));
                                        echo $usrs['videoname']; ?>
                                    </td>
                                    <td>
                                        <?php
                                        echo $row['content'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['cdate'] ?>
                                    </td>
                                    <td>
                                        <a href="usercommentdelete.php?cid=<?php echo $row['cid'] ?>">删除</a>

                                        <a href="usercommentedit.php?cid=<?php echo $row['cid'] ?>" >修改</a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </table>
                    </form>


                </div>
                <!--/.col-xs-6.col-lg-4-->

            </div>
            <!--/row-->
        </div>
        <!--/.col-xs-12.col-sm-9-->

    </div>
    <!--/row-->

    <script type="text/javascript">
        function edit() {
            $("#Edit_content");
        }
    </script>

</div>
<!--/.container-->

