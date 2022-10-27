<script setup>
import { ref } from 'vue'
import Anm from './components/Anm.vue'
import Trans from './components/Trans.vue'
const show = ref(false)
</script>
<template>
    <!-- <anm v-if="show">保存提交</anm> -->
    <!-- 需要用transition标签,并定义三个类 -->
    <Transition>
        <trans v-if="show"> 过渡 </trans>
    </Transition>
    <button @click="show = !show">切换</button>
</template>
<style lang="scss" scoped>
button {
    display: block;
    margin-top: 20px;
}
// 优化后的动画样式
.v-enter-from,
.v-leave-to {
    opacity: 0;
    transform: translateX(200px);
}
.v-enter-active,
.v-leave-active {
    transition: 2s ease;
}
.v-enter-to,
.v-leave-from {
    opacity: 1;
    transform: translateX(0);
}

// 消失--过渡--出现
// 定义过初始什状态
// .v-enter-from {
//     opacity: 0;
//     transform: translateX(200px);
// }
// // 定以过渡中间世间以及样式
// .v-enter-active {
//     transition: 2s ease;
// }
// // 定义过渡达到的目标状态
// .v-enter-to {
//     opacity: 1;
//     transform: translateX(0);
// }
// // 出现--过渡--消失
// .v-leave-from {
//     opacity: 1;
// }
// .v-leave-active {
//     transition: 2s ease;
//     transition-duration: 2s;
// }
// .v-leave-to {
//     opacity: 0;
//     transform: translateX(200px);
// }
// div {
//     background-color: lightblue;
//     padding: 20px;
//     animation-name: tranx;
//     animation-duration: 2s;
//     animation-direction: alternate;
//     transition-timing-function: ease;
//     animation-iteration-count: infinite;
// }
// button {
//     margin-top: 50px;
// }
// @keyframes tranx {
//     0% {
//         transform: translateX(-5px);
//     }
//     20% {
//         transform: translateX(5px);
//     }
//     40% {
//         transform: translateX(-5px);
//     }
//     60% {
//         transform: translateX(5px);
//     }
//     80% {
//         transform: translateX(-5px);
//     }
//     100% {
//         transform: translateX(0px);
//     }
// }
</style>
