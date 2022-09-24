const app = Vue.createApp({
    data() {
        return {
            name: '人间值得',
            html: '<h2 style="color:red">这是html</h2>',
        };
    },
    // template: '<h1>{{name}} </h1>',
});
const vm = app.mount('#app');
// vm.name = '人间不值得';
// vm.$data.name = '人间不值得';
setTimeout(() => {
    vm.name = '人间不值得';
}, 3000);
cons;
