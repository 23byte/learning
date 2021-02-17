<template>
    <div class="dynamic-arguments">
        <h2>
            模板插值
            <br/>
            <input type="text" v-model="msg"/>
            <br/>
            {{msg}}
            <br/>
        </h2>
        <h2>
            v-bind: 绑定属性
            <br />
            <a v-bind:[urlKey]="a">ken.com</a>
        </h2>
    </div>
</template>


<script>
import {ref} from 'vue';
export default {
    name:'DynamicArguments',
    setup(){
        let msg = ref('绿水青山等着我，旅行包都买好了，就差一个时机了');
        let a = ref("http://www.baidu.com");
        let urlKey = ref('href');
        return{
            msg,
            a,
            urlKey
        };
    }
}
</script>