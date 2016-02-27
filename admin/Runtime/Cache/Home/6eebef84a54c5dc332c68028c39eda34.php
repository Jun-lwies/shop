<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zn">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="<?php echo (APP_CSS); ?>reset.css">
    <script src="http://libs.baidu.com/jquery/2.0.0/jquery.js"></script>
    <style>
        .hj-nav{
            width: 248px;
            text-align: center;
        }
        .hj-title{
            height: 35px;
            line-height: 35px;
            border-bottom: 1px solid #f5f5f5;
            cursor: pointer;
            font-family: "Microsoft Yahei", "Helvetica Neue", Helvetica, Arial, sans-serif;
        }
        .hj-list{
            display: none;
            border-bottom: 1px solid #f5f5f5;
            background: #f2f2f2;
        }
        .hj-list li{
            display: block;
            height: 30px;
            line-height: 30px;
        }
        .hj-list li a{
            display: block;
            text-decoration: none;
            color: #333333;
        }
        .hj-list li a:hover{
            background: #ccc;
        }
    </style>
</head>
<body>
    <div class="hj-nav">
        <h1 class="hj-title" data-type="show">商品信息</h1>
        <ul class="hj-list">
            <li><a href="<?php echo (APP_LINK); ?>Goods/showGoods?page=0" target="right">商品查看</a></li>
            <li><a href="<?php echo (APP_LINK); ?>Goods/showClassify" target="right">商品分类</a></li>
            <li><a href="<?php echo (APP_LINK); ?>Goods/addGoods" target="right">添加商品</a></li>
        </ul>
    </div>
    <div class="hj-nav">
        <h1 class="hj-title" data-type="show">用户管理</h1>
        <ul class="hj-list">
            <li><a href="<?php echo (APP_LINK); ?>User/showUser" target="right">查看用户</a></li>
            <li><a href="<?php echo (APP_LINK); ?>User/addUser" target="right">添加用户</a></li>
        </ul>
    </div>
    <div class="hj-nav">
        <h1 class="hj-title" data-type="show">订单管理</h1>
        <ul class="hj-list">
            <li><a href="<?php echo (APP_LINK); ?>User/showUser" target="right">查看用户</a></li>
            <li><a href="<?php echo (APP_LINK); ?>User/addUser" target="right">添加用户</a></li>
        </ul>
    </div>
    <script>
        $(document).ready(function(){
           //点击显示选项,再次点击隐藏
           $('.hj-title').click(function(){
               var num = $('.hj-title').index($(this));
               var dataType = $('.hj-title').eq(num).attr('data-type');
               if(dataType =='show'){
                   $('.hj-list').eq(num).show();
                   $('.hj-title').eq(num).attr('data-type','hide');
                   //console.log(dataType)
               }else{
                   $('.hj-list').eq(num).hide();
                   $('.hj-title').eq(num).attr('data-type','show');
                   //console.log(dataType)
               }

           }) ;
        });
    </script>
</body>
</html>