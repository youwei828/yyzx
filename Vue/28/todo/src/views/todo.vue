<template>
    <div class="form"><add class="add" /> <sort /></div>
    <div class="todo">
        <item :todo="todo" class="item" v-for="todo of todos" :key="todos.id" />
    </div>
</template>

<script setup>
import Add from '../components/Add.vue';
import useTodo from '../composables/useTodo';
// 导入item组件
import item from '../components/item.vue';
import Sort from '../components/Sort.vue';
const { todos, load } = useTodo();
load();
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
div.form {
    display: flex;
    margin-bottom: 20px;
    .add {
        flex: 1;
    }
}
div.todo {
    color: rgb(16, 23, 29);
    display: flex;
    // 纵轴排列
    flex-direction: column;
    .item {
        margin-bottom: 10px;
    }
}
</style>
