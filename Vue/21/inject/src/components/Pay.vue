<template>
    <div>
        <card>
            <template #header>在线支付</template>
            <div>
                <x-input title="支付宝" v-model="appName" />
                <x-input title="密钥" v-model="key" />
            </div>
        </card>
    </div>
</template>

<script>
export default {
    data() {
        return {
            appName: '小明',
            key: 'sdafasdadsadssf',
        };
    },
};
</script>

<style lang="scss" scoped></style>
