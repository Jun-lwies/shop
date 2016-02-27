<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>商品展示</title>
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="http://libs.baidu.com/jquery/2.0.0/jquery.js"></script>
    <script src="//cdn.bootcss.com/avalon.js/1.5.5/avalon.min.js"></script>
    <style>
        .hj-img{
            width: 100px;
        }
        .table>tbody>tr>td,.table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
            vertical-align: middle;
        }
        a:hover{
            cursor: pointer;
        }
        .hj-form{
            margin-bottom: 5px;
        }
    </style>
</head>
<body ms-controller="app">
    <form class="form-inline hj-form" method="post" action="<?php echo (APP_LINK); ?>Goods/searchGoods">
        <div class="form-group">
            <label>商品名称：</label>
            <input type="text" class="form-control" name="name" placeholder="J请输入商品名称">
        </div>
        <div class="form-group">
            <label>商品分类：</label>
            <select name="classify" class="form-control">
                <option value="null">不限分类</option>
                <?php if(is_array($classify)): $i = 0; $__LIST__ = $classify;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["classify"]); ?>"><?php echo ($vo["classify"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-default">提交</button>
    </form>
    <table class="table table-bordered table-hover text-center">
        <tr>
            <td>编号</td>
            <td>商品名称</td>
            <td>商品类别</td>
            <td>商品添加人</td>
            <td>商品价格</td>
            <td>商品库存</td>
            <td>商品图片</td>
            <td>商品简介</td>
            <td>操作</td>
        </tr>
        <?php if(is_array($goods)): $i = 0; $__LIST__ = $goods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                <td><?php echo ($vo["id"]); ?></td>
                <td><?php echo ($vo["name"]); ?></td>
                <td><?php echo ($vo["classify"]); ?></td>
                <td><?php echo ($vo["author"]); ?></td>
                <td><?php echo ($vo["price"]); ?></td>
                <td><?php echo ($vo["stock"]); ?></td>
                <td><img src="<?php echo ($vo["photo"]); ?>" alt="<?php echo ($vo["profiles"]); ?>" class="hj-img"></td>
                <td><?php echo ($vo["profiles"]); ?></td>
                <td><a href="<?php echo (APP_LINK); ?>Goods/reviseGoods?id=<?php echo ($vo["id"]); ?>">修改</a>/<a ms-click="del(<?php echo ($vo["id"]); ?>)">删除</a></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </table>
    <nav class="text-right">
        <ul class="pagination">
            <li>
                <a  ms-click="pre()" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li ><a ms-attr-href='"<?php echo (APP_LINK); ?>Goods/showGoods?page="+0'>1</a></li>
            <li ms-repeat="page" ms-if-loop="el !=1"><a ms-attr-href='"<?php echo (APP_LINK); ?>Goods/showGoods?page="+(el+3)'>{{el}}</a></li>
            <li>
                <a ms-click="next()">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
    <script>
        var vm = avalon.define({
            $id : "app",
            del:function(id){
                var r=confirm("你确定要删除吗？");
                if(r==true){
                    $.get("<?php echo (APP_LINK); ?>Goods/deleteGoods?id="+id,function(data,status){
                        if(status == "success"){
                            if(data =='1'){
                                alert('删除成功');
                                location.href='<?php echo (APP_LINK); ?>Goods/showGoods'
                            }else{
                                alert('删除失败');
                            }
                        }else{
                            alert('连接有误')
                        }
                    });
                }
            },
            page:[],
            index :0,
            next :function(){
                var url = window.location.href;
                var page = url.split('=');
                var pageNum = page[1];
                location.href='<?php echo (APP_LINK); ?>Goods/showGoods?page='+(pageNum+5);
            },
            pre : function(){
                var url = window.location.href;
                var page = url.split('=');
                var pageNum = page[1];
                if(pageNum == 0){
                    alert('这是首页，无法跳转')
                }else{
                    location.href='<?php echo (APP_LINK); ?>Goods/showGoods?page='+(pageNum-5);
                }
            },
            getPage:function(){
                var num =<?php echo ($num); ?>;
                var showNum = 4;
                var judgeNum = num %showNum;
                var pageNum = Math.floor(num /showNum);
                //alert(pageNum+'/'+judgeNum+'/'+num );
                if(judgeNum > 0){
                    for(var i =0;i<pageNum+1;i++){
                        vm.page.push(i+1);
                    }
                }else{
                    for(var i = 0;i<=pageNum;i++){
                        vm.page.push(i+1);
                    }
                }
            },
        })
        vm.getPage();
    </script>
</body>
</html>