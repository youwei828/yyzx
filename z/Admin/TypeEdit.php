<?php
    include 'HEAD.php';
    include '../Database/Connection.php';

    $tid = $_GET["tid"];//从列表页的修改超链中取值
    $res = mysqli_query($conn,"SELECT * FROM videotype WHERE tid=$tid");
    $row = mysqli_fetch_assoc($res);
?>

<div class="col-md-9" >
    <form method=post action="TypeUpdate.php" >
        <input type="hidden" name="tid" value="<?php  echo $row['tid'];?>">
        <table class="table table-bordered">
            <tr>
                <td>视频类型名称</td>
                <td><input type="text" name="typename" value="<?php  echo $row['typename'];?>"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="修改"></td>
            </tr>
        </table>
    </form>
</div>

<?php
include 'BOTTOM.php';
?>
