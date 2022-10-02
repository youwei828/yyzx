<template>
    <div class="Classcomponents">
        <!-- <h1 class="package" :class="{ current: active, rj: active }">人间</h1> -->
        <h1 class="package" :class="['current']">人间</h1>
    </div>
</template>

<script>
export default {
    data() {
        return {
            active: true,
        };
    },
};
</script>

<style lang="scss" scoped>
.Classcomponents {
    .rj {
        color: red;
    }
    .current {
        background-color: yellow;
    }
}
</style>
