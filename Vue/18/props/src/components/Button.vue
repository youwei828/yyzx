<template>
    <!-- <div :class="[type, { disabled }]" :style="$attrs.style">
        <span v-if="hdTip">{{ hdTip }}</span>
        {{ text }}
    </div>
    <span></span>
    <hr />
    <button @click="text = '子组件'">子组件</button>{{ text }} -->
    <div v-bind="$attrs" :class="[type, { disabled }]">{{ text }}</div>
    <h2 v-bind="$attrs">click</h2>
</template>

<script>
export default {
    //当多个标签时取消系统自动传递class，id，在需要传递的标签加v-bind="$attrs",也可以独立设置
    inheritAttrs: false,
    props: {
        click: { type: Function },
        content: {
            type: String,
            // default: 'button'
            required: true, //必须需要的内容
        },
        //默认值
        //限制类型，可以使自己的类型， Boolean Number Function Object
        type: {
            type: String,
            default: 'info',
            //传入的内容进行验证
            validator(v) {
                return ['success', 'info', 'success', 'danger'].includes(v); //includes 查找括号内字符串是否包含前面的字符串
            },
        },
        hdTip: String,
        disabled: {
            type: Boolean,
            default: false,
        },
    },
    watch: {
        content(v) {
            this.text = v;
        },
    },
    data() {
        return {
            //变成响应式数据的初始值
            text: this.content,
        };
    },
    methods: {
        onClick() {
            this.text = 'loading...';
            setTimeout(() => (this.text = this.content), 3000);
        },
    },
};
</script>

<style lang="scss" scoped>
div {
    background-color: rgb(203, 161, 106);
    color: #fff;
    padding: 5px 10px;
    border-radius: 10px;
    // 透明度0.6
    opacity: 0.6;
    // 过渡时间
    transition: 1s;
    // 鼠标移动上去透明度1
    display: inline-block;
    &:hover {
        opacity: 1;
        cursor: pointer;
    }
    &.info {
        background-color: #ddd;
    }
    &.success {
        background-color: green;
    }
    &.danger {
        background-color: red;
    }
    &.disabled {
        background-color: #aaa !important; //强制优先级提高
        color: #666;
        cursor: default;
        opacity: 1;
    }
}
</style>
