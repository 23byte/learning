<?php
namespace app\controller;

use think\Controller;

class Before extends Controller
{
    protected $beforeActionList = [
        'first',
        // hello 方法执行不调用second前置
        'second' => ['except'=>'hello'],
        // thrid 前置只能通过调用 helo 和 data 方法触发
        'third'=>['only'=>'hello,data'],
    ];

    //空方法拦截
    public function _empty($name){
        return '此方法不存在: '.$name;
    }

    //protected 所写的方法只是内部调用,不在url进行访问
    protected function first()
    {
        echo 'first<br/>';
    }

    protected function second()
    {
        echo 'second<br/>';
    }

    protected function third()
    {
        echo 'third<br/>';
    }

    public function hello()
    {
        return 'hello';
    }

    public function data()
    {
        return 'data';
    }

    protected $flag = true;

    public function index()
    {
        if($this->flag){
            //设置成功后跳转页面的地址为上一级,默认的返回页面是$_SERVER['HTTP_REFERER']
            $this->success('注册成功','../');
        }else{
            //错误页面的默认跳转页面是返回前一页,通常不需要设置
            $this->error('注册失败');
        }
        return 'index';
    }
}
