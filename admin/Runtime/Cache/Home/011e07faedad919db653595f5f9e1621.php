<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zn">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <style>
        iframe{
            border: none;
            margin: 0;
            padding: 0;
        }
        .top{
            width: 100%;
            height: 50px;
            border-bottom: 2px solid #f2f2f2;
        }
        .left{
            width:250px;
            border-right: 2px solid #f2f2f2;
            box-sizing: border-box;
        }
        .right{
            width:74%;
        }
    </style>
</head>
<body>
    <iframe src="http://localhost/shop/admin.php/Home/Index/adminTop" class="top" name="top"></iframe>
    <iframe src="http://localhost/shop/admin.php/Home/Index/adminLeft" class="left" name="left"></iframe>
    <iframe src="http://localhost/shop/admin.php/Home/Index/adminRight" class="right" name="right"></iframe>
    <script src="//cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            changWindow();
        });
        $(window).resize(function() {
            changWindow();
        });
        function changWindow(){
            var h = $(document).height() - 60;
            var w = $(document).width() - 255;
            $('.left').height(h);
            $('.right').height(h);
            $('.right').width(w);
        }
    </script>
</body>
</html>