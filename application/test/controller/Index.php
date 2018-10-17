<?php
namespace app\test\controller;
use think\Controller;
use think\Db;
class Index extends Controller
{
    public function autopull()
    {
		$param=input('param.');
		$param=json_encode($param);
  		Db::name('test')->insert(['con'=>$param]);
    }

}