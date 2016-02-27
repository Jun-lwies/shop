<?php
//首页类
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $this ->display();
    }
    //首页商品类别
    public function showClassify(){
    	$db = M('classify');
    	$res = $db ->select();
    	$this->ajaxReturn($res);
    }
    //首页商品展示
    public function showGoods(){
    	$db = M('goods');
    	$res = $db -> field('id,name,address,classify,price,photo')-> select();
    	$this->ajaxReturn($res);
    }
}