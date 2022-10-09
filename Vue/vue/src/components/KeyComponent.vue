<template>
    <div>按键事件</div>
    <input type="text" @keyup="key" />
    <!-- alt加鼠标点击才会触发,exact是只按住某个按键才会触发 -->
    <div @click.alt.exact="ckey" style="background-color: red; width: 200px; height: 200px">鼠标点击事件</div>
</template>

<script>
export default {
    data() {
        return {};
    },
    methods: {
        key(e) {
            console.log(e.key);
        },
        ckey(e) {
            console.log(e);
        },
    },
};
</script>

<style lang="scss" scoped></style>
