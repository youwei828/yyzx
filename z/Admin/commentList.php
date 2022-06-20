<?php
    include '../Database/Connection.php';
    include 'HEAD.php';
    $i = 1;

    $sql = "SELECT * FROM comments ORDER BY cid DESC";
    $res = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($res);
    if (!isset($_GET['page'])){
        $page = 1;
    }else{
        $page = $_GET['page'];
    }
    //分移量
    $rowpage = 10;
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
    $sql = "SELECT * FROM comments ORDER BY cid DESC LIMIT $start,$rowpage";

    $result1 = mysqli_query($conn,$sql);
?>
<div class="container col-md-9">
    <table class="table table-striped">
        <tr>
            <th>序号</th>
            <th>视频名称</th>
            <th>内容</th>
            <th>评论人</th>
            <th>发表时间</th>
            <th>操作</th>
        </tr>
        <?php
         while ($row1=mysqli_fetch_assoc($result1)) {
        ?>
        <tr>
            <td ><?php echo $i++; ?></td>
            <td ><?php
            $vid = $row1["vid"];
            $sql2 = "SELECT videoname FROM videos where vid=$vid";
            $result2 = mysqli_query($conn,$sql2);
            $row2 = mysqli_fetch_assoc($result2);
            echo $row2["videoname"];
            ?></td>
            <td ><?php echo $row1["content"]; ?></td>
            <td ><?php  $uid=$row1["uid"];
            $userrs = mysqli_query($conn,"SELECT * FROM users WHERE uid=$uid");
            $user = mysqli_fetch_assoc($userrs);
            echo $user["uname"]; ?></td>
            <td ><?php echo $row1["cdate"]; ?></td>
            <td><a onclick="return confirm('确定要删除吗?')" href="doCommentDelete.php?cid=<?php echo $row1["cid"]; ?>">
                    <i class="fa fa-trash" aria-hidden="true"></i>删除</a></td>
        </tr>
        <?php
          }
        ?>
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