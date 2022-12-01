interface Person {
    // readonly 只读
    readonly name: string
    // 可选操作符?
    // 定义函数
    cb(): number
    age?: number
    // 任意属性
    [PropName: string]: any
}

//接口继承
interface A {
    name: string
}

interface B extends A {
    age: number
}

let dav: B = {
    name: 'dav',
    age: 12,
}

let tom: Person = {
    name: 'tom',
    age: 18,
    cb: (): number => 123,
    prop: 'prop',
}
let say: Person = {
    name: 'say',
    class: '1911',
    cb: (): number => 456,
}
// tom.name = 'zhe'
console.log(tom)
console.log(say)
console.log(tom.name)
console.log(tom.age)
console.log(tom.cb())
console.log(say.cb)
