<?php
// php数据类型
// string integer float array object boolean null
//八进制转化十六进制
echo octdec(777);
// 十六进制转化为十进制
echo hexdec('FBC');

// 布尔类型
// 0  0.0 假
//'' 空字符串为假   'ok'非空字符串为真
// []空数组为假
// null值也是假
// {}空对象为真

// 变量中单引号和双引号的区别
// 双引号里面可以直接使用变量，但是要使用空格隔开
$name='word';
echo "hello $name 1234";
echo "hello {$name} 123";

// 生产环境要加上头信息 字符编码
header('Content-type:text/html;charset=utf-8');

// 字符串转义
// 转义双引号可显示 符号使用反斜杠\
$string = "有为青年\"mingyue\"";
echo $string;
// 转义变量为字符串
echo "变量定义的方法：\$string = 10";
echo "输出一个反斜杠 \\";
// 源码tab位
echo "\t\t\t\t";
// 源码换行
echo "\n\n\n\n\n";
// 网页解析后页面换行使用html标签
echo "<br/>";

// html标签定界符
$str = <<<php
    <h1 style="color:red">这是h1的标签</h1>
    <script>
        document.write('有为青年');
    </script>
php;
echo $str;

// 字符串连接
echo $str1.$str2;

// 获取字符串长度  宽字节中文占3长度
echo strlen($str);
// 显示中文具体长度    4
echo mb_strlen("有为青年","utf8");
