<?php
// if语句另一种写法
if(false):
    echo 'true';
else:
    echo 'false';
endif;

if(false):
?>
<h1>你好</h1>
<?php
else:
    ?>
<h2>hello</h2>
<?php
endif;
?>

<?php
// switch
$status = 'success2';
switch ($status) {
    // 当满足两种条件是都可以写
    case 'success2';
    case 'success':
        echo 'success';
        break;
    case 'error':
        echo 'error';
        break;
    default:
        echo 'default';
        break;
}
switch ($status) :
    // 当满足两种条件是都可以写
    case 'success2';
    case 'success':
        echo 'success';
        break;
    case 'error':
        echo 'error';
        break;
    default:
        echo 'default';
        break;
    endswitch;

    $num = 10;
    while($num>0){
        echo $num;
        $num--;
    }
    $num = 10;
while($num>0):
        echo $num;
        $num--;
endwhile;

// break跳过循环
// break 2;条过两层循环