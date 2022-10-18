<template>
    <div class="add">
        <input type="text" v-model="title" placeholder="回车提交任务" @keyup.enter="onSubmit" />
    </div>
</template>

<script setup>
import useTodo from '../composables/useTodo';
import { ref } from 'vue';
const { add } = useTodo();
const title = ref('');
const onSubmit = () => {
    add({ title: title.value });
    title.value = '';
};
</script>

<style lang="scss" scoped>
div.add {
    display: flex;
    input {
        padding: 10px;
        border: 2px solid royalblue;
        flex: 1;
        outline: none;
    }
}
</style>
