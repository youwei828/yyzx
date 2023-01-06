let express = require('express')

let router = express.Router()

module.exports = router.post('/login', (req, res) => {
    let { username, password } = req.body
    if (username == 'admin' && password == '123123') {
        let data = {
            code: '200',
            data: {
                username,
            },
            message: '登录成功',
        }
        res.status(200).send(data)
    } else {
        let data = {
            code: '403',
            message: '你的账号或者用户名错误',
        }
        res.status(403).send(data)
    }
})
