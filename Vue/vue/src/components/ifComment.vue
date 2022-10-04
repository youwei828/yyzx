<template>
    <div v-for="(lesson, index) in lessons" :key="index">
        <div v-show="lesson.isDelete" style="color: red">{{ lesson.tittle }}</div>
        <!-- <div v-else-if="lesson.price > 100" style="background-color: green">{{ lesson.tittle }}</div> -->
        <!-- <template v-else>{{ lesson.tittle }}</template> -->
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

<style lang="scss" scoped></style>
