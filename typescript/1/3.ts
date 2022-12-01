// 数字组成的数组
let arr1: number[] = [1]
// 字符串组成的数组
let arr2: string[] = ['1']
// 任意类型组成的数组
let arr3: any[] = [1, '1']

// 定义多维数组
let arrarr1: number[][] = [
    [1, 2],
    [, 3, 4],
]

// 使用泛型进行定义
let arr4: Array<number> = [1, 23, 4]

let arr5: Array<Array<number | string>> = [
    [1, 2, '3'],
    [, , 4, 5, '6'],
]

console.log(arr1)
console.log(arrarr1)
console.log(arr2)
console.log(arr3)
console.log(arr4)
console.log(arr5)

function arr(...arges) {
    let array: IArguments = arguments
    console.log(array)
}
arr(1, 2, 4)
