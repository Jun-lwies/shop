<?php
//用户管理类
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
	//用户查询
	public function showUser(){
		$db = M('user');	
		$res = $db -> field('id,username')->select();
		$this -> assign('user',$res);
		$this -> display();
	}
	//增加用户
	public function addUser(){
		if(empty($_POST)){
			$this ->display();
		}else{
			$db = M('user');
			$data['username'] = I('post.username');
			$data['password'] = md5(I('post.password'));
			$data['email'] = I('post.email');
			$res = $db -> add($data);
			if($res){
				echo "增加成功";
				header("refresh:1;url=".APP_LINK."User/showUser");
			}else{
				echo "增加失败";
				header("refresh:1;url=".APP_LINK."User/addUser");
			}
		}
	}
	//修改用户
	public function reviseUser(){
		if(empty($_POST)){
			$data = I('get.id');
			$db = M('user');
			$res = $db -> field('id,username,email') -> find();
			$this -> assign('user',$res);
			$this -> display();
		}else{
			//先检查两个密码是否一致
			$pwd = I('post.password');
			$surePwd = I('post.surepassword');
			if( $pwd == $surePwd ){
				$db = M('user');
				$id = I('post.id');
				$data['username'] = I('post.username');
				$data['password'] = md5(I('post.password'));
				$data['email'] = I('post.email');
				$res = $db -> where('id='.$id) -> save($data);
				if($res){
					echo "修改成功";
					header("refresh:1;url=".APP_LINK."User/showUser");
				}else{
					echo "修改失败";
					header("refresh:1;url=".APP_LINK."User/reviseUser?id=".$id);
				}
			}else{
				echo $pwd.'/'.$surePwd;
				$id = I('post.id');
				echo "密码不一致";
				header("refresh:2;url=".APP_LINK."User/reviseUser?id=".$id);
			}
		}
	}
	//删除用户
	public function deleteUser(){
		$id = I('get.id');
		$db = M('user');
		$res = $db ->where('id='.$id)->delete();
		if($res){
			echo "1";
		}else{
			echo "false";
		}
	}
}