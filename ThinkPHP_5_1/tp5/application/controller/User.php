<?php
namespace app\controller;
use app\model\User as UserModel;
class User
{
    public function index(){
        //$user = UserModel::get(24);
//        return $user->status;
        //return $user -> nothing;
        $result = UserModel::WithAttr('email',function ($value){
           return strtoupper($value);
        })->select();
        return json($result);
    }

    public function insert(){
        $user = new UserModel();
        $insert = $user->save([
            'username'=>'何明',
            'password'=>'123',
            'gender'=>'男',
            'email'=>'heming@163.com',
            'price'=>100,
            'details'=>'123',
            'uid'=>1011,
            'create_time'=>date('Y-m-d H:i:s')
        ]);
    }

    public function delete(){
        {
            UserModel::destroy(function ($query){
                $query->where('id','>',70);
            });
        }
    }
}