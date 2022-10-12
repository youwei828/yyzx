<template>
    <div ref="hdd">
        <div @click="timeOut">{{ hd }}</div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            hd: '有为青年',
            timeOut: null,
        };
    },

    // beforeCreate,created,beforeMount都不能操作dom
    beforeCreate() {
        // console.log(this.hd);
        // console.log(this.$refs.hdd);
    },
    created() {
        // console.log(this.$refs.hdd);
        // console.log(this.hd);
    },
    beforeMount() {},
    mounted() {},
    //数据发生变化触发update
    beforeUpdate() {},
    updated() {},
    beforeUnmount() {},
    unmounted() {},
};
</script>

<style lang="scss" scoped></style>
