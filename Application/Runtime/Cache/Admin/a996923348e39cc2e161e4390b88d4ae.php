<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">    
    <meta name="author" content="陈锦挺，253018164@qq.com">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <meta http-equiv="Cache-Control" content="no-siteapp" /> <!-- 禁止百度转码 -->

    <title>挺 | 后台管理 - 添加标签</title>

    <link rel="shortcut icon" href="<?php echo (ADMIN_IMG_URL); ?>favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?php echo (ADMIN_IMG_URL); ?>favicon.ico" type="image/x-icon">
    <link href="<?php echo (ADMIN_CSS_URL); ?>admin.css" type="text/css" rel="stylesheet" />
    <script type="text/javascript" src="<?php echo (ADMIN_JS_URL); ?>jquery-1.12.4.min.js"></script>
    <script type="text/javascript" src="<?php echo (ADMIN_JS_URL); ?>admin.js"></script>
    
</head>
<body>
    <div class="page">
        <div class="page-header">
    <div class="header">
        <div class="header-logo float-left">
            <a href="<?php echo U('/Admin');?>">
                <img class="logo01" src="<?php echo (ADMIN_IMG_URL); ?>logo.png" />
                <img class="logo02" src="<?php echo (ADMIN_IMG_URL); ?>logoadmin.png" />
            </a>
        </div>
        <div class="search-area float-left">
            <form action="<?php echo U('/Admin/Article/search');?>" method="get">
                <input type="text" placeholder="搜索文章标题..." class="search-input" name="search-key" value="<?php echo ($keywords); ?>" />
                <button type="submit" class="search-submit">搜索</button>
            </form>   
        </div>
        <div class="header-menu float-right">
            <ul>
                <li class="float-left">
                    <a class="blog-a" href="<?php echo U('http://www.chenjinting.com/Blog');?>" target="_blank">博客主页</a>
                </li>
                <li class="float-left">
                    <span class="welcome float-left">你好呀，</span><span class="currentuser float-left"><?php echo ($admin); ?></span>
                </li>
                <li class="float-left">
                    <a class="logout" href="<?php echo U('/Admin/Login/logout');?>">退出</a> 
                </li>
            </ul>
        </div>
    </div>
</div>

        <!-- 左侧侧边栏 -->

<div class="sidebar">
    <div class="sidebar-menu">
        <ul>
            <a href="<?php echo U('/Admin/Article/showlist');?>"><li class="sidebar-article">文章管理</li></a>

            <a href="<?php echo U('/Admin/Sort/showlist');?>"><li class="sidebar-sort">分类管理</li></a>

            <a href="<?php echo U('/Admin/Tag/showlist');?>"><li class="sidebar-tag">标签管理</li></a>

            <a href="<?php echo U('/Admin/Comment/showlist');?>">
                <li class="sidebar-comment">留言管理<?php if(($newcommentnum) != "0"): ?><span class="newcomment"><?php echo ($newcommentnum); ?></span><?php endif; ?></li>
            </a>

            <!-- <a href="<?php echo U('/Admin/Admin/showlist');?>"><li class="sidebar-admin">管理员</li></a> -->
        </ul>
    </div>
</div>

        <!-- 用于存储当前导航菜单的URL值，使引入的外部js文件获取到该值，以达到高亮左侧导航栏的效果 -->
        <input type="hidden" id="currenturl" value="/Admin/Tag/showlist" />

        <div class="addtag main">
            <h1>正在新增标签...</h1>

            <div class="cancel-area">
                <a class="publish-cancel" href="<?php echo U('/Admin/Tag/showlist');?>">取消新增</a>
            </div>

            <div class="addmodify-sorttag">
                <form action="<?php echo U('/Admin/Tag/addtag');?>" method="post" enctype="multipart/form-data">
                    <p class="addmodify-srottag-input">
                        <span class="sorttag-name">标签名称</span>
                        <input class="sorttag-input" type="text" name="tagname" placeholder="填写一个标签名称" />
                    </p>
                    <p class="sorttag-submit">
                        <button type="submit" class="publish-submit">确定</button>
                    </p>
                </form>
            </div>

            <div class="clear"></div>

        </div>


        
    </div>

</body>
</html>