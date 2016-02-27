<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>分类修改</title>
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="http://libs.baidu.com/jquery/2.0.0/jquery.js"></script>
    <style>
        .hj-form{
            width: 700px;
        }
    </style>
</head>
<body>
    <form class="hj-form" method="post" action="<?php echo (APP_LINK); ?>Goods/reviseClassify">
        <h3>商品分类修改</h3>
        <input type="hidden" value="<?php echo ($classify["id"]); ?>" name="id">
        <div class="form-group">
            <label>原来为：</label>
            <input type="text" class="form-control" name="classify" value="<?php echo ($classify["classify"]); ?>" disabled>
        </div>
        <div class="form-group">
            <label>修改为：</label>
            <input type="text" class="form-control" name="classify" placeholder="修改为">
        </div>
        <button type="submit" class="btn btn-default">提交</button>
    </form>
</body>
</html>