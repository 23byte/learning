<?php
namespace app\controller;


use app\model\User;
use think\Controller;
use think\Db;

class DataTest extends Controller
{
    public function index()
    {

        //$data = Db::table('tp_user')->where('id',127)->findOrEmpty();
       // $data = Db::table('tp_user')->where('id',27)->find();
      //  return Db::getLastSql();  //可以得到最近一条SQL查询的原生语句
//        $data = Db::table('tp_user')->find();
        //find方法默认查找第一条数据
        //find方法查询结果不存在 ， 返回null , 否则返回结果数组
        //return json($data);
        //$data = Db::name('user')->where('id',20)->value('username');
        //return $data;
        $data = Db::name('user')->column('username','id');
        return json($data);
    }
    public function getNoModelData()
    {
        //使用 table 方法要写上完整的表明 tp_user
        $data = Db::name('user')->select();
        return json($data);
    }
    public function getModelData(){
        $data = User::select();
    }

}