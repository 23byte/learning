<template>
    <div ref="root">
        <button @click="click">click</button>
        <button @click="toHome">toHome</button>
        <button @click="toAbout">toAbout</button>
    </div>
</template>

<script>
import { getCurrentInstance , ref } from 'vue';
import { createRouter,createWebHistory} from 'vue-router';
import OtherRoute from './TestCounter.vue';
    export default {
        name:'TestRoute',
        props:{
            test:{
                type:String,
                default:'test'
            }
        },
        data(){
            return{
                msg:'haha',
            }
        },
        setup(){
            let {ctx} = getCurrentInstance();
            let root = ref(null);
            let routes = [
                {
                    path:'/',
                    name:'Home',
                    component:import('./Home.vue')
                },
                {
                    path:'/about',
                    name:'About',
                    component:import('./About.vue')
                }
            ];
            let router = createRouter({
                history:createWebHistory(process.env.BASE_URL),
                routes
            });
            let removeRoute = router.addRoute({
                path:'/otherroute',
                name:'/OtherRoute',
                component:OtherRoute,
            });
            let isHasRoute = router.hasRoute('OtherRoute');
            let route = router.getRoutes();
            router.removeRoute('OtherRoute');
            let isRemove = router.hasRoute('OtherRoute');
            route = router.getRoutes();
            let click = () => {
                console.log(ctx);
                console.log(ctx.$attrs);
                console.log(ctx.$data);
                console.log(ctx.$props);
                console.log(ctx.$el);
                console.log(ctx.$options);
                console.log(ctx.$refs);
                console.log(ctx.$root);
                console.log(ctx.$router);
                console.log(ctx.$slots);
                console.log(ctx.$toast);
                console.log(ctx.$watch);
            };
            let toHome = ()=>{};
            let toAbout = ()=>{};

            return{
                click,
                toHome,
                toAbout,
                root
            }
        }
    }
</script>

<style scoped>

</style>