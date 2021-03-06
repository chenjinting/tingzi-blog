<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html class="login-body">
<head>
    <meta charset="utf-8">    
    <meta name="author" content="陈锦挺，253018164@qq.com">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <meta http-equiv="Cache-Control" content="no-siteapp" /> <!-- 禁止百度转码 -->
    <title>挺 | 后台管理 - 留言列表</title>

    <link href="<?php echo (ADMIN_CSS_URL); ?>admin.css" type="text/css" rel="stylesheet" />
    <script type="text/javascript" src="<?php echo (ADMIN_JS_URL); ?>jquery-1.12.4.min.js"></script>
    <script type="text/javascript" src="<?php echo (ADMIN_JS_URL); ?>admin.js"></script>

</head>

<body class="login-body">
    <div class="login-layout">
        <div class="login-area">
            <h1>
                <img src="<?php echo (ADMIN_IMG_URL); ?>logo.png" />
                <img src="<?php echo (ADMIN_IMG_URL); ?>logoadmin.png" />
            </h1>
            <form action="<?php echo U('/Admin/Login/login');?>" method="post">
                <div class="login-input">
                    <p>
                        <span class="user-input-head input-head"></span>
                        <input class="user-input" type="text" name="user" placeholder="登录用户名" />
                    </p>
                    <p>
                        <span class="pwd-input-head input-head"></span>
                        <input class="pwd-input" type="password" name="password" placeholder="登录密码" />
                    </p>
                    <p>
                        <input class="float-left" id="captcha" name="captcha" type="text" placeholder="验证码" />
                        <img class="verifycation float-left" src="<?php echo U('/Admin/Login/loginverify');?>" alt="登录验证码" onclick= this.src="/Admin/Login/loginverify/"+Math.random() style="cursor: pointer;" title="看不清？点击更换验证码" />
                    </p>
                    <p>
                        <input class="login-submit" type="submit" value="登录" />
                    </p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>