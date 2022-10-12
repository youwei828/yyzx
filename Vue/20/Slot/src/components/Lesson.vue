<template>
    <div>{{ lesson.title }} <slot content="插槽传递1" title="插槽传递2" :id="lesson.id" /></div>
</template>

<script>
export default {
    props: ['lesson'],
};
</script>

<style lang="scss" scoped></style>
