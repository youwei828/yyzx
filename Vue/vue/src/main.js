import { createApp } from 'vue';
import './style.css';
import App from './App.vue';
import hd from './assets/scss/hd.scss';
createApp(App).mount('#app');
//每个vue应用实例都是通过用createApp函数创建一个新的实例开始的
//createApp方法返回实例本身，因此可以链式调用
//传递给createApp的选项用于配置文件的根组件
//该函数接受一个人根组件选项对象作为第一个参数
