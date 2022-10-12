<template>
    <div>
        <card>
            <template #header>微信管理</template>
            <div>
                <x-input title="aapid" v-model="config.weixin.appid" />
                <x-input title="key" v-model="key" />
                <x-textarea title="secret" v-model="config.weixin.secret" />
            </div>
            <!-- {{ config }} -->
        </card>
    </div>
</template>

<script>
export default {
    inject: ['config'],
    data() {
        return {
            key: 'value',
        };
    },
    methods: {
        show() {
            alert(this.key);
        },
    },
};
</script>

<style lang="scss" scoped></style>
