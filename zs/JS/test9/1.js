const http = require('http');
//1.创建服务
const server = http.createServer();
//2.监听前端请求
server.on('request', function (req, resp) {
    //响应数据
    resp.end('hello world');
});
//3.监听端口
server.listen(8080, function () {
    console.log('8080端口已启动');
});
