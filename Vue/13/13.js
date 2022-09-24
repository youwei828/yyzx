const app = Vue.createApp({
    data() {
        return {
            name: '明月',
            num: 1,
            // error: '',
            tips: '',
        };
    },
    computed: {
        error: {
            get() {
                const message = this.num == 0 ? '数字不能小于0' : this.num == 10 ? '数字不能大于10' : '';
                if (message) return this.tips + message;
            },
            set(tips) {
                this.tips = tips;
            },
        },
    },
    methods: {
        add() {
            this.error = '提示：';
            if (this.num < 10) this.num++;
        },
        desc() {
            this.error = '警告：';
            if (this.num > 0) this.num--;
        },
    },
});
const vm = app.mount('#app');
