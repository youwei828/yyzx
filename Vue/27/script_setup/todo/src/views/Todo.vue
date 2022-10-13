<template>
    <div>
        {{ todos }}
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
const todos = ref([]);
onMounted(async () => {
    //写项目用axios
    todos.value = await fetch(`http://localhost:3000/news`).then(r => r.json());
});
</script>

<style lang="scss" scoped></style>
