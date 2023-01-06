let express = require('express')

let router = express.Router()

let ARR = [
    { name: 'lis', age: 18, address: 'hua' },
    { name: ' tom', age: 28, address: 'huali' },
    { name: 'da', age: 38, address: 'huadong' },
]

module.exports = router.get('/list', (req, res) => {
    res.status(200).send({
        code: 200,
        data: ARR,
    })
})
