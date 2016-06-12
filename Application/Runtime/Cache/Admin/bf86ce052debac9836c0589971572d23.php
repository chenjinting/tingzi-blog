<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">    
    <meta name="author" content="陈锦挺，253018164@qq.com">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <meta http-equiv="Cache-Control" content="no-siteapp" /> <!-- 禁止百度转码 -->

    <title>挺 | 后台管理 - 文章列表</title>

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
        <input type="hidden" id="currenturl" value="/Admin/Article/showlist" />

        <div class="showlistarticle main">

            <h1>当前共有文章：<?php echo ($articlenum); ?></h1>

            <a class="addnew" href="<?php echo U('/Admin/Article/addarticle',array('issorttag'=>'0'));?>">写文章</a>

            <?php if(!empty($articlelist)): ?><div class="listarticle">
                <?php if(is_array($articlelist)): $k = 0; $__LIST__ = $articlelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><div class="every-article">
                    <!-- 文章封面 -->
                    <div class="coverpic float-left">
                        <a href="<?php echo U('Blog/Detail/index',array('id'=>$vo['id']));?>" target="_blank">
                            <img src="/Uploads/image/<?php echo ($vo["coverpic"]); ?>" alt="文章封面：<?php echo ($vo["title"]); ?>" />
                        </a>
                    </div>
                    <!-- 文章简要信息 -->
                    <div class="article-info">
                        <!-- 文章标题 -->
                        <h2 class="listarticleh2"><a href="<?php echo U('Blog/Detail/index',array('id'=>$vo['id']));?>" target="_blank"><?php echo ($vo["title"]); ?></a></h2>
                        <!-- 作者、阅读次数、留言数量、发布时间、最后修改时间 -->
                        <div class="listarticle-baseinfo">
                            <span class="every-listarticle-baseinfo">作者&nbsp;<?php echo ($vo["author"]); ?></span>
                            <span class="every-listarticle-baseinfo">阅读&nbsp;<?php echo ($vo["readnum"]); ?></span>
                            <span class="every-listarticle-baseinfo">
                                留言&nbsp;<?php if(is_array($vo['commentcount'])): $i = 0; $__LIST__ = $vo['commentcount'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$va): $mod = ($i % 2 );++$i; if($va != 0): ?><a href="<?php echo U('/Admin/Comment/showlistarticle',array('articleid'=>$vo['id']));?>"><?php echo ($va); ?></a>
                                            <?php else: ?>
                                                0<?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                            <?php if(is_array($vo['commentcount0'])): $i = 0; $__LIST__ = $vo['commentcount0'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$va0): $mod = ($i % 2 );++$i; if(($va0) != "0"): ?>(<span class="newcommentnum"><?php echo ($va0); ?></span>)<?php endif; endforeach; endif; else: echo "" ;endif; ?>
                            </span>
                            <span class="every-listarticle-baseinfo">发布时间</span>
                            <span class="every-listarticle-baseinfo"><?php echo (date("Y-m-d H:i:s",$vo["time"])); ?></span>
                            <span class="every-listarticle-baseinfo">最后修改时间</span>
                            <span class="every-listarticle-baseinfo"><?php echo (date("Y-m-d H:i:s",$vo["lastmodifytime"])); ?></span>
                        </div>
                        <!-- 文章摘要 -->
                        <p class="article-abstract"><?php echo ($vo["abstract"]); ?>...</p>
                        <!-- 分类、标签 -->
                        <p class="sort-tag">
                            <span class="sort">
                                &nbsp;分类&nbsp;<a href="<?php echo U('/Admin/Article/showlistsort',array('sortid'=>$vo['sortid']));?>"><?php echo ($vo["sortname"]); ?></a>&nbsp;
                            </span>
                            <span class="tag">
                                &nbsp;标签&nbsp;<?php if(is_array($vo['tag'])): $i = 0; $__LIST__ = $vo['tag'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="<?php echo U('/Admin/Article/showlisttag',array('tagid'=>$v['tagid']));?>"><?php echo ($v['tagname']); ?></a>&nbsp;<?php endforeach; endif; else: echo "" ;endif; ?>
                            </span>
                        </p>
                    </div>

                    <!-- 修改、删除按钮 -->
                    <div class="operate">
                        <a href="<?php echo U('/Admin/Article/modifyarticle',array('issorttag'=>'0','id'=>$vo['id']));?>">
                            <span class="modifybutton">修改</span>
                        </a>
                        <a href="<?php echo U('/Admin/Article/deletearticle',array('id'=>$vo['id']));?>" onclick="return confirm('你真的要删除这篇文章吗？');">
                            <span class="deletebutton">删除</span>
                        </a>
                    </div>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>

            <div class="pagination"><?php echo ($page); ?></div><?php endif; ?>

            <?php if(empty($articlelist)): ?><div class="emptydata"><p>还没有文章噢，快写篇文章吧~</p></div><?php endif; ?>
        </div>

        <div class="clear"></div>

        
    </div>

</body>
</html>