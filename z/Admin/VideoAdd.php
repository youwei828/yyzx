<?php
    include 'HEAD.php';
    include '../Database/Connection.php';
    $sql = "SELECT * FROM videotype";
    $res = mysqli_query($conn,$sql);
?>
<div class="container col-md-9">
<h4>请填写视频信息</h4>
<form class="form-horizontal" method="POST" action="doVideoAdd.php" enctype="multipart/form-data">

  <div class="form-group">
    <label for="videoname" class="col-md-2 col-xs-2 control-label">视频名称</label>
    <div class="col-md-10 col-xs-10">
      <input type="text" class="form-control" id="videoname" placeholder="视频名称" name="videoname" required>
    </div>
    </div>

    <div class="form-group">
        <label  class="col-md-2 col-xs-2 control-label">视频类型</label>
        <div class="col-md-10 col-xs-10">
        <select class="form-control" name="videotype" ><option value="" style="display: none">请选择视频类型</option>
            <?php while($row = mysqli_fetch_assoc($res))
            {
            ?>
                <option value=<?php
                echo $row["tid"];
                ?>
                ><?php
                echo $row["typename"];
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
            <input type="file" id="exampleInputFile" name="pic" required>
          </div>
    </div>


    <div class="form-group">
        <label  class="col-md-2 col-xs-2 control-label">视频简介</label>
        <div class="col-md-10 col-xs-10">
           <textarea class="form-control" rows="3" name="videointro" required></textarea>
        </div>
    </div>

    <div class="form-group">
        <label for="address" class="col-md-2 col-xs-2 control-label">上传视频</label>
        <div class="col-md-10 col-xs-10">
          <input type="file" class="form-control" id="address" placeholder="address" name="address" required>
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