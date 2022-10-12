import { createApp } from 'vue';
import './style.css';
import App from './App.vue';
import Card from './components/Card.vue';
import XInput from './components/XInput.vue';
import XTextarea from './components/XTextarea.vue';
const app = createApp(App);
// 将Card注册为全局组件
app.component('card', Card);
app.component('x-input', XInput);
app.component('x-textarea', XTextarea);
app.config.unwrapInjectedRef = true;
app.mount('#app');
