<script setup>
import 'animate.css'
import { ref } from 'vue'
const action = ref('on')
</script>
<template>
    <!-- 设置元出入的模式  mode="in" 默认是in  out-in先出后进-->
    <!-- you属性可以单独设置动画时间 -->
    <transition
        enter-active-class="animate__animated animate__zoomInDown you"
        leave-active-class="animate__animated animate__zoomOutDown you"
        mode="out-in"
    >
        <button v-if="action == 'on'" @click="action = 'off'" class="on">
            开启
        </button>
        <button v-else="" @click="action = 'on'" class="off">关闭</button>
    </transition>
</template>
<style lang="scss">
//
.you {
    animation-duration: 4s !important;
}
button {
    padding: 5px 10px;
    color: white;
    border: none;
    cursor: pointer;
    &.on {
        background-color: rgba(35, 117, 24, 0.594);
    }
    &.off {
        background-color: rgba(176, 39, 27, 0.594);
    }
}
</style>
