<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zn">
<head>
    <meta charset="UTF-8">
    <title>后台登录</title>
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <style>
        body{
            background: #f2f2f2;
        }
        .hj-form{
            background: #fff;
            width: 350px;
            margin: 35px auto;
            padding: 15px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="hj-form">
        <div class="form-group">
            <label>用户名</label>
            <input type="text" class="form-control" placeholder="name" id="name">
        </div>
        <div class="form-group">
            <label>密码</label>
            <input type="password" class="form-control" placeholder="Password" id="pwd">
        </div>
        <div class="form-group">
            <label>验证码</label>
            <input type="text" class="form-control" placeholder="verfiy" id="verify">
            <img src="<?php echo (APP_VER); ?>" alt="点击刷新验证码" onclick="this.src='<?php echo (APP_VER); ?>'">
        </div>
        <button type="submit" class="btn btn-default" id="login">登录</button>
    </div>
    <script src="//cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>
    <script src='<?php echo (APP_JS); ?>path.js'></script>
    <script>
        $(document).ready(function(){
            $('#login').click(function(){
                var name = $('#name').val();
                var pwd = $('#pwd').val();
                var verify = $('#verify').val();
                $.post(
                        postPath+'Index/login',
                        {
                            name:name,
                            password:pwd,
                            verify:verify
                        },
                        function(data,status){
                            if(status=='success'){
                                if(data=='1'){
                                    alert('登录成功');
                                    location.href='<?php echo (APP_LINK); ?>Index/admin';
                                }else{
                                    alert(data);
                                }
                            }else {
                                alert('连接有误，网络有问题')
                            }

                        }
                );
            });
        })
    </script>
</body>
</html>