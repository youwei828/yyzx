function count(start, end) {
    console.log(start)
    let timer = setInterval(() => {
        if (start < end) {
            console.log(start)
        }
        start++
    }, 100)
    return {
        cancel() {
            clearInterval(timer)
        },
    }
}

count(1, 10)
