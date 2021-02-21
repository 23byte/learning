<?php
namespace app\controller;
use think\Db;
class Search
{
    public function index(){
        //$result = Db::name('user')->where('id','=',20)->select();
//        $result = Db::name('user')->where('id','<>',20)->select();
        $result = Db::name('user')->where('email','like',['xiao%','li%'],'or')
            ->select();
        return json($result);
    }
    public function wherelike(){
        $result = Db::name('user')->whereLike('email','li%')->select();
        return json($result);
    }

    public function betweenTime(){
        $result = Db::name('user')->where('create_time','between time',
        ['2018-1-1','2018-8-8'])->select();
        return json($result);
    }

    public function subSelect(){
        $subQuery = Db::name('two')->field('uid')->where('gender','男')
            ->buildSql(true);
        $result = Db::name('one')->where('id','exp','in'.$subQuery)
            ->select();
        return json($result);
    }
}