<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>构建表单</title>
</head>

<body>
    <form action="./2.1.php" method="POST" enctype="multipart/form-data">
        <!-- 通过前台表单限制文件上传大小，必须写在第一行 -->
        <!-- <input type="hidden" name="MAX_FILE_SIZE" value='20000' /> -->
        <input type="file" name="up" />
        <button>提交</button>
    </form>
</body>

</html>