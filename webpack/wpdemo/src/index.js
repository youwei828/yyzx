//这是工程入口的文件
//webpack的和核心概念分为入口(Enter)、加载器(Loader)、插件(plugins)、出口(output)；
// import Vue from 'vue';
import { createApp } from 'vue';
import App from './app.vue';

const root = document.createElement('div');
document.body.appendChild(root);
//mount就是将我们的App挂载到root这样一个根节点中
// 废弃的new Vue({
//     render: h => h(App),
// }).mount(root);
createApp(App).mount(root);
