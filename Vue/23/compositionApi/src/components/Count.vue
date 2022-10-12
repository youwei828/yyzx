<template>
    <component :is="defaults[0]" />
    <button @click="sub">-</button>
    <span :style="attrs.style"> {{ num }}</span>
    <button @click="add">+</button>
    <component :is="defaults[1]" />
    {{ sum }}
    <hr />
    {{ user }}
    <button @click="updateUser('有为')">123</button>
</template>

<script>
import { ref, watch, watchEffect, computed, inject } from 'vue';
export default {
    //自己处理标签传递来的数据
    inheritAttrs: false,
    props: {
        init: {
            type: Number,
            default: 3,
        },
    },

    emits: {
        change: null,
    },
    setup(props, context) {
        // 接收父组件穿透的数据
        const user = inject('user', '(第二个参数为默认值)');
        const updateUser = inject('updateUser');
        // expose是限制父组件对子组件数据读取
        const { emit, expose, attrs, slots } = context;
        const defaults = slots.default();
        let num = ref(props.init);
        let add = () => {
            num.value++;
            //在添加数字的时候执行自定义change事件
            emit('change');
        };
        let sum = computed(() => num.value + 100);
        let sub = () => {
            num.value--;
            emit('change');
        };
        // watch(num, v => {
        //     if (v < 0) num.value = 0;
        // });
        //在初始化的时候就进行监听
        const stop = watchEffect(() => {
            if (num.value < 0) num.value = 0;
            emit('change');
        });
        //停止监听
        // stop();
        //只暴露num
        expose({ num });
        return { num, add, sub, attrs, defaults, sum, user, updateUser };
    },
    //     data() {
    //         return {
    //             num: 3,
    //         };
    //     },
    // methods: {
    //     add() {
    //         this.num++;
    //         console.log(this.num);
    //     },
    // },
};
</script>

<style lang="scss" scoped></style>
