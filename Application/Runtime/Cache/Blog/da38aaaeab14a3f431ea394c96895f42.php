<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html><head>
<meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
<meta content="pc,mobile" name="applicable-device">
<meta content="no-transform" http-equiv="Cache-Control">
<meta content="no-siteapp" http-equiv="Cache-Control">
<meta content="width=device-width" name="viewport">
<link href="<?php echo (BLOG_CSS_URL); ?>style.css" media="screen" type="text/css" rel="stylesheet"> 
<script src="<?php echo (BLOG_JS_URL); ?>jquery.min.js"></script> 
<title>人生哲理_人生哲理文章阅读_人生哲理语录句子大全_意空间阅读网</title><meta content="人生哲理_人生哲理文章阅读_人生哲理语录句子大全" name="keywords">
<meta content="人生哲理栏目为广大网友奉献人生哲理名言，人生哲理故事，人生哲理文章，哲理名人名言名录大全。" name="description">

</head>
<body class="archive category category-philosophy-life category-18">

<div class="topbar">
	<div class="inner">
		<a title="意空间阅读网_青春励志文章_励志文章阅读" href="<?php echo U('/Blog');?>" class="logo">意空间阅读网</a>
		<ul class="nav">
			<?php if(is_array($sortres)): $i = 0; $__LIST__ = $sortres;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="menu-item menu-item-type-taxonomy menu-item-object-category" id="menu-item-180">
					<a href="<?php echo U('/Blog/List/showlistsort',array('sortid'=>$vo['sortid']));?>" ><?php echo ($vo["sortname"]); ?></a>
				</li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>

	</div>
</div> 

<div class="wrapper">
	<div class="content">


	
	<!-- 分享代码 --><!-- 分享代码 -->
	<ul class="excerpt thumb">
		<?php if(is_array($articleres)): $i = 0; $__LIST__ = $articleres;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?><li>
			<a class="pic" href="<?php echo U('/Blog/Detail/index',array('id'=>$vo2['id']));?>">
			<img alt="<?php echo ($vo2["title"]); ?>" src="/Uploads/image/<?php echo ($vo2["coverpic"]); ?>"></a>			
			<h2 class="excerpt-tit"><a href="<?php echo U('/Blog/Detail/index',array('id'=>$vo2['id']));?>"><?php echo ($vo2["title"]); ?></a></h2>
			<p>	分类：	<a href="<?php echo U('/Blog/List/showlistsort',array('sortid'=>$vo2['sortid']));?>"><?php echo ($vo2["sortname"]); ?></a></p>
			<p>
				标签：	<?php if(is_array($vo2['tag'])): $i = 0; $__LIST__ = $vo2['tag'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo3): $mod = ($i % 2 );++$i;?><a href="<?php echo U('/Blog/List/showlisttag',array('tagid'=>$vo3['tagid']));?>"><?php echo ($vo3['tagname']); ?>&nbsp;</a><?php endforeach; endif; else: echo "" ;endif; ?>
			</p>
			<p>	阅读：	<?php echo ($vo2["readnum"]); ?></p>
			<p class="excerpt-desc">				
				<?php echo ($vo2["abstract"]); ?>...	
			</p>
			<div class="excerpt-time"><?php echo (date("Y-m-d",$vo2["time"])); ?></div>
		</li><?php endforeach; endif; else: echo "" ;endif; ?>
	</ul>

	<div style="height: 30px;text-align: center;">
        <?php if(empty($articleres)): ?><p>
                博主好懒啊，一篇文章都没有~
            </p><?php endif; ?>
    </div>

	<!-- <div><?php echo ($page); ?></div> -->
	
<div class="paging"><?php echo ($page); ?></div>

</div>

<div class="sidebar">
	
	<div class="widget widget_categories">
	<h3 class="widget-tit"> </h3>		
	<ul>
		<?php if(is_array($tagres)): $i = 0; $__LIST__ = $tagres;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tagvo): $mod = ($i % 2 );++$i;?><li class="cat-item cat-item-18 current-cat">
				<a title="<?php echo ($tagvo["tagname"]); ?>" href="<?php echo U('/Blog/List/showlisttag',array('tagid'=>$tagvo['tagid']));?>">	
				    <?php echo ($tagvo["tagname"]); ?>
				</a>
			</li><?php endforeach; endif; else: echo "" ;endif; ?>
	</ul>

	</div>		
</div>

</div>

<div class="footer">
	<div class="inner">
		
		<div class="copyright">
			意空间，<a href="">青春励志文章</a>阅读，版权所有，保留一切权利！ &copy; 2016 <a href="">意空间阅读网</a> <a href="http://www.miitbeian.gov.cn" target="_blank">湘ICP备13010121号-3</a>
		</div>
	</div>
</div> 








</body></html>