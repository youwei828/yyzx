<template>
    <count :init="5" @change="changeHandle" ref="countComponent" style="color: red">
        <h3>有为青年</h3>
        <h3>一生编程</h3></count
    >
    <hr />
    {{ changeHandle() }}
</template>

<script>
import Count from './components/Count.vue';
// setup是在beforeCreate和created之间运行的
import { ref, onBeforeMount, onMounted, onBeforeUpdate, onUpdated, onBeforeUnmount, onUnmounted, provide } from 'vue';
export default {
    components: { Count },
    setup() {
        let user = ref('有为青年');
        setTimeout(() => {
            user.value = '2222';
        }, 1000);
        provide('user', user);
        //子组件改变父组件的数据
        provide('updateUser', newValue => {
            user.value = newValue;
        });
        // let count = ref(0);
        //自动找到countComponent
        const countComponent = ref();
        // 模板挂载完之后在进行操作
        // onMounted(() => {
        //     console.log(countComponent.value.num);
        // });
        const changeHandle = v => {
            //判断子组件数据是否渲染结束，结束在读取数据
            return countComponent.value?.num;
            // countComponent.value?.num;不带return和大括号的写法
        };
        return { changeHandle, countComponent };
    },
};
</script>

<style lang="scss" scoped></style>
