<template>
    <!-- 粘贴面板组件 -->
    <div class="fy-clip-board-wrap">
        <!-- 标题信息 -->
        <div class="clip-board-text">{{titleInfo}}</div>
        <!-- copy文本 -->
        <div class="copy-text-wrap">
            <!-- 超链接文字 -->
            <div class="copy-url-text" :class="{'copy-url-bg' : urlBg}" id="copyUrl" ref="copyUrl">
                {{copyUrl}}
            </div>

            <!-- 复制链接文字 -->
            <div class="copy-link" @click="handleClick">{{copyLink}}</div>
        </div>
    </div>
</template>


<script>
export default {
    name:'kClipBoard',
    props:{
        titleInfo:{
            type:String,
            default:""
        },
        copyUrl:{
            type:String,
            default:""
        },
        urlBg:{
            type:Boolean,
            default:false
        },
        copyLink:{
            type:String,
            default:"复制链接"
        }
    },
    setup(){
        const handleClick = () =>{
            window.getSelection().removeAllRanges(); //先取消默认选中
            const copyDOM = document.getElementById('copyUrl'); //获取dom元素
            const range = document.createRange(); //创建范围对象
            range.selectNode(copyDOM); //选中copy dom
            window.getSelection().addRange(range); //添加选中范围
            try{
                //容错处理
                let successful = document.execCommand("copy");
                console.log(successful);
                alert("复制成功");
            }catch(err){
                alert('无法复制');
            }
            window.getSelection().removeAllRanges(); //复制成功之后取消选中
        };
        return{
            handleClick
        }
    }
}
</script>