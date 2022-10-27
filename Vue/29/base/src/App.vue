<script setup>
import { ref } from 'vue'
import Anm from './components/Anm.vue'
import Trans from './components/Trans.vue'
const show = ref(false)
const beforeEnter = e => {
    gsap.set(e, {
        opacity: 0,
    })
}
//需要传入一个回调函数
const enter = (e, done) => {
    gsap.to(e, {
        opacity: 1,
        // 动画执行时间
        duration: 2,
        onComplete: done,
    })
}
// 当结束的时候执行
const leave = (e, done) => {
    gsap.to(e, {
        opacity: 0,
        duration: 2,
        onComplete: done,
    })
}
</script>
<template>
    <!-- <anm v-if="show">保存提交</anm> -->
    <!-- 需要用transition标签,并定义三个类 -->
    <!-- <Transition name="you">
        <trans v-if="show"> 过渡 </trans>
    </Transition> -->
    <!-- 自定义类名 -->
    <!-- enter-from-class="you-enter"
        enter-active-class="you-active"
        enter-to-class=""
        leave-from-class=""
        leave-active-class=""
        leave-to-class="" -->
    <!-- 使用动画库 -->
    <!-- appear属性让组件直接显示动画效果 -->
    <!-- <Transition
        appear
        enter-active-class="animate__animated animate__flip"
        leave-active-class="animate__animated animate__rotateOut"
    >
        <trans> 过渡 </trans>
    </Transition> -->
    <!-- 使用动画事件声明动画 -->
    <!-- beforeEnter enter afterEnter beforeLeave leave afterLeave -->
    <transition @before-enter="beforeEnter" @enter="enter" @leave="leave">
        <trans v-if="show"> Js控制动画 </trans>
    </transition>
    <button @click="show = !show">切换</button>
</template>
<style lang="scss" scoped>
button {
    display: block;
    margin-top: 20px;
}
// 给动画命名用把v变成名字
// 优化后的动画样式
.you-enter-from,
.you-leave-to {
    // opacity: 0;
    // transform: translateX(200px);
}
// .you-enter-active,
// .you-leave-active {
//     transition: 2s ease;
// }
.you-enter-active {
    animation-name: scale;
    animation-duration: 2s;
    animation-timing-function: ease;
}
.you-leave-active {
    animation-name: scalereverse;
    animation-duration: 2s;
    // animation-timing-function: ease;
    // animation-direction: reverse;
}
// .you-enter-to,
// .you-leave-from {
//     opacity: 1;
//     // transform: translateX(0);
// }
// 定义关键帧动画  需要把开始和结束取消
@keyframes scale {
    from {
        transform: scale(0);
    }
    to {
        transform: scale(1);
    }
}
@keyframes scalereverse {
    from {
        transform: scale(1);
    }
    to {
        transform: scale(0);
    }
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
