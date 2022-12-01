abstract class A {
    name: string
    constructor(name: string) {
        this.name = name
    }
    setName(name: string) {
        this.name = name
    }
    abstract getName(): string
}

class B extends A {
    constructor(name: string) {
        super(name)
    }
    getName(): string {
        return this.name
    }
}
let an = new B('this is b')
console.log(an.getName())
