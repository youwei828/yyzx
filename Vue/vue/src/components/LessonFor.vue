<template>
    <div>
        <button @click="orderBy = 'price'" :class="{ 'order-type': orderBy == 'price' }">价格</button>
        <button @click="orderBy = 'comments'" :class="{ 'order-type': orderBy == 'comments' }">评论数</button>
        <button @click="lessonList = 'asc'" :class="{ 'order-type': orderType == 'asc' }">升序</button>
        <button @click="lessonList = 'desc'" :class="{ 'order-type': orderType == 'desc' }">降序</button>
        <template v-for="lesson in lessonList" :key="id"
            ><div>课程--{{ lesson.title }}价格--{{ lesson.price }}评论数--{{ lesson.comments }}</div></template
        >
    </div>
</template>
<script>
import lessons from '../../data/lessons';
export default {
    data() {
        return {
            lessons,
            orderBy: 'price',
            orderType: 'asc',
        };
    },
    computed: {
        lessonList: {
            get() {
                return this.lessons.sort((a, b) => {
                    return this.orderType == 'asc'
                        ? a[this.orderBy] - b[this.orderBy]
                        : b[this.orderBy] - a[this.orderBy];
                });
            },
            set(type) {
                this.orderType = type;
            },
        },
    },
};
</script>
<style lang="scss" scoped>
.order-type {
    background-color: aqua;
}
</style>
