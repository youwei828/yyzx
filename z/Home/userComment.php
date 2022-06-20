<?php
require_once('tpl/head.php');
include_once('./system/dbConn.php');
?>
<?php
connect();
// require('./system/loginCheck.php');
?>
<div>
<table class="table table-hover" style="color: white">

    <thead>
    <tr>
        <th>序号</th>
        <th>留言内容</th>
        <th>留言时间</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>Tanmay</td>
        <td>Bangalore</td>
        <td>560001</td>
        <td> <a href="">修改</a> <a href="">删除</a> </td>
    </tr>
    <tr>
        <td>Sachin</td>
        <td>Mumbai</td>
        <td>400003</td>
        <td> <a href="">修改</a> <a href="">删除</a> </td>
    </tr>
    <tr>
        <td>Uma</td>
        <td>Pune</td>
        <td>411027</td>
        <td> <a href="">修改</a> <a href="">删除</a> </td>
    </tr>
    </tbody>
</table>
</div>
<?php
require_once('tpl/foot.php');
include_once('./system/dbConn.php');
?>
