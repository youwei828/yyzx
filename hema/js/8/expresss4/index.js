const express = require('express')
const path = require('path')

const app = express()

const ARR = [
    {
        name: 'tom',
        age: 12,
        address: '光明小学',
    },
    {
        name: 'hong',
        age: 18,
        address: '阳光小学',
    },
    {
        name: 'lus',
        age: 21,
        address: '未来小学',
    },
]

app.set('view engine', 'ejs')
app.set('views', path.resolve(__dirname, './views'))

app.use(express.static(path.resolve(__dirname, './public')))

// 解析post请求体的中间件
app.use(express.urlencoded())

app.post('/login', (req, res) => {})

app.get('/students', (req, res) => {
    res.render('students', {
        name: ARR,
    })
})

app.use((req, res) => {
    // res.status(404)
    // res.send('<h1>地址丢失</h1>')
    // 请求重定向
    res.redirect('https://tianzhongli.shop')
})

app.listen(3001, () => {
    console.log('服务器已启动~~')
})
