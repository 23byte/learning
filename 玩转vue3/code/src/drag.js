// 挂载之前,需要监听绑定指令元素鼠标是否按下,获取按下时的起始位置,保存在disX,disY中.
// 鼠标按下拖动, 获取此时移动的位置差l,t 重新改变元素的位置.
// 鼠标停止移动,需要将监听鼠标是否抬起,将 onmousemove,onmouseup移除.

// src/drag.js
let drag = {
    beforeMount(el) {
        el.onmousedown = function(e) {
            // 获取鼠标点击出分别与 div 左边和上边的距离：鼠标位置 div 位置
            var disX = e.clientX - el.offsetLeft;
            console.log(disX, '--disX')
            var disY = e.clientY - el.offsetTop;
            console.log(disY, '--disY')
            document.onmousemove = function(e) {
                // 获取移动后 div 的位置：鼠标的位置 -disX/disY
                var l = e.clientX - disX;
                var t = e.clientY - disY;
                el.style.left = l + 'px';
                el.style.top = t + 'px';
            };
            // 停止移动
            document.onmouseup = function() {
                document.onmousemove = null;
                document.onmouseup = null;
            };
        };
    },
    mounted() {},
    beforeUpdate() {},
    updated() {},
    beforeUnmount() {}, // new
    unmounted() {},
};
export default drag;