<?php
session_start();
include 'Captcha.php';
$captcha = new Captacha;
$code = $captcha->render();
$_SESSION['captcha'] = $code;
