<!-- <template>
        <div><input type="text" :value="content" @input="change" />{{ content }}</div>
    </template>

    <script>
    export default {
        data() {
            return {
                content: this.modelValue,
            };
        },
        emits: ['update:modelValue'],
        props: ['modelValue'],
        methods: {
            change(e) {
                this.content = e.target.value;
                this.$emit('update:modelValue', this.content);
            },
        },
    };
    </script>

    <style lang="scss" scoped></style> -->
