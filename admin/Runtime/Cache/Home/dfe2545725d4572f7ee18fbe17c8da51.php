<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zn">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="http://libs.baidu.com/jquery/2.0.0/jquery.js"></script>
    <script src="//cdn.bootcss.com/avalon.js/1.5.5/avalon.min.js"></script>
    <style>
		.hj-form{
			width: 500px;
		}
    </style>
</head>
<body>
	<form class="form-horizontal hj-form" action="<?php echo (APP_LINK); ?>User/addUser" method="post">
		<div class="form-group">
            <label class="col-sm-2 control-label">用户名</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" placeholder="用户名" name="username">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">密码</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="password" placeholder="密码" name="password">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">联系邮箱</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="eamil" placeholder="联系邮箱" name="email">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label"></label>
            <div class="col-sm-10">
                <button type="submit" class="btn btn-default">提交</button>
        		<button type="reset" class="btn btn-default">重置</button>
            </div>
        </div>
	</form>
</body>
</html>