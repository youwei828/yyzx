<template>
    <div class="form"><add class="add" /> <sort /></div>
    <div class="todo">
        <!-- vfor队列添加动画可以使用transition-group -->
        <animation-list tag="ul" delay="1">
            <item
                :todo="todo"
                class="item"
                v-for="(todo, index) of todos"
                :key="todo.id"
                :data-index="index"
        /></animation-list>
    </div>
</template>

<script setup>
import Add from '../components/Add.vue'
import useTodo from '../composables/useTodo'
// 导入item组件
import item from '../components/item.vue'
import Sort from '../components/Sort.vue'
import AnimationList from '../components/AnimationList.vue'
import gsap from 'gsap'
const { todos, load } = useTodo()
load()
const beforeEnter = e => {
    gsap.set(e, {
        opacity: 0,
    })
}
const enter = (e, done) => {
    gsap.to(e, {
        opacity: 1,
        duration: 1,
        onComplete: done,
        // 延迟，让数据一个一个出
        delay: e.dataset.index * 0.1,
    })
}
//     fetch(`http://127.0.0.1:3000/news`).then(r => {
//     // return new Promise(reslove => {
//     //     setTimeout(() => {
//     //         reslove(r.json());
//     //     }, 2000);
//     // });
//     return r.json();
// });
// const del = async () => {
//     todos.value = await request.get();
// };
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
div.form {
    display: flex;
    margin-bottom: 20px;
    .add {
        flex: 1;
    }
}
div.todo {
    position: relative;
    color: rgb(16, 23, 29);
    display: flex;
    // 纵轴排列
    flex-direction: column;
    .item {
        margin-bottom: 10px;
        // position: absolute;
        width: 100%;
    }
}
</style>
