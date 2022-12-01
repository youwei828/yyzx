// let tomNum: string = '19119'
// let app: string = `tom ${tomNum}`
// console.log(app)

// let u: void = undefined
// let n: void = null
// console.log(u, n)
// any类型可以赋值给任意类型
// unknown比any更安全
let anys: any = 'zyw'
console.log((anys = []))
console.log((anys = {}))
console.log((anys = Symbol(27)))
console.log((anys = 12))
