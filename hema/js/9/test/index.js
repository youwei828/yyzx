let express = require('express')
let app = express()
app.use(express.json())
app.use(express.urlencoded())
let ARR = [
    { name: 'lis', age: 18, address: 'hua' },
    { name: ' tom', age: 28, address: 'huali' },
    { name: 'da', age: 38, address: 'huadong' },
]

app.get('/student', (req, res) => {
    res.send({
        state: 'ok',
        data: ARR,
    })
})

app.post('/student', (req, res) => {
    ARR.push(req.body)
    res.send({
        state: 'ok',
        data: ARR,
    })
})

app.delete('/student/:name', (req, res) => {
    ARR = ARR.filter(v => (v.name = req.params.name))
    res.send({
        state: 'ok',
        data: ARR,
    })
})

app.use((req, res) => {
    res.status(404)
    res.send('无资源')
})

app.listen(3003, () => {
    console.log('服务器已启动~')
})
