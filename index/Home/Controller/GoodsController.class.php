<?php
namespace Home\Controller;
use Think\Controller;
class GoodsController extends Controller {
    //商品详情
    public function showGood(){
        $db = M('goods');
        $id = I('get.id');
        $res = $db -> where('id='.$id)->find();
        //dump($res);
        $this -> assign('goods',$res);
        $this -> display();
    }
    //加入购物车商品数据
    public function addGood(){
        $db = M('goods');
        $id = I('get.id');
        $res = $db -> where('id='.$id)->field('id,name,address,classify,price,photo')->find();
        $this -> ajaxReturn($res);
    }
    //查看购物车
    public function carGoods(){
        $name = session('name');
        $this ->assign('name',$name);
        $this ->display();
    }
}