//vue应用实例
const app = Vue.createApp({
    //选项对象
    data() {
        return {
            name: 'yw',
            num: 1,
            error: '',
        };
    },
    watch: {
        num(newValue, OldValue) {
            this.error = newValue == 0 ? '错误：不能小于0' : newValue == 10 ? '警告：不能大于10' : '';
        },
    },
    methods: {
        add() {
            if (this.num < 10) this.num++;
        },
        desc() {
            if (this.num > 0) this.num--;
        },
    },
    template: '<div>123</div>',
});
//app.mount('#app'),将vue实例app挂载到想要使用的vue控件(id为app的元素)上
//实例创建后，可以通过vm.$data访问原始数据对象。组件实例也带来了data对象上的所有property，因此访问vm.name等价于访问vm.$data.name
const vm = app.mount('#app');
console.log(app);
console.log(vm.$data);
