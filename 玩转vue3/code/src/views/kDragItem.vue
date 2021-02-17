<template>
 <div
   @dragstart.stop="dragstart" 
   @dragenter.stop="dragenter" 
   @dragend.stop="drop"  
   :draggable="true" 
   class="ken-item__drag"
 >
   <slot />
 </div>
</template>

<script>
import EventEmitter from "./utils/mixins/emitters";

export default {
 name: "kDragItem",
 mixins: [EventEmitter],
 mounted() {
   this.dispatch("DragWrapper", "get-childs", this.$el);
 },
 methods: {
   dragstart() {
     this.dispatch("kDragWrapper", "on-drag-start", this.$el);
   },
   dragenter() {
     this.dispatch("kDragWrapper", "on-drag-enter", this.$el);
   },
   drop() {
     this.dispatch("kDragWrapper", "on-drop");
   }
 }
};
</script>