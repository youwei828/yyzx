<template>
    <lesson v-for="lesson in lessons" :key="lesson.id" :lesson="lesson">
        <!-- 插槽属性传递 -->
        <!-- <template #default="slotProps"> -->
        <!-- 解构语法 -->
        <template #default="{ content, title, id }" v-slot:default>
            {{ id }}
            <button @click="del(id)">删除</button>
        </template>
    </lesson>
</template>

<script>
import lessons from './data';
import Lesson from './components/Lesson.vue';
export default {
    data() {
        return {
            lessons,
        };
    },
    components: {
        Lesson,
    },
    methods: {
        del(id) {
            const index = this.lessons.findIndex(l => l.id == id);
            this.lessons.splice(index, 1);
        },
    },
};
</script>

<style lang="scss" scoped>
div {
    padding: 10px;
    margin-bottom: 10px;
    border: solid 1px #ccc;
    display: flex;
    justify-content: space-between;
}
</style>
