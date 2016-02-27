<?php
/**
 * Created by PhpStorm.
 * User: jun
 * Date: 2016/1/9
 * Time: 9:32
 * 商品控制类
 */
namespace Home\Controller;
use Think\Controller;
class GoodsController extends Controller {
    //增加商品
    public function addGoods(){
        if(empty($_POST)){
            $this->display();
        }else{
            $db = M('goods');
            if($db -> create()){
                $res = $db ->add();
                if($res){
                    echo '1';
                }else{
                    echo '2';
                }
            }else{
                echo '请求有误';
            }
        }
    }
    //展示商品
    public function showGoods(){
        $db = M('goods');
        $pageStar = intval($_GET['page']);
        $pageEnd =4;
        $res = $db ->limit($pageStar,$pageEnd)->select();
        $res2 = $db -> count('id');
        $db2 = M('classify');
        $res3 = $db2 ->select();
        $this -> assign('goods',$res);
        $this -> assign('num',$res2);
        $this -> assign('classify',$res3);
        $this -> display();
    }
    //搜素
    public function searchGoods(){
        $db = M('goods');
        $data['name'] = I('name');
        $data['classify'] = I('classify');
        if($data['name']){
            $data2['name']=$data['name'];
            $res = $db ->where($data2)->select();
        }else if($data['classify']){
            $data2['classify']=$data['classify'];
            $res = $db ->where($data2)->select();
        }else{
            header('refresh:0;url='.APP_LINK."Goods/showGoods");
            $res = $db ->where($data)->select();
        }
        $this -> assign('goods',$res);
        $this -> display();
    }
    //修改商品信息
    public function reviseGoods(){
        //当是get请求时，跳转到修改页面
        //post请求时，进行修改
        if(empty($_POST)){
            $db = M('goods');
            $data['id'] = $_GET['id'];
            $res = $db ->where($data)->find();
            $this->assign('goods',$res);
            $this->display();
        }else{
            $db = M('goods');
            if($db -> create()){
                $res = $db ->save();
                if($res){
                    echo '1';
                }else{
                    echo '2';
                }
            }else{
                echo '请求有误';
            }
        }
    }
    //删除商品信息
    public function deleteGoods(){
        $db = M('goods');
        $data['id'] = $_GET['id'];
        $res = $db -> delete($data['id']);
        if($res){
            echo '1';
        }else{
            echo '0';
        }
    }
    //展示分类
    public function showClassify(){
        $db = M('classify');
        $res = $db ->select();
        if($_GET['get']=='1'){
            //dump($res);
            $this->ajaxReturn($res);
        }else{
            $this->assign('classify',$res);
            $this->display();
        }
    }
    //增加分类
    public function addClassify(){
        $db = M('classify');
        $data['classify'] = $_POST['classify'];
        $res = $db ->add($data);
        if($res){
            header("Location:".APP_LINK."Goods/showClassify");
        }else{
            echo '添加失败';
        }
    }
    //删除分类
    public function deleteClassify(){
        $db = M('classify');
        $data['id'] = $_GET['id'];
        $res = $db -> delete($data['id']);
        if($res){
            echo '1';
        }else{
            echo '0';
        }
    }
    //修改分类
    public function reviseClassify(){
        //当是get请求时，跳转到修改页面
        //post请求时，进行修改
        if(empty($_POST)){
            $db = M('classify');
            $data['id'] =I('id');
            $res = $db ->where($data)->find();
            $this->assign('classify',$res);
            $this->display();
        }else{
            $db = M('classify');
            $data['id'] = $_POST['id'];
            $data['classify'] = $_POST['classify'];
            $res = $db ->where('id='.$data['id'])->save($data);
            if($res){
                echo '修改成功';
                header('refresh:1;url='.APP_LINK."Goods/showClassify");
            }else{
                echo '提交失败';
                header('refresh:1;url='.APP_LINK."Goods/reviseClassify?id=".$data['id']);
            }
        }

    }
}