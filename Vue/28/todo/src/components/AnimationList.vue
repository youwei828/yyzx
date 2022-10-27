<template>
    <div class="form"><add class="add" /> <sort /></div>
    <div class="todo">
        <!-- vfor队列添加动画可以使用transition-group -->
        <transition-group
            :tag="tag"
            name="todo"
            @before-enter="beforeEnter"
            @enter="enter"
            appear=""
        >
            <slot />
        </transition-group>
    </div>
</template>

<script setup>
import gsap from 'gsap'
// 定制组价属性,接收从子组件传的数据
const prop = defineProps({
    duration: { default: 0.6 },
    delay: { default: 0.2 },
    tag: { default: null },
})
const beforeEnter = e => {
    gsap.set(e, {
        opacity: 0,
    })
}
const enter = (e, done) => {
    gsap.to(e, {
        opacity: 1,
        duration: prop.duration,
        onComplete: done,
        // 延迟，让数据一个一个出
        delay: e.dataset.index * prop.delay,
    })
}
</script>
<style lang="scss" scoped>
.todo-leave-to {
    opacity: 0;
    transform: scale(0);
}
.todo-leave-active {
    transition: 1s ease;
    position: absolute;
}
// move参考前面的元素
.todo-move {
    transition: all 1s ease;
}
</style>
