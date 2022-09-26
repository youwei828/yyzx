const app = Vue.createApp({
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
const vm = app.mount('#app');
