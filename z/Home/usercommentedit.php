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

                <form action="docommentedit.php" method="post">
                <div class="col-xs-12 col-lg-12 mlist">
                    <div class="form-group">

                        <p class="form-control-static">评论内容</p>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="cid" value="<?php echo $_GET['cid'] ?>">
                        <input type="text" name="content" value="<?php

                        $cid=$_GET['cid'];
                        $row=mysqli_fetch_assoc(mysqli_query($conn,"select * from comments WHERE cid='$cid'"));
                        echo $row['content'];
                        ?>" class="form-control" id="inputPassword2">
                    </div>
                    <button type="submit" class="btn btn-default">修改</button>
                </div>
                <!--/.col-xs-6.col-lg-4-->
                </form>
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

