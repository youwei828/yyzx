<template>
    <div class="lesson">
        <lesson
            v-for="db in dbs"
            :key="db.id"
            :lesson="db"
            @del="show"
            v-model="db.title"
            v-model:modelValuePrice="db.price"
        />
        <!-- {{ dbs[0].title }} -->
        <!-- <input type="text" :value="title" @input="title = $event.target.value" /> -->
        <!-- {{ title }} -->
        <!-- <hd-input v-model:value="title" /> -->
        <!-- <hd-input v-model:modelValue="title" /> -->
        <!-- 当子组件命名为modelValue时，可以直接写v-model -->
        <!-- <hd-input v-model="title" /> -->
        <!-- <hd-input :value="title" @update:value="change" /> -->
    </div>
</template>

<script>
import dbs from '../data/data';
import Lesson from './components/Lesson.vue';
import HdInput from './components/HdInput.vue';
export default {
    //组件注册
    components: { Lesson, HdInput },
    data() {
        return {
            dbs,
            title: '标题',
        };
    },
    methods: {
        // change(v) {
        //     this.title = v;
        // },
        //也可以写在标签里面
        // input(e) {
        //     this.title = e.target.value;
        // },
        show(id) {
            // console.log(lesson);
            // findIndex() 方法返回传入一个测试条件（函数）符合条件的数组第一个元素位置。
            const index = this.dbs.findIndex(l => l.id == id);
            this.dbs.splice(index, 1);
        },
    },
};
</script>

<style lang="scss" scoped>
.lesson {
    //父组件设置栅格
    display: grid;
    //三列，平均百分比
    grid-template-columns: repeat(3, 1fr);
    // 列间距
    column-gap: 10px;
}
</style>
