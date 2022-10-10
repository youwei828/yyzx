<template>
    <div>
        <header><slot name="header" /></header>
        <main><slot name="main" /></main>
        <footer><slot name="footer" /></footer>
        <slot name="default"></slot>
    </div>
</template>

<script>
export default {};
</script>

<style lang="scss" scoped>
div {
    color: rgb(44, 139, 222);
    header,
    main,
    footer {
        border: 1px solid black;
        padding: 10px;
        border-bottom: 0;
    }
    footer {
        border-bottom: 1px solid black;
    }
}
</style>
