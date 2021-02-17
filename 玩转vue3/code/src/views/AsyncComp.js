import { defineAsyncComponent } from 'vue';
const AsyncComp = defineAsyncComponent(
    () =>
    import ('./AsyncComponent.vue')
);

export default AsyncComp;