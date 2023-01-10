let express = require('express')
let jwt = require('jsonwebtoken')
let router = express.Router()

let ARR = [
    { name: 'lis', age: 18, address: 'hua' },
    { name: ' tom', age: 28, address: 'huali' },
    { name: 'da', age: 38, address: 'huadong' },
]

module.exports = router.get('/list', (req, res) => {
    try {
        let token = req.get('Authorization').split(' ')[1]
        // 如果解码成功，说明token有效
        let deCodeToken = jwt.verify(token, 'ok')
        res.status(200).send({
            code: 200,
            data: ARR,
        })
    } catch (error) {
        // 解码不成功，token无效
        res.status(403).send('您没有这个权利，请先登录')
    }
})
