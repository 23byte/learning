<template>
    <div class="father">
        <h3>父组件</h3>
        <child>
            <template v-slot="{obj}">
                <div class="tmpl">
                    {{obj}}
                </div>
            </template>
        </child>
    </div>
</template>

<script>
import child from "./Child";//导入子组件
export default {
    name:"slotScopes",
    components:{
        child
    }
}
</script>