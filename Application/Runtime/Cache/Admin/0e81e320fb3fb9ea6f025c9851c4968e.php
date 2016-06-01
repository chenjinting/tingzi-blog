<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">    
    <meta name="author" content="陈锦挺，253018164@qq.com">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <meta http-equiv="Cache-Control" content="no-siteapp" /> <!-- 禁止百度转码 -->
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>
        挺 | 后台管理 - <?php if(is_array($articleidname)): $i = 0; $__LIST__ = $articleidname;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$idname): $mod = ($i % 2 );++$i; echo ($idname["title"]); endforeach; endif; else: echo "" ;endif; ?> - 留言列表
    </title>

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

            <a href="<?php echo U('/Admin/Admin/showlist');?>"><li class="sidebar-admin">管理员</li></a>
        </ul>
    </div>
</div>

        <!-- 用于存储当前导航菜单的URL值，使引入的外部js文件获取到该值，以达到高亮左侧导航栏的效果 -->
        <input type="hidden" id="currenturl" value="/Admin/Comment/showlist" />

        <div class="showlistarticlecomment main">
            
            <style>
            .tr_color{background-color: #9F88FF}
        </style>
        <div class="div_head">
            <span style="float: left;">当前位置是：留言管理-》留言列表</span>
            <p>
                当前文章为：
                <?php if(is_array($articleidname)): $i = 0; $__LIST__ = $articleidname;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$idname): $mod = ($i % 2 );++$i; echo ($idname["title"]); ?>
                    <input type="hidden" name="currentarticleid" value="<?php echo ($idname["id"]); ?>" /><?php endforeach; endif; else: echo "" ;endif; ?>
            </p>
        </div>
        <div></div>
        <div style="font-size: 13px; margin: 10px 5px;">
            <?php if(!empty($commentlist)): ?><table class="table_a" border="1" width="100%">
                <tbody>
                    
                    <tr style="font-weight: bold;">
                        <td>序号</td>
                        <td>留言内容</td>
                        <!-- <td>文章</td> -->
                        <td>留言时间</td>
                        <td>留言人</td>
                        <td>留言人站点</td>
                        <td>审核状态</td>
                        <td colspan="2" align="center">操作</td>
                    </tr>
                    
                    <?php if(is_array($commentlist)): $k = 0; $__LIST__ = $commentlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr id="product1">
                        <td><?php echo ($k+$firstRow); ?></td>
                        <td><a href="/Blog/Detail/index/id/<?php echo ($vo["articleid"]); ?>/#<?php echo ($vo["commentid"]); ?>" target="_blank"><?php echo ($vo["commentcontent"]); ?></a></td>
                        <!-- <td><a href="<?php echo U('/Admin/Comment/showlistarticle',array('articleid'=>$vo['articleid']));?>"><?php echo ($vo["title"]); ?></a></td> -->
                        <td><?php echo (date("Y-m-d H:i;s",$vo["commenttime"])); ?></td>  
                        <td><?php echo ($vo["commentauthor"]); ?></td>
                        <td><a href="<?php echo ($vo["personsite"]); ?>" target="_blank"><?php echo ($vo["personsite"]); ?></a></td>
                        <td>
                            <?php if($vo["status"] == 0): ?>待审核
                            <?php else: ?>
                                审核通过<?php endif; ?>
                        </td>
                        <td>
                            <?php if($vo["status"] == 0): ?><a href="<?php echo U('/Admin/Comment/reviewcomment',array('articleid'=>$vo['articleid'],'commentid'=>$vo['commentid']));?>">审核通过</a>
                                <a href="<?php echo U('/Admin/Comment/deletecomment',array('articleid'=>$vo['articleid'],'commentid'=>$vo['commentid']));?>">审核不通过</a>
                            <?php else: ?>
                                <a href="<?php echo U('/Admin/Comment/deletecomment',array('articleid'=>$vo['articleid'],'commentid'=>$vo['commentid']));?>" onclick="return confirm('你真的要删除这条留言吗？');">删除</a><?php endif; ?>
                        </td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>                  

                    <tr>
                        <td colspan="20" style="text-align: center;">
                            <?php echo ($page); ?>
                        </td>
                    </tr>
                </tbody>
            </table><?php endif; ?>

            <div style="height: 30px;text-align: center;">
                <?php if(empty($commentlist)): ?><p>
                        还没有留言噢，快写篇留言吧~
                    </p><?php endif; ?>
            </div>

        </div>

            <div class="clear"></div>

        </div>


        
    </div>

</body>
</html>