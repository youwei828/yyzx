// const fun = function (name: string, age?: number) {
//     console.log(name + age)
// }
// fun('zuw', 12)
// fun('zq')
interface User {
    name: string
    age: number
}
const funx = function (user: User): User {
    return user
}
let use = funx({
    name: 'susam',
    age: 24,
})
console.log(use)
