<?PHP
session_start();
$userCode = strtoupper($_POST['enter']);
if($userCode == $_SESSION['captcha']){
    echo 'ok';
}else{
    echo 'error';
}