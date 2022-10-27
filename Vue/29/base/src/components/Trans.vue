<!-- <script setup>
import { ref } from 'vue'
const show = ref(false)
</script> -->
<template>
    <div><slot></slot></div>
</template>
<style lang="scss" scoped>
// section {
//     perspective: 800px;
// }
div {
    display: inline-block;
    border-radius: 8px;
    background-color: lightblue;
    padding: 10px 20px;
    // animation-name: tranx;
    // animation-duration: 2s;
    // transition: 1s;
    // animation-direction: alternate;
    // transition-timing-function: ease;
    // animation-iteration-count: infinite;
    cursor: pointer;
    // &:hover {
    //     // transform: rotateY(360deg) rotateX(360deg);
    //     background-color: lightslategrey;
    //     color: whitesmoke;
    //     animation-name: trany;
    //     animation-direction: alternate;
    //     animation-fill-mode: forwards;
    //     transition: 1s;
    //     animation-duration: 0.5s;
    // }
}

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
// @keyframes trany {
//     0% {
//         transform: translateY(0px);
//     }
//     50% {
//         transform: translateY(-7px);
//     }
//     100% {
//         transform: translateY(0px);
//     }
// }
</style>
