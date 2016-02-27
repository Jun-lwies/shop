<?php
//前台入口文件

//基础
define('APP_NAME','index');
define('APP_PATH','./index/');
define('APP_DEBUG',true);

//连接请求路径
define('APP_LINK','http://localhost/shop/index.php/Home/');

//css,js,img路径
define('APP_URL','http://localhost/shop/');
define('APP_CSS',APP_URL.'Public/css/');
define('APP_JS',APP_URL.'Public/js/');

//验证码
define('APP_VER',APP_URL.'admin.php/Home/Index/verify');

require_once './ThinkPHP/ThinkPHP.php';