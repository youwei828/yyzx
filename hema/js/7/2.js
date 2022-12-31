let fs = require('fs/promises')
let path = require('path')
// 同步
// console.log(fs.readFileSync(path.resolve(__dirname, './1.html')).toString())

// 异步
// fs.readFile(path.resolve(__dirname, './1.html'), (err, buf) => {
//     if (err) {
//         console.log(err)
//     } else {
//         console.log(buf.toString())
//     }
// })

;(async () => {
    try {
        let buf = await fs.readFile(path.resolve(__dirname, './1.html'))
        console.log(buf.toString())
    } catch (error) {
        console.log(error)
    }
})()
