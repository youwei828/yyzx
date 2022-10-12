<template>
    <div>
        <card>
            <template #header>站点信息</template>
            <div>
                <x-input title="网站名称" v-model="config.site.title" />
                <x-textarea title="网站介绍" v-model="config.site.desc" />
            </div>
            <!-- {{ config }} -->
        </card>
    </div>
</template>

<script>
export default {
    inject: ['config'],
};
</script>

<style lang="scss" scoped></style>
