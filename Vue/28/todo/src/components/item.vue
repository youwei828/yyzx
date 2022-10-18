<template>
    <div class="item">
        <input type="text" :value="todo.title" />
        <button @click="del(todo.id)">删除</button>
    </div>
</template>

<script setup>
// import useRequest from '../composables/useRequest';
import useTodo from '../composables/useTodo';
// const request = useRequest();
// 读取父组件循环的数据,不需要引入defineProps
const { del } = useTodo();
const { todo } = defineProps({
    //限制类型为对象，必须输入
    todo: { type: Object, required: true },
});
// 引入父组件的自定义事件
// const emit = defineEmits(['del']);
// const del = async () => {
//     await request.delete(todo.id);
//     // 点击事件删除之后调用父组件引入的回显页面
//     emit('del');
// };
</script>

<style lang="scss" scoped>
div.item {
    display: flex;
    input {
        padding: 10px;
        // 让input占用剩余可用空间
        flex: 1;
        outline: none;
    }
    button {
        margin-left: 10px;
        background-color: #a05616;
        color: white;
        border: none;
        padding: 5px 10px;
        &:hover {
            cursor: pointer;
        }
    }
}
</style>
