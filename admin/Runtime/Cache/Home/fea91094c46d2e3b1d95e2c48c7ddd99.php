<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>商品分类展示</title>
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="http://libs.baidu.com/jquery/2.0.0/jquery.js"></script>
    <script src="//cdn.bootcss.com/avalon.js/1.5.5/avalon.min.js"></script>
    <style>
        .table{
            width: 600px;
        }
        .hj-form{
            width: 600px;
            padding: 10px 0;
        }
    </style>
</head>
<body ms-controller="app">
    <form class="form-inline hj-form text-right" method="post" action="<?php echo (APP_LINK); ?>Goods/addClassify">
        <div class="form-group">
            <label>添加分类：</label>
            <input type="text" class="form-control" name="classify" placeholder="添加分类">
        </div>
        <button type="submit" class="btn btn-default">提交</button>
    </form>
    <table class="table table-bordered table-hover text-center">
        <tr>
            <td>编号</td>
            <td>商品分类</td>
            <td>操作</td>
        </tr>
        <?php if(is_array($classify)): $i = 0; $__LIST__ = $classify;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                <td><?php echo ($vo["id"]); ?></td>
                <td><?php echo ($vo["classify"]); ?></td>
                <td><a href="<?php echo (APP_LINK); ?>Goods/reviseClassify?id=<?php echo ($vo["id"]); ?>">修改</a>/<a ms-click="del(<?php echo ($vo["id"]); ?>)">删除</a></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </table>
    <script>
        var vm = avalon.define({
            $id : "app",
            del:function(id){
                var r=confirm("你确定要删除吗？");
                if(r==true){
                    $.get("<?php echo (APP_LINK); ?>Goods/deleteClassify?id="+id,function(data,status){
                        if(status == "success"){
                            if(data =='1'){
                                alert('删除成功');
                                location.href='<?php echo (APP_LINK); ?>Goods/showClassify'
                            }else{
                                alert('删除失败');
                            }
                        }else{
                            alert('连接有误')
                        }
                    });
                }
            }
        })
    </script>
</body>
</html>