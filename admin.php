<?php
/**
 * Created by PhpStorm.
 * User: jun
 * Date: 2016/1/8
 * Time: 14:13
 * 后台入口文件
 */

//基础
define('APP_NAME','admin');
define('APP_PATH','./admin/');
define('APP_DEBUG',true);

//连接请求路径
define('APP_LINK','http://localhost/shop/admin.php/Home/');

//css,js,img路径
define('APP_URL','http://localhost/shop/');
define('APP_CSS',APP_URL.'Public/css/');
define('APP_JS',APP_URL.'Public/js/');

//验证码
define('APP_VER',APP_URL.'admin.php/Home/Index/verify');

require_once './ThinkPHP/ThinkPHP.php';