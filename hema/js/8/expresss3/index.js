const express = require('express')
const path = require('path')

const app = express()

app.use(express.static(path.resolve(__dirname, './public')))

// app.get('/hello/:id/:name', (req, res) => {
//     console.log(req.params)
// })

app.use(express.urlencoded())

app.post('/login', (req, res) => {
    if (req.body.username == 'admin' && req.body.password == 'admin') {
        res.send('登录成功')
    } else {
        res.send('发送失败')
    }
})

app.listen(3000, () => {
    console.log('服务器已启动~~')
})
