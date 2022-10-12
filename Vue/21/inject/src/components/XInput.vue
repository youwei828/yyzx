<template>
    <label>
        <div>{{ title }}</div>
        <input type="text" v-model="content" @input="update" />
        <!-- <input type="text" v-model="content" @input="$emit('update:modelValue', $event.target.value)" />{{ content }} -->
    </label>
</template>

<script>
export default {
    //props数据不能直接修改，要在data里重新定义
    props: ['title', 'modelValue'],
    emits: ['update:modelValue'],
    //接收数据穿透的值
    inject: ['webname'],
    data() {
        return {
            content: this.modelValue,
        };
    },
    // methods: {
    //     update(v) {
    //         // this.content = v.target.value;
    //         this.$emit('update:modelValue', v.target.value);
    //     },
    // },
    watch: {
        content(v) {
            //watch监听的content是内容
            this.$emit('update:modelValue', v);
        },
    },
};
</script>

<style lang="scss" scoped>
label {
    display: flex;
    align-items: center;
    margin-top: 10px;
    div {
        color: #666;
        font: 14px;
        margin-right: 20px;
        width: 100px;
    }
    input {
        width: 250px;
        border: solid 3px rgb(99, 116, 101);
        padding: 5px 10px;
        color: #666;
        //去除input外边线
        outline: none;
    }
}
</style>
