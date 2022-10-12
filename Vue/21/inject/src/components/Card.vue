<template>
    <div>
        <header><slot name="header" /></header>
        <main><slot /></main>
    </div>
</template>

<script>
export default {};
</script>

<style lang="scss" scoped>
div {
    border: solid 1px #ddd;
    margin-top: 20px;
    border-radius: 5px;
    header {
        background-color: #f3f3f3;
        border-bottom: solid 1px #ddd;
        padding: 10px;
    }
    main {
        padding: 10px;
    }
}
</style>
