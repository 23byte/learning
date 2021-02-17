<template>
    <div class="child">
        <h3>子组件</h3>
        <slot :obj="obj"></slot>
    </div>
</template>

<script>
export default {
    name:'child',
    data:function(){
        return{
            obj:{
                name:'Ken',
            }
        };
    }
}
</script>