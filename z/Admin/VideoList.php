<?php
    include 'HEAD.php';
    include '../Database/Connection.php';
?>
<div class="container col-md-9">
    <form action="" method="get">
        <div class="row">
            <div class="col-md-4">
                <input type="text" name="key" class="form-control" placeholder="输入视频名称关键字">
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-default">搜索视频</button>
            </div>
        </div>
    </form>
    <br>


    <table class="table table table-striped" align="center" style="margin: 0px">
        <tr>
        <th class="col-md-2">序号</th>
        <th class="col-md-2">视频名称</th>
        <th class="col-md-2">类别</th>
        <th class="col-md-2">添加时间</th>
        <th width='80' class="col-md-2">海报</th>
        <th class="col-md-2">操作</th>
        </tr>
        <?php
            if(isset($_GET["key"])){
                $k = $_GET["key"];
                $sql = "SELECT * FROM videos WHERE videoname LIKE '%$k%'";
            }else{
                $sql = "SELECT * FROM videos ORDER BY vid DESC";
            }
            $res = mysqli_query($conn,$sql);
            $num = mysqli_num_rows($res);
            if (!isset($_GET['page'])){
                $page = 1;
            }else{
                $page = $_GET['page'];
            }
            //分移量
            $rowpage = 4;
            if ($num == 0){
                echo '无记录';
                exit;
            }
            if ($num%$rowpage == 0){
                $totalpages = $num/$rowpage;
            }else{
                $totalpages = ceil($num/$rowpage);
            }
            $start = ($page-1)*$rowpage;

            $i = 1;
            if (isset($_GET['key'])){
                $key = trim($_GET['key']);
                $sql = "SELECT * FROM videos WHERE videoname LIKE '%{$key}%' limit $start,$rowpage";
            }
            else{
                $sql = "SELECT * FROM videos ORDER BY vid DESC LIMIT $start,$rowpage";
            }
            $result = mysqli_query($conn,$sql);

            while($row = mysqli_fetch_assoc($result)){
        ?>
        <tr>
            <td class="col-md-2" style="line-height: 60px"><?php echo $i++; ?></td>
            <td class="col-md-2" style="line-height: 60px"><?php echo $row["videoname"]; ?></td>
            <td class="col-md-2" style="line-height: 60px"><?php
                $tidNum = $row["tid"];
                $sqlTid = "SELECT typename FROM videotype WHERE tid='$tidNum'";
                $resultTid = mysqli_query($conn,$sqlTid);
                echo mysqli_fetch_assoc($resultTid)['typename']; ?></td>
            <td class="col-md-2" style="line-height: 60px"><?php echo date('Y-m-d',strtotime($row['uploaddate'])); ?></td>
            <td class="col-md-2" style="line-height: 60px"><img src="<?php echo "..".$row["pic"]; ?>" width=60px; height=60px; alt=""></td>
            <td class="col-md-2" style="line-height: 60px"><a href="VideoEdit.php?vid=<?php echo $row["vid"]; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>修改</a>&nbsp;&nbsp;&nbsp;<a onclick="return confirm('确定要删除吗?')" href="VideoDelete.php?vid=<?php echo $row["vid"]; ?>"><i class="fa fa-trash" aria-hidden="true"></i>  删除</a></td>
        </tr>
        <?php } ?>
        </table>

        <nav aria-label="Page navigation" style="text-align: center">
            <ul class="pagination">
                <?php
                if ($page > 1){
                    echo "<li><a href=?page=1>首页</a></li>";
                    echo "<li>
                        <a href=?page=".($page-1)." aria-label=\'Previous\'>
                        <span aria-hidden=\'true\'>&laquo;</span>
                        </a>
                      </li>";
                }else{
                    echo "<li class='disabled'><a>首页</a></li>";
                    echo "<li class='disabled'>
                        <a aria-label=\'Previous\'>
                        <span aria-hidden=\'true\'>&laquo;</span>
                        </a>
                      </li>";
                }
                ?>
                <!--循环输出页数-->
                <?php
                for ($i = 1;$i <= $totalpages;$i++){
                    $temp = explode("=", $_SERVER['REQUEST_URI']);//获取URL
                    $suffix = $temp[count($temp) - 1];
                    if ($suffix == $i)
                        echo "<li class=\"active\"><a href=?page={$i}>{$i}</a></li>";
                    else
                        echo "<li><a href=?page={$i}>{$i}</a></li>";
                }
                ?>
                <?php
                if ($page < $totalpages){
                    echo "<li>
                        <a href=?page=".($page+1)." aria-label=\"Next\">
                        <span aria-hidden=\'true\'>&raquo;</span>
                        </a>
                      </li>";
                    echo "<li><a href=?page=$totalpages>尾页</a></li>";
                }else{
                    echo "<li class='disabled'>
                        <a aria-label=\'Next\'>
                        <span aria-hidden=\"Next\">&raquo;</span>
                        </a>
                      </li>";
                    echo "<li class='disabled'><a>尾页</a></li>";
                }
                ?>
            </ul>
        </nav>
</div>

<?php
    include 'BOTTOM.php';
?>