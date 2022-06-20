<?php
    include 'HEAD.php';
?>
<div class="container col-md-9">
    <h4>请修改用户信息</h4>

    <form action="doUserEdit.php" method="post" enctype="multipart/form-data">

        <?php
        $uid = $_GET['uid'];
        include '../Database/Connection.php';
        $sql = "SELECT * FROM users WHERE uid='$uid'";
        $res = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($res);
        ?>

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

            </tr>
        </table>
    </form>
</div>

<?php
    include 'BOTTOM.php';
?>