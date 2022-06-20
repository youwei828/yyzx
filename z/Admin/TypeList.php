<?php
    include '../Database/Connection.php';
    include 'HEAD.php';
    $i = 1;
?>
<div class="container col-md-9">
    <form action="" method="get">
        <div class="row">
            <div class="col-md-4">
                <input type="text" name="key" class="form-control ">
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-default">搜索一下</button>
            </div>
        </div>
    </form>
    <br>
    <table class="col-md-12 table table-striped" align="center" style="margin: 0px">
        <tr>
        <th class="col-md-4">#序号</th>
        <th class="col-md-4">视频类别名称</th>
        <th class="col-md-4">操作</th>
        </tr>
<?php

    if(isset($_GET["key"])){
    $k = $_GET["key"];
    $sql = "SELECT * FROM videotype WHERE typename LIKE '%$k%'";

    }else{
    $sql = "SELECT * FROM videotype ORDER BY tid DESC";

    }
    $res = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($res)){
?>

 <tr>
  <td class="col-md-4"><?php echo $i++; ?></td>
  <td class="col-md-4"><?php echo $row["typename"]; ?></td>
  <td class="col-md-4"><a href="TypeEdit.php?tid=<?php echo $row["tid"]; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>修改</a>
      <a onclick="return confirm('确定要删除吗?')" href="TypeDelete.php?tid=<?php echo $row["tid"]; ?>"><i class="fa fa-trash" aria-hidden="true"></i>删除</a></td>
</tr>

<?php } ?>
   
</table>
</div>

<?php
    include 'BOTTOM.php';
?>