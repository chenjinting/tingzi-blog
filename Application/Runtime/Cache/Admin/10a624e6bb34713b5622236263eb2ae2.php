<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">    
    <meta name="author" content="陈锦挺，253018164@qq.com">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <meta http-equiv="Cache-Control" content="no-siteapp" /> <!-- 禁止百度转码 -->

    <title>挺 | 后台管理 - 分类列表</title>

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
        
        <div class="showlisttag main">
            <h1>当前共有标签：<?php echo ($count); ?></h1>

            <a class="addnew" href="<?php echo U('/Admin/Tag/addtag');?>">新增标签</a>

            <?php if(!empty($taglist)): ?><div class="sort-tag-area">
                <?php if(is_array($taglist)): $i = 0; $__LIST__ = $taglist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tag): $mod = ($i % 2 );++$i;?><div class="every-sort-tag float-left">
                    <h2 class="sort-tag-h2">
                        <a href="<?php echo U('/Admin/Article/showlisttag',array('tagid'=>$tag['tagid']));?>"><?php echo ($tag["tagname"]); ?></a>
                        <span class="article-num">
                            <?php if(is_array($tag['tagarticlecount'])): $i = 0; $__LIST__ = $tag['tagarticlecount'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tagcount): $mod = ($i % 2 );++$i;?>(<?php echo ($tagcount); ?>)<?php endforeach; endif; else: echo "" ;endif; ?>
                        </span>
                    </h2>
                    <div class="sort-tag-operate">
                        <a class="modify-sort-tag" href="<?php echo U('/Admin/Tag/modifytag',array('tagid'=>$tag['tagid'],'tagname'=>$tag['tagname']));?>">修改</a>
                        <a class="delete-sort-tag" href="<?php echo U('/Admin/Tag/deletetag',array('tagid'=>$tag['tagid']));?>" onclick="return confirm('你真的要删除这个标签吗？');">删除</a>
                    </div>
                    
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
            </div><?php endif; ?>

            <?php if(empty($taglist)): ?><div class="emptydata"><p>还没有分类噢，快增加一个分类吧~</p></div><?php endif; ?>

            <div class="clear"></div>

        </div>

        
    </div>

</body>
</html>