const app = Vue.createApp({
    data() {
        return {
            name: '这是根组件',
        };
    },
    template: `<div>{{name}} - <zyw/></div>`,
});
app.component('zyw', {
    data() {
        return {
            name: '人间词话',
        };
    },
    template: `<div style='background-color:red'>{{name}}</div>`,
});
const vm = app.mount('#app');
//返回上面的实例
// console.log(vm.name);
