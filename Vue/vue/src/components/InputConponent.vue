<template>
    <div>
        <input type="text" name="" id="" v-model="form.title" />
        <hr />
        <textarea v-model="form.content"></textarea>
        <hr />
        <input type="radio" name="" id="" v-model="form.sex" :value="1" />男
        <input type="radio" name="" id="" v-model="form.sex" :value="2" />女
        <hr />
        <select name="" id="" v-model="form.city" multiple>
            <option value="">===请选择城市===</option>
            <option :value="{ name: 'beijing' }">北京</option>
            <option :value="{ name: 'wuhan' }">武汉</option>
        </select>
        <!-- {{ form }} -->
        <!-- <input type="checkbox" v-model="form.isPost" />发布
        <hr />
        {{ form }}
        <hr /> -->
        <!-- 复选框加value -->
        <!-- <input type="checkbox" v-model="form.lessons" value="php" />php
        <input type="checkbox" v-model="form.lessons" value="vue" />vue
        <input type="checkbox" v-model="form.lessons" value="js" />js -->
    </div>
    <hr />
    <hr />
    <hr />
    <div>
        <label v-for="l of lessons" :key="l.value">
            <input type="checkbox" v-model="form.lessons" :value="l.value" />{{ l.title }}
        </label>
    </div>
    {{ form }}
    <input type="text" name="" id="" v-model.lazy="hd" />{{ hd }}
    <hr />
    <input type="text" name="" id="" v-model.number="num" />{{ num + 100 }}
    <hr />
    <input type="text" name="" id="" v-model.trim="title" />
</template>

<script>
import { title } from '../../../../zs/JS/test8/4';

const lessons = [
    { title: 'vue', value: 'vue' },
    { title: 'js', value: 'js' },
    { title: 'php', value: 'php' },
];
const form = {
    title: 'yuanshuju',
    content: '明月几时有',
    isPost: false,
    lessons: [],
    sex: 1,
    city: [{ name: 'beijing' }, { name: 'wuhan' }],
};
export default {
    data() {
        return {
            form,
            lessons,
            hd: 'renjian',
            num: 1,
            title: '人间',
        };
    },
    watch: {
        hd() {
            console.log('send');
        },
        title(n) {
            console.log(n.length);
        },
    },
};
</script>

<style lang="scss" scoped></style>
