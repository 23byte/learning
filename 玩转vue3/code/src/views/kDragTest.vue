<template>

    <k-drag-wrapper class="wrap" :realDatas="list" @get-new-datas="getNewDatas">
        <k-drag-item class="item" v-for="(item,index) in list" :key="index">
            <div>{{item}}</div>
        </k-drag-item>
    </k-drag-wrapper>
    
</template>


<script>
import kDragWrapper from './kDragWrapper';
import kDragItem from './kDragItem';

export default {
    name:'kDragTest',
    components:{
        kDragWrapper,
        kDragItem,
    },
    data(){
        return{
            list:[
                'Ken',
                'KenA',
                'KenB',
                'KenC',
                'KenD',
                'KenE',
                'KenF',
            ]
        }
    },
    methods:{
        getNewDatas(newDatas){
            console.log('newDatas',newDatas);
        }
    }
    
}
</script>