<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">    
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <meta http-equiv="Cache-Control" content="no-siteapp" /> <!-- 禁止百度转码 -->
    <title>挺 | 后台管理</title>

    <link href="<?php echo (ADMIN_CSS_URL); ?>admin.css" type="text/css" rel="stylesheet" />
    <script type="text/javascript" src="<?php echo (ADMIN_JS_URL); ?>jquery-1.12.4.min.js"></script>
    
</head>
<body>
    <div class="page">
        <div class="page-header">
    <div class="header">
        <div class="header-logo float-left">
            <a href="<?php echo U('http://www.chenjinting.com/Admin');?>">
                <img class="logo01" src="<?php echo (ADMIN_IMG_URL); ?>logo.png" />
                <img class="logo02" src="<?php echo (ADMIN_IMG_URL); ?>logoadmin.png" />
            </a>
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


        <div class="index main">
            <h1>当前网站总数据</h1>
            <div class="statistics">
                <div class="statistics1 every-statistics float-left">
                    <h2 class="indexh2">总文章</h2>
                    <div class="data"><?php echo ($articlenum); ?></div>
                </div>
                <div class="statistics2 every-statistics float-left">
                    <h2 class="indexh2">总阅读</h2>
                    <div class="data"><?php echo ($readnumsum); ?></div>
                </div>
                <div class="statistics3 every-statistics float-left">
                    <h2 class="indexh2">总留言</h2>
                    <div class="data">
                        <?php echo ($commentnum); ?>
                        <?php if(($newcommentnum) != "0"): ?><span class="newcommenttitle">（待审核：<a href="<?php echo U('/Admin/Comment/showlist');?>"><span class="newcommentnum"><?php echo ($newcommentnum); ?></span></a>）</span><?php endif; ?>
                    </div>
                </div>
                <div class="statistics4 every-statistics float-left">
                    <h2 class="indexh2">总分类</h2>
                    <div class="data"><?php echo ($sortnum); ?></div>
                </div>
                <div class="statistics5 every-statistics float-left">
                    <h2 class="indexh2">总标签</h2>
                    <div class="data"><?php echo ($tagnum); ?></div>
                </div>
            </div>

            <div class="clear"></div>

        </div>


        
    </div>

</body>
</html>