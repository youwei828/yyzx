// const regexp: RegExp = RegExp(/\w\d\s/)

// let date: Date = new Date()

// let error: Error = new Error()

function promise(): Promise<number> {
    return new Promise<number>((resolve, reject) => {
        resolve(1)
    })
}

promise().then(res => {
    console.log(res)
})
