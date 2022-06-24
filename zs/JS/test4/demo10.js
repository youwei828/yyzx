let arr = [1, 2, 3, 4];
let run = arr.find(function (item) {
    console.log(item);
});
//
Array.prototype.findValue = function (callbacks) {
    for (const iterator of this) {
        if (callbacks(iterator)) return iterator;
    }
    return false;
};
const res = arr.findValue(function (item) {
    return item == 3;
});
console.log(res);
