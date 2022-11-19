<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>验证码测试</title>
</head>
<style>
.code {
    width: 80px;
    height: 10px;
    /* border: 2px red solid; */
    display: flex;
    flex-direction: column;
    margin-bottom: 20px;
}
</style>

<body>
    <form action="1.php" method="POST">
        <table>
            <tr>
                <td><input type="text" name="enter"></td>
            </tr>
            <tr>
                <td class="code"><img src="./code.php" alt="验证码" onclick="this.src = 'code.php?'+Math.random()"></td>
            </tr>
            <tr>
                <td>
                    <button>提交</button>
                </td>
            </tr>
        </table>
    </form>
</body>

</html>