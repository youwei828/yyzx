<?php
    include 'HEAD.php';
?>
<div class="container col-md-9">
    <h4>请修改用户信息</h4>

    <form action="doVideoEdit.php" method="post" enctype="multipart/form-data">

        <?php
        $vid = $_GET['vid'];
        include '../Database/Connection.php';
        $sql = "SELECT * FROM videos WHERE vid='$vid'";
        $sql1 = "SELECT * FROM videotype";
        $res = mysqli_query($conn,$sql);
        $res1 = mysqli_query($conn,$sql1);
        $row = mysqli_fetch_assoc($res);
        ?>

        <input type="hidden" name="vid" value="<?php echo $row['vid'] ?>">
        <div class="form-group">
            <label for="videoname" class="col-md-2 col-xs-2 control-label">视频名称</label>
            <div class="col-md-10 col-xs-10">
                <input type="text" class="form-control" placeholder="视频名称" name="videoname" value="<?php echo $row['videoname'] ?>" required>
            </div>
        </div>

        <div class="form-group">
            <label  class="col-md-2 col-xs-2 control-label">视频类型</label>
            <div class="col-md-10 col-xs-10">
                <select class="form-control" name="videotype" ><option style="display: none">请选择视频类型</option>
                    <?php

                    while($row1 = mysqli_fetch_assoc($res1))
                    {
                        ?>
                        <option value=<?php
                        echo $row1["tid"];
                        if ($row1["tid"]==$row['tid']){
                            echo " selected='selected'";
                        }
                        ?>
                        ><?php
                            echo $row1["typename"];
                            ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label  class="col-md-2 col-xs-2 control-label">视频海报</label>
            <div class="col-md-10 col-xs-10">
                <input type="file" id="exampleInputFile" name="pic">
            </div>
        </div>
        <div style="margin-left: 0px">
            原海报 <img src="..<?php echo $row['pic'] ?>" width="90px"
                     height="90px" style="margin-top: 0px;border-radius: 10px">
        </div>

        <div class="form-group">
            <label  class="col-md-2 col-xs-2 control-label">视频简介</label>
            <div class="col-md-10 col-xs-10">
<!--                <textarea class="form-control" rows="3" name="videointro" required>--><?php //echo $row['vid'] ?><!--</textarea>-->
                <input type="text" class="form-control" placeholder="视频简介" name="videointro" value="<?php echo $row['intro'] ?>" required>
            </div>
        </div>

        <div class="form-group">
            <label for="address" class="col-md-2 col-xs-2 control-label">上传视频</label>
            <div class="col-md-10 col-xs-10">
                <input type="file" class="form-control" id="address" placeholder="address" name="address">
            </div>
        </div>

        <div class="form-group">
            <div class="col-xs-offset-2 col-xs-10">
                <input type="submit" class="btn btn-default" value="添加">
                <input type="reset" class="btn btn-default" value="重置">
            </div>
        </div>
    </form>
</div>

<?php
    include 'BOTTOM.php';
?>