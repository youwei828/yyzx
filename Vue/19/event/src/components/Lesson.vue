<template>
    <div>
        <img :src="lesson.preview" :alt="lesson.title" />
        <h3 @dblclick="inputShow = true">
            <input
                v-if="inputShow"
                type="text"
                :value="lesson.title"
                @input="$emit('update:modelValue', $event.target.value)"
                @blur="inputShow = false"
                @keyup.enter="inputShow = false"
            />
            <strong>{{ lesson.title }}</strong>
        </h3>
        <h3 @dblclick="inputPriceShow = true">
            <input
                v-if="inputPriceShow"
                type="text"
                :value="lesson.price"
                @input="$emit('update:modelValuePrice', $event.target.value)"
                @blur="inputPriceShow = false"
                @keyup.enter="inputPriceShow = false"
            />
            <strong>{{ lesson.price }}</strong>
        </h3>
        <span @click="del()">x</span>
        <!-- <span @click="$emit('del', lesson)">x</span> -->
    </div>
</template>

<script>
export default {
    data() {
        return {
            inputShow: false,
            inputPriceShow: false,
        };
    },
    //取消默认注册
    // inheritAttrs: false,
    //$emits自定义触发事件,注册,可以传参数
    emits: {
        'update:modelValue': null,
        'update:modelValuePrice': null,
        //事件验证
        del(v) {
            if (/^\d+$/.test(v)) {
                return true;
            }
            console.error('del emit 需要数值参数');
        },
    },
    props: ['lesson', 'modelValue', 'modelValuePrice'],
    methods: {
        del() {
            if (confirm('确定删除')) this.$emit('del', this.lesson.id);
        },
    },
};
</script>

<style lang="scss" scoped>
div {
    border: solid 1px #ccc;
    text-align: center;
    //动画过渡时间
    transition: 0.5s;
    //相对定位
    position: relative;
    span {
        // 变成块元素
        display: block;
        background-color: #666;
        color: #fff;
        border-radius: 50%;
        width: 20px;
        height: 20px;
        //弹性盒模型使文字居中
        display: flex;
        // 主轴居中
        justify-content: center;
        // 交叉轴居中
        align-items: center;
        // 绝对定位
        position: absolute;
        // 在父元素内距离上面10px
        top: 10px;
        // 在父元素内距离右边10px
        right: 10px;
        cursor: pointer;
        font: 12px;
        opacity: 0;
        transition: 0.5s;
    }
    &:hover {
        //鼠标放上会有阴影
        box-shadow: 0 0 20px #aaa;
        //加上箭头确定某一个span显示
        > span {
            opacity: 1;
        }
    }
    h3 {
        padding: 0 0 20px 0;
        margin: 0;
        font: 16px;
    }
    img {
        width: 100%;
    }
}
</style>
