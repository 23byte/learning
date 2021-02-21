<?php

namespace app\model;
use think\Model;

class User extends Model{

    public function getStatusAttr($value){
        $myStatus = [-1=>'删除',0=>'禁用',1=>'正常',2=>'待审核'];
        return $myStatus[$value];
    }

    public function getNothingAttr($value,$data){
        $myStatus = [-1=>'删除',0=>'禁用',1=>'正常',2=>'待审核'];
        return $myStatus[$data['status']];
    }
    public function setEmailAttr($value)
    {
        return strtoupper($value);
    }
}