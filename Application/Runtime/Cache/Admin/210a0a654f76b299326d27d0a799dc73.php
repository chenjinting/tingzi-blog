<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">    
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <meta http-equiv="Cache-Control" content="no-siteapp" /> <!-- 禁止百度转码 -->
    <title>挺 | 后台管理 - 写文章</title>

    <link href="<?php echo (ADMIN_CSS_URL); ?>admin.css" type="text/css" rel="stylesheet" />
    <script type="text/javascript" src="<?php echo (ADMIN_JS_URL); ?>jquery-1.12.4.min.js"></script>
    
    <script type="text/javascript" src="<?php echo (ADMIN_JS_URL); ?>admin.js"></script>

    <script type="text/javascript" src="<?php echo (ADMIN_JS_URL); ?>ueditor.js"></script>
    <script type="text/javascript" src="<?php echo (ADMIN_VENDOR_URL); ?>Ueditor/ueditor.config.js"></script>
    <script type="text/javascript" src="<?php echo (ADMIN_VENDOR_URL); ?>Ueditor/ueditor.all.min.js"></script>
    
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
        <input type="hidden" id="currenturl" value="/Admin/Article/showlist" />

        <div class="addarticle main">
            <h1>正在写文章...</h1>

            <div class="cancel-area">
                <?php if($issorttag == 0): ?><a class="publish-cancel" href="<?php echo U('/Admin/Article/showlist');?>">不写了</a>
                <?php elseif($issorttag == 1): ?>
                    <a class="publish-cancel" href="<?php echo U('/Admin/Article/showlistsort',array('sortid'=>$sortidvalue));?>">不写了</a>
                <?php elseif($issorttag == 2): ?>
                    <a class="publish-cancel" href="<?php echo U('/Admin/Article/showlisttag',array('tagid'=>$tagidvalue));?>">不写了</a><?php endif; ?>
            </div>

            <div class="editarticle">
                <form action="<?php echo U('/Admin/Article/addarticle');?>" method="post" enctype="multipart/form-data">
                    <div class="layout-wrapper">
                        <div class="every-input">

                            <input type="hidden" name="issorttag" value="<?php echo ($issorttag); ?>" />
                            <input type="hidden" name="sortidvalue" value="<?php echo ($sortidvalue); ?>" />
                            <input type="hidden" name="tagidvalue" value="<?php echo ($tagidvalue); ?>" />

                            <span class="input-head float-left">标题</span>
                            <p class="input-body"><input class="input-title all-input" type="text" name="title" placeholder="文章标题" /></p>
                        </div>
                        <div class="every-input">
                            <span class="input-head float-left">作者</span>
                            <p class="input-body"><input class="input-author all-input" type="text" name="author" placeholder="文章作者" /></p>
                        </div>
                        <div class="every-input">
                            <span class="input-head float-left">分类</span>
                            <p class="input-body">
                                <select <?php if($issorttag == 1): ?>disabled="disabled"<?php endif; ?> class="select-sort all-input" name="sortid">
                                    <option value="0">选择一个分类</option>

                                    <?php if(is_array($sortres)): $i = 0; $__LIST__ = $sortres;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sort): $mod = ($i % 2 );++$i;?><option <?php if($sortidvalue == $sort['sortid']): ?>selected="selected"<?php endif; ?> value="<?php echo ($sort["sortid"]); ?>"><?php echo ($sort["sortname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </p>
                        </div>
                        <div class="every-input">
                            <span class="input-head float-left">标签</span>
                            <p class="input-body">
                                <input class="articletag11" type="hidden" value="<?php echo ($tagidvalue); ?>" />
                                <?php if(is_array($tagres)): $i = 0; $__LIST__ = $tagres;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><p class="everytag float-left">
                                        <input class="articletag22" id="<?php echo ($v["tagid"]); ?>" type="checkbox" name="tagid[]" value="<?php echo ($v["tagid"]); ?>" />
                                        <label for="<?php echo ($v["tagid"]); ?>"><?php echo ($v["tagname"]); ?></label>
                                        &nbsp;
                                    </p><?php endforeach; endif; else: echo "" ;endif; ?>

                                <div class="clear"></div>
                            </p>
                        </div>
                        <div class="every-input">
                            <span class="input-head float-left">封面</span>
                            <p class="input-body">
                                <img src="" id="coverpicpreview" class="float-left" width="250px;">
                                <div class="upload-coverpic">
                                    <div class="upload-botton float-left">选择图片</div>
                                </div>
                                <input type="file" name="coverpic" id="coverpic-input" multiple="multiple" />                          
                                <div class="clear"></div>
                            </p>
                        </div>
                        <div class="every-input">
                            <span class="input-head float-left">摘要</span>
                            <p class="input-body">
                                <textarea class="abstract-input all-input" name="abstract" placeholder="摘要不能超过100字！标点符号也算一个字噢~"></textarea>
                            </p>
                        </div>
                        <div class="every-input">
                            <span class="input-head float-left">正文</span>
                            <p class="input-body">
                                <textarea id="content" name="content"></textarea>
                            </p>
                        </div>
                    </div>

                    <div class="submit-area">
                        <button type="submit" class="publish-submit">发布文章</button>                       
                    </div>

                </form>
                
                
            </div>

        </div>

            <div class="clear"></div>

        </div>

        
    </div>

</body>
</html>