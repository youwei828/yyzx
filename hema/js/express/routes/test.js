let express = require('express')
let router = express.Router()

module.exports = router.get('/test', (req, res) => {
    res.status(200).send({
        code: '200',
        data: {
            username: 'ok',
        },
    })
})
