let subtractButtons = document.querySelectorAll('td div button:nth-child(1)')
let addButtons = document.querySelectorAll('td div button:nth-child(3)')
let commodityQuantitys = document.querySelectorAll('td div input')
// 单价
let price = document.querySelectorAll('.price')
// 小计
let allPrice = document.querySelectorAll('.allPrice')

// 已选取的商品数量
let checkQuantity = document.querySelector('.alreadyCheck strong')

// 总价
let allTotal = document.querySelector('.totalPrice strong')
let tbody = document.querySelector('tbody')
let trs = document.querySelectorAll('tbody tr')
let dels = document.querySelectorAll('.del')

for (let i = 0; i < addButtons.length; i++) {
    allPrice[i].innerHTML = price[i].innerHTML * commodityQuantitys[i].value
    if (commodityQuantitys[i].value == 0) {
        commodityQuantitys[i].value = 0
        subtractButtons[i].disabled = true
    }
    addButtons[i].addEventListener('click', () => {
        commodityQuantitys[i].value++
        subtractButtons[i].disabled = false
        allPrice[i].innerHTML = price[i].innerHTML * commodityQuantitys[i].value
        checkQuantity.innerHTML = computedCheck(commodityQuantitys)
        allTotal.innerHTML = computedPrice(allPrice)
    })
    subtractButtons[i].addEventListener('click', () => {
        commodityQuantitys[i].value--
        if (commodityQuantitys[i].value == 0) {
            commodityQuantitys[i].value = 0
            subtractButtons[i].disabled = true
        }
        allPrice[i].innerHTML = price[i].innerHTML * commodityQuantitys[i].value
        checkQuantity.innerHTML = computedCheck(commodityQuantitys)
        allTotal.innerHTML = computedPrice(allPrice)
    })
    dels[i].addEventListener('click', () => {
        tbody.removeChild(trs[i])
        let commodityQuantitys = document.querySelectorAll('td div input')

        let allPrice = document.querySelectorAll('.allPrice')
        checkQuantity.innerHTML = computedCheck(commodityQuantitys)
        allTotal.innerHTML = computedPrice(allPrice)
    })
}
checkQuantity.innerHTML = computedCheck(commodityQuantitys)
allTotal.innerHTML = computedPrice(allPrice)
// 封装计算总价函数
function computedPrice(elements) {
    sum = 0
    for (let i = 0; i < elements.length; i++) {
        sum = sum + parseInt(elements[i].innerHTML)
    }
    return sum
}

// 计算总件数
function computedCheck(elements) {
    sum = 0
    for (let i = 0; i < elements.length; i++) {
        sum = sum + parseInt(elements[i].value)
    }
    return sum
}
