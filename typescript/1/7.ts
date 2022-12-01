class Person1 {
    // 修饰符 public private protected
    name: string
    age: number
    some: any
    constructor(name: string, age: number, some: any) {
        this.name = name
        this.age = age
        this.some = some
    }
}
let man = new Person1('zuw', 12, true)

console.log(man.name)
