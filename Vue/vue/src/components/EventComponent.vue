<template>
    <div @click="sum(1, 2, 3, 4, 5, $event), ev($event)">{{ num }}</div>
    <!-- <div @click="ev">事件对象</div> -->
</template>

<script>
export default {
    data() {
        return {
            num: 1,
        };
    },
    methods: {
        sum(...args) {
            // this.num++;
            // console.log(args);
            this.num = args.reduce((s, n) => s + n, this.num);
            // console.log(event);
            const event = args.pop();
            console.log(event);
        },
        ev(event) {
            console.log(event);
        },
    },
};
</script>

<style lang="scss" scoped></style>
