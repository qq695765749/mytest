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

  		// 与webhook配置相同，为了安全，请设置此参数
  		$secret = "123456789";
  		// 项目路径
  		$path = "/var/www/html/mytest/";
  		// 校验发送位置，正确的情况下自动拉取代码，实现自动部署
  		$signature = $_SERVER['HTTP_X_HUB_SIGNATURE'];
  		if ($signature) {
  			$hash = "sha1=".hash_hmac('sha1', file_get_contents("php://input"), $secret);
  			if (strcmp($signature, $hash) == 0) { 
  				echo shell_exec("cd {$path} && git pull");
  				exit();
  			}
  		}
  		http_response_code(404);

    }
   
    
}

