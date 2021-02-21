<?php
namespace app\controller;


use app\model\User;
use think\Controller;
use think\Db;

class DataTest extends Controller
{
    public function index()
    {
//        $data = Db::table('tp_user')->where('status',0)->order('create_time')
//            ->limit(10)->select();
//        return json($data);
        $user = Db::name('user');
        $data1 = $user->where('status',0)->order('create_time')
            ->limit(10)->select();
        //当同一个对象实例第二次查询后，会保留第一次查询的值，可以使用removeOption()方法
        //清理掉上一次查询保留的值.

        $data2 = $user->removeOption('where')->removeOption('order')->select();
        return json($data2);
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

    public function insert(){
        $data = [
            'username'=>'邓紫棋',
            'password'=>'123',
            'gender'=>'女',
            'email'=>'dengziqi@163.com',
            'price'=>90,
            'details'=>'123',
            'create_time'=>date('Y-m-d H:i:s')
        ];
        $insert = Db::name('user')->insert($data);
        return $insert;
    }

    public function insertAll(){
        $dataAll = [
            [
                'username'=>'邓紫棋1',
                'password'=>'1234',
                'gender'=>'女',
                'email'=>'dengziqi1@163.com',
                'price'=>90,
                'details'=>'123',
                'create_time'=>date('Y-m-d H:i:s')
            ],
            [
                'username'=>'邓紫棋2',
                'password'=>'1232',
                'gender'=>'女',
                'email'=>'dengziqi2@163.com',
                'price'=>90,
                'details'=>'123',
                'create_time'=>date('Y-m-d H:i:s')
            ]
        ];

        Db::name('user')->insertAll($dataAll);
    }

    public function update(){
//        $data = [
//            'username' =>'邓超'
//        ];
//        Db::name('user')->where('id',27)->update($data);
//        Db::name('user')->where('id',29)->data($data)->update(['password'=>'456']);
        $data=[
            'username'=>'邓超',
            'id'=>19
        ];
        Db::name('user')->inc('price',3)->update($data);
    }

    public function delete(){
        Db::name('user')->delete(19);
    }

}