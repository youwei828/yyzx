// function fun(params: string): void
// function fun(params: number, params2: string): void
// function fun(params: any, params2?: any): void {
//     console.log(params + params2)
// }

// fun('1')
// fun(1, '2')

// 联合类型
interface A {
    name: string
}
interface B {
    age: number
}
function echo(str: A & B): A & B {
    return str
}
let ec = echo({
    name: 'yinghiu',
    age: 12,
})
console.log(ec)
