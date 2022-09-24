const app = Vue.createApp({
    data() {
        return {
            name: '星期六',
            id: 'hd',
            n: 1,
            args: 'id',
        };
    },
    // template: '{{name}}',
});
const vm = app.mount('#app');
setTimeout(() => {
    // vm.id = 'zyw';
    // vm.n = 2;
    vm.name = '星期五';
    vm.args = 'href';
    vm.id = 'http://www.mingyueblog.top';
}, 3000);
