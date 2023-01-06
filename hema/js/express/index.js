let express = require('express')
let path = require('path')
let list = require('./routes/list')
let login = require('./routes/login')
let app = express()
app.use(express.json())

app.use((req, res, next) => {
    res.setHeader('Access-Control-Allow-Origin', '*')
    res.setHeader('Access-Control-Allow-Methods', '*')
    res.setHeader('Access-Control-Allow-Headers', '*')
    next()
})

app.use(express.static(path.resolve(__dirname, './public')))

app.use(login)

app.use(list)

let err = `
        <h1>未能找到相关资源</h1>
        <br />
        <h2>您可以访问相关网站</h2>
        <br />
        <a href="https://tianzhongli.shop" target="_blank">田中笠首页</a>
        <br />
        <a href="https://m.tianzhongli.shop" target="_blank">田中笠手机端</a>
        <br />
        <a href="https://img.tianzhongli.shop" target="_blank">田中笠图床(已开启防盗链)</a>
`

app.use((req, res) => {
    res.status(404).send(err)
})

app.listen(3003, () => {
    console.log('服务器已开启')
})
