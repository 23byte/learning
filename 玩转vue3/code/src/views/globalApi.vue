<template>
    <div class="global-api">
        <k-clip-board copyUrl="青山绿色"></k-clip-board>
        <br/>
        <div class="drag" v-drag></div>
    </div>
</template>

<script>
export default {
    name:'globalApi',
    setup(){}
}
</script>

<style lang="scss" scoped>
    .drag{
        position: relative;
        height: 50px;
        width: 50px;
        background-color: #21c573;
    }
</style>