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
    <title>挺 | 后台管理 - 文章列表</title>

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
        <input type="hidden" id="currenturl" value="/Admin/Article/showlist" />

        <div class="showlistarticle main">
            
            <style>
            .tr_color{background-color: #9F88FF}
        </style>
        <div class="div_head">
            <span>
                <span style="float: left;">当前位置是：文章管理-》文章列表</span>
                <span style="float: right; margin-right: 8px; font-weight: bold;">
                    <a style="text-decoration: none;" href="<?php echo U('/Admin/Article/addarticle');?>">【添加文章】</a>
                </span>
            </span>
        </div>
        <div></div>
        <div style="font-size: 13px; margin: 10px 5px;">
            <?php if(!empty($articlelist)): ?><table class="table_a" border="1" width="100%">
                <tbody>
                    
                    <tr style="font-weight: bold;">
                        <td>序号</td>
                        <td>封面</td>
                        <td>标题</td>
                        <td>分类</td>
                        <td>标签</td>
                        <td>作者</td>
                        <td>阅读</td>
                        <td>留言</td>
                        <td>发布时间</td>
                        <td>最后修改时间</td>
                        <td colspan="2" align="center">操作</td>
                    </tr>
                    
                    <?php if(is_array($articlelist)): $k = 0; $__LIST__ = $articlelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr id="product1">
                        <td><?php echo ($k+$firstRow); ?></td>
                        <td><img src="/Uploads/image/<?php echo ($vo["coverpic"]); ?>" height="60" width="60"></td>
                        <td><a href="<?php echo U('Blog/Detail/index',array('id'=>$vo['id']));?>" target="_blank"><?php echo ($vo["title"]); ?></a></td>
                        <td>
                            <a href="<?php echo U('/Admin/Article/showlistsort',array('sortid'=>$vo['sortid']));?>"><?php echo ($vo["sortname"]); ?></a>
                        </td>

                        <td>
                        <?php if(is_array($vo['tag'])): $i = 0; $__LIST__ = $vo['tag'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="<?php echo U('/Admin/Article/showlisttag',array('tagid'=>$v['tagid']));?>"><?php echo ($v['tagname']); ?></a><br /><?php endforeach; endif; else: echo "" ;endif; ?>
                        </td>  

                        <td><?php echo ($vo["author"]); ?></td>
                        <td><?php echo ($vo["readnum"]); ?></td>
                        
                        <td>
                        <?php if(is_array($vo['commentcount'])): $i = 0; $__LIST__ = $vo['commentcount'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$va): $mod = ($i % 2 );++$i; if($va != 0): ?>共有留言：<a href="<?php echo U('/Admin/Comment/showlistarticle',array('articleid'=>$vo['id']));?>"><?php echo ($va); ?></a>
                                <?php else: ?>
                                没有留言<?php endif; endforeach; endif; else: echo "" ;endif; ?>
                        <?php if(is_array($vo['commentcount0'])): $i = 0; $__LIST__ = $vo['commentcount0'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$va0): $mod = ($i % 2 );++$i; if(($va0) != "0"): ?>（待审核：<?php echo ($va0); ?>）<?php endif; endforeach; endif; else: echo "" ;endif; ?>
                        </td>

                        <td><?php echo (date("Y-m-d H:i;s",$vo["time"])); ?></td>
                        <td><?php echo (date("Y-m-d H:i;s",$vo["lastmodifytime"])); ?></td>

                        <td><a href="<?php echo U('/Admin/Article/modifyarticle',array('id'=>$vo['id']));?>">修改</a></td>
                        <td><a href="<?php echo U('/Admin/Article/deletearticle',array('id'=>$vo['id']));?>" onclick="return confirm('你真的要删除这篇文章吗？');">删除</a></td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>                  

                    <tr>
                        <td colspan="20" style="text-align: center;">
                            <?php echo ($page); ?>
                        </td>
                    </tr>
                </tbody>
            </table><?php endif; ?>

            <div style="height: 30px;text-align: center;">
                <?php if(empty($articlelist)): ?><p>
                        还没有文章噢，快写篇文章吧~
                    </p><?php endif; ?>
            </div>

        </div>

            <div class="clear"></div>

        </div>


        
    </div>

</body>
</html>