<template>
    <div>
        <!-- 要对其进行类型限制 -->
        <!-- <button-vue :content="btContent" hd-tip="@" type="success" style="margin: 10px" />
        <button-vue content="删除" type="danger" style="margin: 10px" />
        <button-vue content="成功" type="success" style="margin: 10px" />
        <button-vue content="编辑" :disabled="true" style="margin: 10px" />
        <button-vue content="保存" type="success" />
        <button-vue :="{ content: '保存', type: 'success', style: 'margin: 10px' }" /> -->
        <button-vue :content="btContent" type="success" class="cs" id="id" @click="show" />
        <hr />
        <!-- <button @click="btContent = '父组件'">父组件</button>{{ btContent }} -->
    </div>
</template>

<script>
import ButtonVue from './components/Button.vue';
export default {
    //注册组件
    components: { ButtonVue },
    data() {
        return {
            btContent: '反馈',
        };
    },
    methods: {
        show() {
            alert('人间值得');
        },
    },
};
</script>

<style lang="scss" scoped></style>
