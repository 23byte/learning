<?php

namespace app\controller;
use think\Request;
class Error
{
    public function index(Request $request){
        return '此控制器不存在:'.$request->controller();
    }
}