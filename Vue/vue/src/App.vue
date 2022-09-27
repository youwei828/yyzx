<script>
// This starter template is using Vue 3 <script setup> SFCs
// Check out https://vuejs.org/api/sfc-script-setup.html#script-setup
import HelloWorld from './components/HelloWorld.vue';

// index.html>App.vue的export外的js代码>main.js>App.vue的export外的js代码>helloword.vue
export default {
    data() {
        return {
            title: 'hd',
            hl: 'hello world',
        };
    },
};
</script>

<template>
    <h1 class="hd">{{ title }}</h1>
    <h3>{{ hl }}</h3>
    <!-- <div>
        <a href="https://vitejs.dev" target="_blank">
            <img src="/vite.svg" class="logo" alt="Vite logo" />
        </a>
        <a href="https://vuejs.org/" target="_blank">
            <img src="./assets/vue.svg" class="logo vue" alt="Vue logo" />
        </a>
    </div> -->
    <HelloWorld msg="Vite + Vue" />
</template>

<style>
.hd {
    background-color: blue;
}
/* .logo {
    height: 6em;
    padding: 1.5em;
    will-change: filter;
}
.logo:hover {
    filter: drop-shadow(0 0 2em #646cffaa);
}
.logo.vue:hover {
    filter: drop-shadow(0 0 2em #42b883aa);
} */
</style>
