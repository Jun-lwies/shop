<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zn">
<head>
	<meta charset="UTF-8">
	<title>商城首页</title>
	<link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="http://libs.baidu.com/jquery/2.0.0/jquery.js"></script>
    <script src="//cdn.bootcss.com/avalon.js/1.5.5/avalon.js"></script>
    <script src="//cdn.bootcss.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <style>
		.thumbnail img{
			height: 200px;
		}
    </style>
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
			goods : [],
			getGoods : function(){
				$.get("<?php echo (APP_LINK); ?>Index/showGoods",function(data,status){
				    //console.log(data);
				   vm.goods = data
				});
			},
			num : -1,
			addNum : function(){
				vm.num ++
			},
			//登录
			goLogin : function(){
				$.post('<?php echo (APP_LINK); ?>Users/login',
					{
						username : $('#loginUsername').val(),
						password : $('#loginPassword').val(),
						verify : $('#loginVerify').val(),
					},
					function(data,status){
						if(data == 'true'){
							alert('登录成功');
							vm.checkLogin();
							$('#loginClose').click();
						}else{
							alert(data)
						}
					}
				);
			},
			//注册
			goReg : function(){
				regName = $('#regName').val();
				regPassword = $('#regPassword').val();
				regEmail = $('#regEmail').val();
				regVerify = $('#regVerify').val();
				//先检查是否资料填写完整
				if(regName && regPassword && regEmail && regVerify){
					$.post('<?php echo (APP_LINK); ?>Users/reg',
						{
							username : regName,
							password : regPassword,
							email : regEmail,
							verify : regVerify,
						},
						function(data,status){
							if(data == 'true'){
								alert('注册成功');
								vm.checkLogin();
								$('#regClose').click();
							}else{
								alert(data)
							}
						}
					);
				}else{
					alert('信息填写不完整')
				}
			},
			//退出
			userOut : function(){
				$.get("<?php echo (APP_LINK); ?>Users/userOut",function(data,status){
					vm.checkLogin();
					localStorage.goods = '';
					console.log(localStorage.goods);
					alert('退出成功')
				});
			},
			//购物车
			goodsCar : function(id){
				if(vm.login){
					$.get("<?php echo (APP_LINK); ?>Goods/addGood?id="+id,function(data,status){
						if(localStorage.goods){
							localStorage.goods = localStorage.goods +(JSON.stringify(data)+',')
							console.log(localStorage.goods)
						}else{
							localStorage.goods = (JSON.stringify(data)+',')
							console.log(localStorage.goods)
						}
					});
				}else{
					alert('你还没有登录')
				}
			}
		});
		vm.checkLogin();
		vm.getClassify();
		vm.getGoods();
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
	<!--  -->
	<div class="container" ms-repeat='classify'>
		  {{addNum()}}
		<h1>{{el.classify}}</h1>
		<div class="row">
		  <div class="col-sm-6 col-md-4" ms-repeat='goods' ms-if-loop='el.classify == classify[num].classify'>
		    <div class="thumbnail">
		      <img ms-attr-src='el.photo'>
		      <div class="caption">
		        <h3>{{el.name}}</h3>
		        <p>价格：{{el.price}}</p>
		        <p><a href="#" class="btn btn-primary" role="button" ms-click='goodsCar(el.id)'>加入购物车</a> <a ms-attr-href="'<?php echo (APP_LINK); ?>Goods/showGood?id='+el.id" class="btn btn-default" role="button">查看详情</a></p>
		      </div>
		    </div>
		  </div>
		</div>
	</div>
	<!-- js -->
	<!-- 登录模态框 -->
	<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">登录页面</h4>
	      </div>
	      <div class="modal-body">
		        <form>
				  <div class="form-group">
				    <label>用户名</label>
				    <input type="text" class="form-control" placeholder="请输入用户名" id="loginUsername">
				  </div>
				  <div class="form-group">
				    <label>密码</label>
				    <input type="password" class="form-control" placeholder="请输入密码" id='loginPassword'>
				  </div>
				  <div class="form-group">
				    <label>验证码</label>
				    <input type="text" class="form-control" placeholder="请输入用户名" id='loginVerify'>
				    <img src="<?php echo (APP_VER); ?>" alt="验证码" onclick="this.src='<?php echo (APP_VER); ?>'">
				  </div>
				</form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal" id="loginClose">关闭</button>
	        <button type="button" class="btn btn-primary" ms-click='goLogin'>登录</button>
	      </div>
	    </div>
	  </div>
	</div>
	<!-- 注册-->
	<div class="modal fade" id="reg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">注册页面</h4>
	      </div>
	      <div class="modal-body">
		        <form>
				  <div class="form-group">
				    <label>用户名</label>
				    <input type="text" class="form-control" placeholder="请输入用户名" id='regName'>
				  </div>
				  <div class="form-group">
				    <label>密码</label>
				    <input type="password" class="form-control" placeholder="请输入密码" id="regPassword">
				  </div>
				  <div class="form-group">
				    <label>email</label>
				    <input type="email" class="form-control" placeholder="请输入邮箱" id="regEmail">
				  </div>
				  <div class="form-group">
				    <label>验证码</label>
				    <input type="text" class="form-control" placeholder="请输入用户名" id="regVerify">
				    <img src="<?php echo (APP_VER); ?>" alt="验证码" onclick="this.src='<?php echo (APP_VER); ?>'">
				  </div>
				</form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal" id="regClose">关闭</button>
	        <button type="button" class="btn btn-primary" ms-click='goReg'>注册</button>
	      </div>
	    </div>
	  </div>
	</div>
</body>
</html>