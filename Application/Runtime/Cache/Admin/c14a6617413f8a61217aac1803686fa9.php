<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
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

        <!-- 用于存储当前导航菜单的URL值，使引入的外部js文件获取到该值，以达到高亮左侧导航栏的效果 -->
        <input type="hidden" id="currenturl" value="/Admin/Comment/showlist" />
        
        
        <div class="showlistcomment main">
            <h1>
                当前共有留言：<?php echo ($count); ?>
                <?php if($newcommentnum != 0): ?>（待审核：<?php echo ($newcommentnum); ?>）<?php endif; ?>
            </h1>

            <?php if(!empty($commentlist)): ?><div class="comment-list">
                <?php if(is_array($commentlist)): $k = 0; $__LIST__ = $commentlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><div class="every-comment">
                    <p class="comment-content">
                        <a href="/Blog/Detail/index/id/<?php echo ($vo["articleid"]); ?>/#<?php echo ($vo["commentid"]); ?>" target="_blank"><?php echo ($vo["commentcontent"]); ?></a>
                    </p>
                    <p class="comment-info">
                        <span>时间</span>
                        <span><?php echo (date("Y-m-d H:i:s",$vo["commenttime"])); ?></span>
                        <span>留言人</span>
                        <span class="comment-author">
                            <a href="<?php echo ($vo["personsite"]); ?>" target="_blank"><?php echo ($vo["commentauthor"]); ?></a>
                        </span>
                    </p>
                    <p class="comment-article">
                        <span class="comment-article-title">文章：</span><a href="<?php echo U('/Admin/Comment/showlistarticle',array('articleid'=>$vo['articleid']));?>"><?php echo ($vo["title"]); ?></a>
                    </p>

                    <!-- 留言审核状态 -->
                    <?php if($vo["status"] == 0): ?><span class="comment-review-status comment-review-status-pending">待审核</span>                     
                    <?php else: ?>
                        <span class="comment-review-status comment-review-status-pass">已审核通过</span><?php endif; ?>

                    <!-- 留言审核操作 -->
                    <?php if($vo["status"] == 0): ?><div class="comment-operate">
                            <a class="modifybutton" href="<?php echo U('/Admin/Comment/reviewcomment',array('commentid'=>$vo['commentid']));?>">审核通过</a>
                            <a class="deletebutton" href="<?php echo U('/Admin/Comment/deletecomment',array('commentid'=>$vo['commentid']));?>">审核不通过</a>
                        </div>
                        
                    <?php else: ?>
                        <div class="comment-operate comment-delete">
                            <a class="deletebutton" href="<?php echo U('/Admin/Comment/deletecomment',array('commentid'=>$vo['commentid']));?>" onclick="return confirm('你真的要删除这条留言吗？');">删除</a>
                        </div><?php endif; ?>

                </div><?php endforeach; endif; else: echo "" ;endif; ?>                
            </div>

            <div class="pagination"><?php echo ($page); ?></div><?php endif; ?>

            <?php if(empty($commentlist)): ?><div class="emptydata"><p>还没有留言噢</p></div><?php endif; ?>

        </div>

        <div class="clear"></div>


        
    </div>

</body>
</html>