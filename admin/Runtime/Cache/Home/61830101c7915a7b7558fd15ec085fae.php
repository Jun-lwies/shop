<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zn">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="http://libs.baidu.com/jquery/2.0.0/jquery.js"></script>
    <script src="//cdn.bootcss.com/avalon.js/1.5.5/avalon.min.js"></script>
    <style>
		.hj-table{
			width: 500px
		}
    </style>
</head>
<body ms-controller='app'>
	<table class="table table-bordered table-hover text-center hj-table">
        <tr>
            <td>编号</td>
            <td>用户名</td>
            <td>操作</td>
        </tr>
        <?php if(is_array($user)): foreach($user as $key=>$vo): ?><tr>
	        	<td><?php echo ($vo["id"]); ?></td>
			    <td><?php echo ($vo["username"]); ?></td>
			    <td><a href="<?php echo (APP_LINK); ?>User/reviseUser?id=<?php echo ($vo["id"]); ?>">修改</a> / <a ms-click="del(<?php echo ($vo["id"]); ?>)">删除</a></td>
	        </tr><?php endforeach; endif; ?>
    </table>
    <script>
    	var vm = avalon.define({
    		$id : 'app',
    		del : function(id){
    			var r=confirm("你确定要删除吗？");
                if(r==true){
                    $.get("<?php echo (APP_LINK); ?>User/deleteUser?id="+id,function(data,status){
                        if(status == "success"){
                            if(data =='1'){
                                alert('删除成功');
                                location.href='<?php echo (APP_LINK); ?>User/showUser'
                            }else{
                                alert('删除失败');
                            }
                        }else{
                            alert('连接有误')
                        }
                    });
                }
    		}
    	});
    </script>
</body>
</html>