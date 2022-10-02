<template>
    <div class="classList">
        <div v-for="(lessons, index) in lessons" :key="index">
            <span :class="{ 'is-delete': lessons.status }"> {{ lessons.title }}</span>
            <button @click="lessons.status = !lessons.status">{{ lessons.status ? '取消删除' : '删除' }}</button>
        </div>
    </div>
</template>

<script>
import lessons from '../../data/lessons';
export default {
    data() {
        return {
            lessons,
        };
    },
};
</script>

<style lang="scss" scoped>
.classList {
    div {
        display: flex;
        justify-content: space-between;
    }
    span {
        &.is-delete {
            text-decoration: line-through;
            background: red;
        }
    }
}
</style>
