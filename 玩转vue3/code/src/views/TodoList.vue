<template>
    <div class="todo-list">
        <div class="header">todo Lists</div>
        <input type="text" v-model="name" placeholder="请输入名字"/>
        &nbsp;&nbsp;
        <input type="text" v-model="sex" placeholder="请输入性别"/>
        &nbsp;&nbsp;
        <button @click="add" v-if="index === null">添加</button>  &nbsp;&nbsp;
        <button @click="update"  v-else>更新</button>  &nbsp;&nbsp;
        <button @click="clear" >清空数组</button>  &nbsp;&nbsp;

        <ul>
            <li v-for="(item,index) in list" :key="index">
                <span>名字为:{{ item.name }}</span>
                &nbsp;&nbsp;
                <span>性别为:{{ item.sex }}</span>
                <div class="btndiv">
                &nbsp;&nbsp;
                <button class="btn" @click="edit(index)">编辑</button>
                &nbsp;&nbsp;
                <button class="btn" @click="del(index)">删除</button>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    name:'todoList',
    data(){
        return{
            list:[],
            name:'',
            sex:'',
            index:null,
        }
    },
    methods:{
        add(){
            if(!this.name || !this.sex){
                return;
            }
            this.list.push({
                name:this.name,
                sex:this.sex
            });
            this.name = "";
            this.sex = "";
        },
        edit(index){
            let item = this.list[index];
            this.name = item.name;
            this.sex = item.sex;
            this.index = index;
            console.log(index);
        },
        update(){
            if(!this.name || !this.sex){
                return;
            }
            this.list[this.index].name = this.name;
            this.list[this.index].sex = this.sex;
            this.sex = "";
            this.name = "";
            this.index = null;
        },
        del(index){
            this.list.splice(index , 1);
            console.log(index,'--del')
        },
        clear(){
            this.list.length = 0
        }
    }
}
</script>
<style lang="scss" scoped>
.todo-list {
  width: 600px;
  margin: auto;
  .header {
    height: 60px;
    line-height: 60px;
    background-color: #3e3e3e;
    color: #dddddd;
    font-size: 48px;
    margin-bottom: 20px;
  }
  button {
    display: contents;
    cursor: pointer;

  }
  ul {
    padding: 0;
    li {
      text-align: left;
      height: 30px;
      margin-bottom: 10px;
      background-color: #ffffff;
      line-height: 30px;
      border-left: 5px solid #629a9c;
      border-radius: 5px;
      padding-left: 30px;
      padding-right: 30px;
      color: #ffdfa5;
      .btndiv {
        float: right;
      }
      .btn {
        margin-right: 20px;
        display: contents;
        cursor: pointer;
        text-align: right;
      }
    }
  }
}

li {
  list-style: none;
}
</style>