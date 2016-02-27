<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    //登录页面入口
    public function index(){
        $this->display();
    }
    //验证码
    public function verify(){
        $config =    array(
            'fontSize'    =>    25,    // 验证码字体大小
            'length'      =>    4,     // 验证码位数
            'useNoise'    =>    false, // 关闭验证码杂点
        );
        $Verify =     new \Think\Verify($config);
        $Verify->entry();
    }
    //管理员登录
    public function login(){
        $User = D("Admin"); // 实例化admin模型对象
        //$data = getdate();
        if (!$User->create($_POST,4)){ // 登录验证数据
            // 验证没有通过 输出错误提示信息
            exit($User->getError());
        }else{
            // 验证通过 验证验证码
            function check_verify($code){
                $verify = new \Think\Verify();
                return $verify->check($code);
            }
            //验证码通过 查询数据库
            if(check_verify($_POST['verify'])){
                $db = M('admin');
                $data['name'] = $_POST['name'];
                $data['password'] = $_POST['password'];
                $res = $db ->where($data)->find();
                if($res){
                    echo '1';
                }else{
                    echo '帐号或密码错误';
                }
            }else{
                echo '验证码错误';
            }

        }
    }
    //后台首页
    public function admin(){
        $this->display();
    }
    //后台首页顶部
    public function adminTop(){
        $this->display();
    }
    //后台首页左边
    public function adminLeft(){
        $this->display();
    }
    //后台首页右边
    public function adminRight(){
        $this->display();
    }
}