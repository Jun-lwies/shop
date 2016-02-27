<?php
//普通用户类
namespace Home\Controller;
use Think\Controller;
class UsersController extends Controller {
	//用户登录
	public function login(){
        function check_verify($code){
            $verify = new \Think\Verify();
            return $verify->check($code);
        }

		$db = M('user');
		$verify = I('post.verify');

		// 验证通过 验证验证码
		if(check_verify($verify)){
			$data['username'] = I('post.username');
			$data['password'] = md5(I('post.password'));
			$res = $db -> where($data) -> find();
			if($res){
				session('name',$res['username']);
				$ajaxData = 'true';
	    		$this->ajaxReturn($ajaxData);
			}else{
				$ajaxData = '用户名或密码错误';
	    		$this->ajaxReturn($ajaxData);
			}
			
		}else{
			$ajaxData = '验证码错误';
	    	$this->ajaxReturn($ajaxData);
		}
	}
	//检查是否登录了
	public function checkLogin(){
		if(session('name')){
			echo session('name');
		}else{
			echo "false";
		}
	}
	//用户注册
	public function reg(){
		function check_verify($code){
            $verify = new \Think\Verify();
            return $verify->check($code);
        }

		$db = M('user');
		$verify = I('post.verify');

		// 验证通过 验证验证码
		if(check_verify($verify)){
			$data['username'] = I('post.username');
			$data['password'] = md5(I('post.password'));
			$data['email'] = I('post.email');
			$res = $db -> add($data);
			if($res){
				session('name',$data['username']);
				$ajaxData = 'true';
	    		$this->ajaxReturn($ajaxData);
			}else{
				$ajaxData = '用户名或密码错误';
	    		$this->ajaxReturn($ajaxData);
			}
			
		}else{
			$ajaxData = '验证码错误';
	    	$this->ajaxReturn($ajaxData);
		}
	}
	//用户退出
	public function userOut(){
		session('name',null);
	}
}