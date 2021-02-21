<?php
namespace app\controller;


use app\model\User;
use think\Controller;
use think\Db;

class DataTest extends Controller
{
    public function index()
    {
        return'index';
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