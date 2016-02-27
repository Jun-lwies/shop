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
    	var vm = avalon.define({
			$id : 'app',
			//获取商品分类写入模版
			classify : [],
			getClassify : function(){
				$.get("<?php echo (APP_LINK); ?>Index/showClassify",function(data,status){
				   // console.log(data);
				   vm.classify = data
				});
			},
		});
		vm.getClassify();
    </script>
</head>
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
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="#">登录</a></li>
	        <li><a href="#">注册</a></li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
	<!-- nav end -->
	<div class="container">
		<h1><?php echo ($goods["name"]); ?></h1>
		<h2>价格：<?php echo ($goods["price"]); ?></h2>
		<p><a href="#" class="btn btn-primary" role="button">加入购物车</a> <a class="btn btn-default" role="button">立刻支付</a></p>
		<div class="row">
		  <div class="col-sm-12 col-md-12">
		    <div class="thumbnail">
		      <img src="<?php echo ($goods["photo"]); ?>">
		      <div class="caption">
		        <h3><?php echo ($goods["name"]); ?></h3>
		        <p><?php echo ($goods["profiles"]); ?></p>
		        <?php echo (html_entity_decode(htmlspecialchars_decode($goods["content"]))); ?>
		      </div>
		    </div>
		  </div>
		</div>
	</div>
</body>
</html>