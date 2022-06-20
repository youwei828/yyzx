<?php
    include 'HEAD.php';
    include '../Database/Connection.php';
?>
<div class="container col-md-9" >
    <h5>请填写视频类别信息</h5>
    <form class="form-horizontal" method="POST" action="doTypeAdd.php" enctype="multipart/form-data">

        <div class="form-group col-md-5">
            <label for="typename" class="col-md-3 control-label" style="font-size: smaller">类别名称</label>
            <div class="col-md-9">
                <input type="text" class="form-control col-md-7" id="typename" placeholder="请输入视频类别名称" name="typename">
            </div>
        </div>

        <div class="form-group col-md-1">
            <div class="col-sm-offset-2 col-sm-1">
                <input type="submit" class="btn btn-default" value="添加">
            </div>
        </div>
    </form>
</div>

<?php
    include 'BOTTOM.php';
?>