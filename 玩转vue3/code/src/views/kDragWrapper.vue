<template>
    <!--
         需要定义三个参数,其中
        toEl表示保存拖向目标元素,
        fromEl表示拖拽源,
        children保存子元素的集合. -->
    <!-- 父级组件的created注册子组件分发出来的事件 this.$on -->
    <div ref="kDragWrapper" @dragenter.prevent @dragover.prevent>
        <slot />
    </div>
</template>

<script>
import { markRaw } from 'vue';
export default {
    name:'kDragWrapper',
    props:{
        realDatas:{  //用于区分一开始还没拖拽时,真实元素的位置.
            //当我们拖拽之后,我们当前元素的位置已经被我们打,所以我们需要将拖拽后的数据与
            //原始数据进行对比.然后将新的数据分发出去.
            type:Array,
            default:()=>{
                return[];
            }
        },
    },
    data(){
        return{
            toEl:'',
            fromEl:'',
            children:[],
        };
    },
    created(){
        this.toEl = '';
        this.fromEl = '';
        this.children = [];
      this.$on('on-drag-start', this.onDragStart);
      this.$on('ondrag-enter', this.onDragEnter);
      this.$on('on-drop', this.onDrop);
      this.$on('get-childs', (child) => {
        this.children.push(child);
      });
    },
    methods:{
        onDragStart(el){
            this.fromEl = el;
        },
        onDragEnter(el){
            this.toEl = el;
            if(this.fromEl === this.toEl){
                return;
            }
            if(this.isPrevElement(this.fromEl,this.toEl)){  //判断插入到目标元素的前面还是后面
                this.$refs["kDragWrapper"].insertBefore(this.fromEl,this.toEl);
            }else{
                this.$refs["kDragWrapper"].insertBefore(this.fromEl,this.toEl.nextSibling);
            }
        },
        getNewDatas(realDatas,dragAfterDatas){
            const orders = realDatas.map(realData =>{
                return dragAfterDatas.findIndex(dragAfterDatas => realDatas === dragAfterDatas);
            });
            const newDatas =[];
            orders.map((order,i)=>{
                newData[i] = this.data[order];
            });
            this.$emit("get-new-datas",newDatas);
        },
        onDrop(){
            if(!this.realDatas.length) return;
            const realElementOrders = [...this.$el.children].filter(
                child => child.classList.contains("ken-item__drag")
            );
            this.getNewDatas(realElementOrders,this.children);

        },
        isPrevElement(fromEl,toEl){  //我们拖拽结束时,拖拽源是在目标元素的前面还是后面
            while(fromEl.previousSibling !== null){
                if(fromEl.previousSibling === toEl){   
                    //循环判断拖拽源的前一个元素是不是目标源 如果是就返回真,否则就直接把前一个元素直接赋值给拖拽源
                    return true;
                }
                fromEl = fromEl.previousSibling;
            }
        }
    }
}
</script>