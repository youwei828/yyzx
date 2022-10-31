<?php
$users = [
    ['id'=>1,'name'=>'lisi','age'=>'18'],
    ['id'=>2,'name'=>'zhangsan','age'=>'12'],
    ['id'=>3,'name'=>'wangwu','age'=>'15'],
];
?>
<table border='1'>
    <tr>
        <td>编号</td>
        <td>姓名</td>
        <td>年龄</td>
    </tr>
    <?php while($user = current($users)):  ?>
    <tr>
        <td><?php echo key($users)+1?></td>
        <td><?php echo $user['name']?></td>
        <td><?php echo $user['age']?></td>
    </tr>
    <?php next($users); endwhile; ?>
</table>