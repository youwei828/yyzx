<?php
    session_start();
    include 'HEAD.php';
?>
<!--欢迎页面-->
<div class="col-md-9">
    <div align="center" style="font-size:40px;font-family:'Comic Sans MS';cursive;text-align:center;line-height:420px">欢迎登陆，
        <?php
        echo $_SESSION["name"];
        if(!isset($_SESSION["name"])){
            session_start();
            $_SESSION["msg"] = "您没有权限，请登录后访问";
            echo "您没有权限，请登录后访问";
            header("refresh:0;url='../index.php'");
        }
        ?>
    </div>
</div>

<?php
    include 'BOTTOM.php';
?>