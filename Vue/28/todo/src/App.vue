<template>
    <div>
        <!-- <suspense>标签的作用是当异步完成的时候才会渲染标签，有两个插槽 -->
        <suspense>
            <template #default> <todo /></template>
            <!-- 第二个插槽是在请求过程中显示的内容，比如显示的按钮,例如两秒后进行 -->
            <template #fallback> loading... </template>
        </suspense>
    </div>
</template>

<script setup>
import Todo from './views/todo.vue';
</script>

<style lang="scss" scoped></style>
