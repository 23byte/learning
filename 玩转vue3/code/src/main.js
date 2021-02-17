import { createApp } from 'vue'
import App from './App.vue'
import kClipBoard from './views/ClipBoard.vue'
import router from './router'
import store from './store'
import drag from './drag'
import AsyncComp from './views/AsyncComp.js'


const app = createApp(App);
app.component('k-clip-board', kClipBoard); //注册全局组件
app.component('async-comp', AsyncComp)
app.directive('drag', drag); //注册全局指令
app.use(store).use(router).mount('#app')