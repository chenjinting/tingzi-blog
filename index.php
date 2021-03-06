<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用入口文件

// 检测PHP环境
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');

// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG',True);

// 定义应用目录
define('APP_PATH','./Application/');

// Home路径常量设置
define('Home_CSS_URL', '/Application/Home/Public/css/');
define('Home_IMG_URL', '/Application/Home/Public/img/');
define('Home_JS_URL', '/Application/Home/Public/js/');

// Blog路径常量设置
define('BLOG_CSS_URL', '/Application/Blog/Public/css/');
define('BLOG_IMG_URL', '/Application/Blog/Public/img/');
define('BLOG_JS_URL', '/Application/Blog/Public/js/');

// Admin路径常量设置
define('ADMIN_CSS_URL', '/Application/Admin/Public/css/');
define('ADMIN_IMG_URL', '/Application/Admin/Public/img/');
define('ADMIN_JS_URL', '/Application/Admin/Public/js/');
define('ADMIN_VENDOR_URL', '/Application/Admin/Public/vendor/'); //Admin第三方工具

// 引入ThinkPHP入口文件
require './ThinkPHP/ThinkPHP.php';

// 亲^_^ 后面不需要任何代码了 就是如此简单