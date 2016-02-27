<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zn">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="http://libs.baidu.com/jquery/2.0.0/jquery.js"></script>
    <script src="//cdn.bootcss.com/avalon.js/1.5.5/avalon.min.js"></script>
    <script src="//cdn.bootcss.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script>
    	$.ajaxSetup({ 
		    async : false 
		});
		var vm = avalon.define({
			$id : 'app',
			//判断是否登录了
			userName :'',
			login : false,
			checkLogin : function(){
				$.get("<?php echo (APP_LINK); ?>Users/checkLogin",function(data,status){
				   	if(data == 'false'){
				   		vm.login = false
				   	}else{
				   		vm.login = true
				   		vm.userName = data
				   	}
				});
			},
			//获取商品分类写入模版
			classify : [],
			getClassify : function(){
				$.get("<?php echo (APP_LINK); ?>Index/showClassify",function(data,status){
				   // console.log(data);
				   vm.classify = data
				});
			},
			//购物车商品写入
			getCarGoods : function(){
				vm.goods=localStorage.goods.split('},');
				 // = carGoods;
				//console.log(carGoods);
				console.log(vm.goods);
			},
			goods : [],
		});
		vm.getCarGoods();
		vm.checkLogin();
		vm.getClassify();
    </script>
<body ms-controller='app'>
	<nav class="navbar navbar-default">
	  <div class="container">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="#">首页</a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <!-- <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
	        <li><a href="#">Link</a></li> -->
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">商品分类<span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li ms-repeat='classify'><a href="">{{el.classify}}</a></li>
	          </ul>
	        </li>
	      </ul>
	      <!-- 如果还没有登录显示 -->
	      <ul class="nav navbar-nav navbar-right" ms-if='login==false'>
	        <li><a href="#" data-toggle="modal" data-target="#login">登录</a></li>
	        <li><a href="#" data-toggle="modal" data-target="#reg">注册</a></li>
	      </ul>
	      <!-- 如果还没有登录后显示 -->
	      <ul class="nav navbar-nav navbar-right" ms-if='login==true'>
	        <li><a>{{userName}},欢迎登录</a></li>
	      	<li><a href="#">个人中心</a></li>
	      	<li><a href="<?php echo (APP_LINK); ?>Goods/carGoods">购物车</a></li>
	      	<li><a href="#" ms-click = 'userOut'>退出</a></li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
	<div class="container">
		<table class="table table-bordered">
			<tr>
				<td>编号</td>
				<td>商品名称</td>
				<td>商品图片</td>
				<td>商品价格</td>
				<td>商品数量</td>
				<td>商品总价</td>
			</tr>
			<tr ms-repeat='goods'>
				<td>{{el.name}}</td>
			</tr>
		</table>
	</div>
</body>
</html>