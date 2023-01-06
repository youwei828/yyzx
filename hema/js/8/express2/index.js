const express = require('express')
const path = require('path')
const app = express()

app.use(express.static(path.resolve(__dirname, './public')))

app.get('/login', (req, res) => {
    if (req.query.username == 'admin' && req.query.password == '123123') {
        res.send('登录成功')
    } else {
        res.send('登录失败，用户名或密码错误')
    }
})

app.listen(3000)
