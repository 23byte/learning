import Toast from './Toast.vue';
import { createApp } from 'vue';
const toast = {};
toast.install = (app) => {
    //扩展vue插件
    const ToastCon = createApp(Toast);
    const ktoast = document.createElement('div');
    ktoast.id = 'ktoast';
    //添加到body后面
    document.body.appendChild(ktoast);
    console.log('ktoast', ToastCon);
    //挂载dom
    let hh = ToastCon.mount('#ktoast');
    console.log('ktoast', hh);
    //给vue原型添加toast方法
    app.config.globalProperties.$toast = (
        msg,
        options = { duration: 800, direction: 'top' }
    ) => {
        //我们调用时赋值 message
        //将 visible 设置为true
        //默认 3s 之后设置为 false 关闭toast
        return new Promise((resolve) => {
            if (options.direction === 'bottom') {
                ktoast.style.top = '95%';
            }
            if (options.direction === 'center') {
                ktoast.style.top = '50%';
            }
            hh.message = msg;
            hh.visible = true;
            setTimeout(() => {
                hh.visible = false;
            }, options.duration);

            resolve(true);
        })
    }
}

export default toast;