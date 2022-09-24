Vue.createApp({
    data() {
        return {
            title: '学习',
        };
    },
    template: `<div>有为学Vue - {{title}}</div>`,
}).mount('#app');
