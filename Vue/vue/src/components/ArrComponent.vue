<template>
    <div>
        <div v-for="(a, index) in arr" key="index">{{ a }}</div>
    </div>
</template>

<script>
// const hd = { name: 'tom' };
//push shift unshift pop splice sort reverse
const arr = ['tom'];
export default {
    data() {
        return {
            // hd,
            arr,
        };
    },
    mounted() {
        setTimeout(() => this.arr.push('sili'), 2000);
    },
};
</script>

<style lang="scss" scoped></style>
