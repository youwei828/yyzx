<?php

session_start();
session_destroy();//清空session
$_SESSION["msg"] = "注销成功";
header("location:index.php");