const app = Vue.createApp({
    data() {
        return {
            name: '最是人间留不住',
            event: 'click',
            num: 1,
            error: '',
        };
    },
    methods: {
        add() {
            this.error = '';
            if (this.num < 10) {
                this.num++;
            } else {
                this.error = '不能超过10';
            }
        },
        desc() {
            this.error = '';
            if (this.num > 0) {
                this.num--;
            } else {
                this.error = '不能小于0';
            }
        },
        go(evevt, title) {
            // event.preventDefault();
            // alert(3);
            alert(title);
        },
    },
});
const vm = app.mount('#app');
setTimeout(() => {
    // vm.event = 'mouseenter';
}, 2000);
