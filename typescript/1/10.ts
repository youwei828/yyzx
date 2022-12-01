// never类型
type bbb = string & number

// symbol类型
let a: symbol = Symbol('lisi')
let b: symbol = Symbol('lisi')

console.log(a, b)
let obj = {
    [a]: 'zs',
    [b]: 12,
    c: 'C',
    D: 4,
}
console.log(Object.getOwnPropertySymbols(obj))
console.log(Reflect.ownKeys(obj))
