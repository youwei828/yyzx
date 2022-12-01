// function num(num1: number, num2: number): Array<number> {
//     return [num1, num2]
// }
// console.log(num(123, 2))

// 使用泛型的写法

function num<T>(num1: T, num2: T): Array<T> {
    return [num1, num2]
}
console.log(num<number>(1, 2))
console.log(num<string>('1', '2'))

// 泛型约束
interface Len {
    length: number
}

function num1<T extends Len>(num: T) {
    console.log(num.length)
}
num1('123')

// 使用keyof约束泛型对象

function prop<T, K extends keyof T>(obj: T, key: K) {
    return obj[key]
}
let o = {
    a: 1,
    b: 2,
    c: 3,
}
prop(o, 'a')
