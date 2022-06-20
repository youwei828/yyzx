<?php
    include 'HEAD.php';
?>

<!--管理员修改密码页面-->

<div class="col-md-9">
    <h4 >请修改您的密码</h4>
    <form action="do_Modify.php" method="post">
        <div class="row">
            <div class="col-md-2">
                原密码
            </div>
            <div class="col-md-4">
                <input type="password" class="form-control" name="Password">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                新密码
            </div>
            <div class="col-md-4">
                <input type="password" class="form-control" name="newPassword">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                重复新密码
            </div>
            <div class="col-md-4">
                <input type="password" class="form-control" name="rePassword">
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-default">确认修改</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button type="reset" class="btn btn-default">重新填写</button>


    </form>
</div>

<?php
    include 'BOTTOM.php';
?>