<?php

// 设置session存储路径
session_save_path('session');
session_name('youwei');
// 需要先设置才能开始工作
session_start();
$_SESSION['web'] = 'youwei';
print_r($_SESSION);

// session 设置值为空
// $_SESSION = [];
// session销毁，包括销毁验证文件
// session_destroy();

// 读取和设置session
echo session_name();
echo session_id();