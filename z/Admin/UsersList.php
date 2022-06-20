<?php
    include 'HEAD.php';
?>

<!--查看用户页面-->

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

    <table class="col-md-12 table table-striped" align="center" style="margin: 0px">
        <?php

        include '../Database/Connection.php';
        $sql = 'SELECT * FROM users';
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

        ?>
        <caption style="text-align: center">注册用户信息列表（共<?php echo $num ?>名用户)</caption>
        <tr>
            <th>用户编号</th>
            <th>用户名</th>
            <th>性别</th>
            <th>生日</th>
            <th>头像</th>
            <th>电子邮件</th>
            <th>操作</th>
        </tr>
        <?php
        $i = 1;
        if (isset($_GET['key'])){
            $key = trim($_GET['key']);
            $sql = "SELECT * FROM users WHERE uname LIKE '%{$key}%' limit $start,$rowpage";
        }
        else{
            $sql = "SELECT * FROM users LIMIT $start,$rowpage";
        }
        $result = mysqli_query($conn,$sql);
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr >
                <td style="line-height: 60px"><?php echo $i++; ?></td>
                <td style="line-height: 60px"><?php echo $row['uname']; ?></td>
                <td style="line-height: 60px"><?php if ($row['gender'] == 0) {
                        echo  '男';
                    } else {
                        echo  '女';
                    } ?>
                </td>
                <td style="line-height: 60px"><?php echo date('Y-m-d',strtotime($row['birthdate'])); ?></td>
                <td style="line-height: 60px"><img src="../images/<?php echo $row['pic']; ?>" width="60px" height="60px" style="border-radius: 10px"></td>
                <td style="line-height: 60px"><?php echo $row['email']; ?></td>
                <td style="line-height: 60px"><a href="UserEdit.php?uid=<?php echo $row['uid']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>修改</a>&nbsp;&nbsp;&nbsp;<a href="doUserDelete.php?uid=<?php echo $row['uid']; ?>" onclick="return confirm('确定删除么')"><i class="fa fa-trash" aria-hidden="true"></i>删除</a></td>
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