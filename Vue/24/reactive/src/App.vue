<template>
    <div>
        {{ name }}
        <button @click="change">按钮</button>
    </div>
</template>

<script>
import { ref, reactive, toRefs } from 'vue';
export default {
    setup() {
        const yw = reactive({ name: '有为青年' });

        let change = () => (yw.name = '有为');
        return { ...toRefs(yw), change };
    },
};
</script>

<style lang="scss" scoped></style>
