let jwt = require('jsonwebtoken')

let obj = {
    name: 'swk',
    age: 18,
}

let token = jwt.sign(obj, 'ok', {
    expiresIn: '1',
})

console.log(token)
console.log(jwt.verify(token, 'ok'))
