<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
class Index extends Controller
{
    public function index()
    {
        echo phpinfo();
  }

    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }
}
