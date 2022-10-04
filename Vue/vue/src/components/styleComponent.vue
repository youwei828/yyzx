<template>
    <div style="color: red" :style="style">list</div>
</template>

<script>
export default {
    data() {
        return {
            style: { backgroundColor: 'green' },
        };
    },
};
</script>

<style lang="scss" scoped></style>
