let express = require('express')

let app = express()

app.listen(3000)

app.use('/hello', (request, response) => {
    response.send('<h1>this is middle</h1>')
})

app.get('/', (request, response) => {
    // console.log(request.url)
    response.send(200)
})
