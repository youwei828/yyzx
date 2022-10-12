<template>
    <main>
        <div
            v-for="(component, index) of components"
            :key="index"
            @click="currentComponent = component.name"
            :class="{ active: component.name == currentComponent }"
        >
            {{ component.title }}
        </div>
    </main>
    <button @click="callComponent">button</button>
    <input ref="inputref" />
    <!-- 动态加载组件//缓存组件keepalive -->
    <KeepAlive> <component :is="currentComponent" ref="component" /></KeepAlive>
    <!-- <input v-model="student" />{{ student }} -->
    <!-- {{ config }} -->
</template>

<script>
import Weixin from './components/Weixin.vue';
import Site from './components/Site.vue';
// import Pay from './components/Pay.vue';
//导入计算方法，使用计算函数包裹被响应的数据
import { computed } from 'vue';
import config from './config';
export default {
    methods: {
        callComponent() {
            this.$refs.component.show();
        },
    },
    data() {
        return {
            config,
            components: [
                { title: '微信管理', name: 'weixin' },
                // { title: '在线支付', name: 'pay' },
                { title: '网站信息', name: 'site' },
            ],
            currentComponent: 'weixin',
            //变成对象借用js的引用数据的特性
            // student: { name: '有为' },
            student: '有为',
        };
    },
    components: { Weixin, Site },
    //数据穿透
    // provide: { webname: '有为青年' },
    //如果接收data里的数据，就需要转化为函数
    provide() {
        //计算属性本来就是响应式
        return { webname: computed(() => this.student), config: this.config };
    },
};
</script>

<style lang="scss" scoped>
main {
    display: flex;
    div {
        border: 1px solid #ddd;
        padding: 10px;
        margin-top: 20px;
        cursor: pointer;
        &.active {
            background-color: deepskyblue;
            transition: 0.5s;
        }
    }
}
</style>
