<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>验证码测试</title>
</head>

<body>
    <form action="1.php" method="POST">
        <table>
            <tr>
                <td><input type="text" name="enter"></td>
            </tr>
            <tr>
                <td style="cursor:pointer ;"><img src="./code.php" alt="验证码"
                        onclick="this.src = 'code.php?'+Math.random()"></td>
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