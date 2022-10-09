<template>
    <div @scroll.passive="d1" style="border: 10px green solid; height: 300px; overflow-y: auto">
        <!-- self,capture,stop,once.prevent -->
        <div @click="d2" style="background-color: red; height: 3000px">d2</div>
    </div>
    <a href="#" @click.passive="link">阻止默认事件</a>
</template>

<script>
export default {
    data() {
        return {};
    },
    methods: {
        d1() {
            console.log('d1');
        },
        d2() {
            // e.stopPropagation();//阻止向上冒泡
            console.log('d2');
        },
        link(e) {
            // e.preventDefault();
            console.log('link');
        },
    },
};
</script>

<style lang="scss" scoped></style>
