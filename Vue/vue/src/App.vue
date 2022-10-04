<script>
import ClassCompontent from './components/Classcomponents.vue';
import ClassList from './components/Clist.vue';
import styleComponentVue from './components/styleComponent.vue';
import ifCommentVue from './components/ifComment.vue';
import ClasscomponentsVue from './components/Classcomponents.vue';
import LessonFor from './components/LessonFor.vue';
import ArrComponentVue from './components/ArrComponent.vue';
export default {
    components: {
        ClassCompontent,
        ClassList,
        styleComponentVue,
        ifCommentVue,
        ClasscomponentsVue,
        LessonFor,
        ArrComponentVue,
    },
    data() {
        return {};
    },
};
</script>

<template>
    <!-- <class-compontent /> -->
    <!-- <class-list class="zyw" /> -->
    <!-- <style-component-vue /> -->

    <!-- <if-comment-vue /> -->
    <!-- <lesson-for /> -->
    <arr-component-vue />
</template>

<style></style>
