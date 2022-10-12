<template>
    <label>
        <div>{{ title }}</div>
        <textarea
            :rows="rows"
            v-model="content"
            @input="this.$emit('update:modelValue', $event.target.value)"
        ></textarea>
        <!-- <input type="text" v-model="content" @input="update" />{{ webname }} -->
        <!-- <input type="text" v-model="content" @input="$emit('update:modelValue', $event.target.value)" />{{ content }} -->
    </label>
</template>

<script>
export default {
    //props数据不能直接修改，要在data里重新定义
    //设置对象形式可以对数据进行限制
    props: {
        title: { type: String, required: true },
        modelValue: String,
        rows: {
            type: Number,
            default: 3,
        },
    },
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
    textarea {
        border: solid 3px rgb(99, 116, 101);
        padding: 5px 10px;
        color: #666;
        //去除input外边线
        width: 250px;
        outline: none;
    }
}
</style>
