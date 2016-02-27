<?php
/**
 * Created by PhpStorm.
 * User: jun
 * Date: 2016/1/8
 * Time: 15:35
 * 登录控制器
 */
namespace Home\Model;
use Think\Model;
class AdminModel extends Model{
    protected $_validate = array(
        array('verify','require','验证码必须！'),  // 都有时间都验证
        array('name','require','用户名必须！'),  // 只在登录时候验证
        array('password','require','密码必须！'), // 只在登录时候验证
    );
}