<template>
    <div>
        你好 {{ obj.name }}
        <button @click="update">不能修改数据</button>
    </div>
</template>


<script>
import {markRaw,readonly} from 'vue';
export default {
    data:()=>({
        // obj:markRaw({name:'Vue'}),
        obj:readonly({name:'Vue'}),
    }),
    methods:{
        update(){
            this.obj.name = 'Ken';
            console.log(this.obj);
        }
    }
}
</script>