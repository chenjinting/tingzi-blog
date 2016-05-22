<?php if (!defined('THINK_PATH')) exit();?> <!DOCTYPE HTML>
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

<script type="text/javascript">
    $(function(){
        var current_url = "/Blog/List/showlistsort/sortid/<?php echo ($articleres["sortid"]); ?>";
        $('a[href="'+current_url+'"]').addClass('activeli');
    })
 </script>

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

<div class="meta">
	<h1 class="meta-tit"><?php echo ($articleres["title"]); ?></h1>
	<p class="meta-info">
		分类：	<a href="<?php echo U('/Blog/List/showlistsort',array('sortid'=>$articleres['sortid']));?>"><?php echo ($articleres["sortname"]); ?></a> <br />
		标签：	<?php if(is_array($articleres['tag'])): $i = 0; $__LIST__ = $articleres['tag'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?><a href="<?php echo U('/Blog/List/showlisttag',array('tagid'=>$vo2['tagid']));?>"><?php echo ($vo2["tagname"]); ?>&nbsp;&nbsp; </a><?php endforeach; endif; else: echo "" ;endif; ?> <br />
		发表日期：<?php echo (date("Y-m-d",$articleres["time"])); ?> &nbsp;&nbsp; 
		阅读：<?php echo ($articleres["readnum"]); ?>次&nbsp;&nbsp; 
	</p>
</div>




<div class="entry">
	<img width="630" alt="<?php echo ($articleres["title"]); ?>" src="/Uploads/image/<?php echo ($articleres["coverpic"]); ?>" class="aligncenter size-full wp-image-38074">
	<?php echo (stripslashes(htmlspecialchars_decode($articleres["content"]))); ?>
</div>

<div>文章版权属于文章作者所有，转载请注明：<a href="<?php echo U('/Blog/Detail/index',array('id'=>$articleres['id']));?>" title=" 诸葛亮写给儿子的一封信，仅86字！ " rel="bookmark"><?php echo ($articleres["title"]); ?></a></div> 



<!-- 广告代码 -->
<!-- 百度推荐 -->


</div>

<div class="sidebar">
	
	<div class="widget widget_categories">
	<h3 class="widget-tit"> </h3>		
	<ul>
		<?php if(is_array($tagres)): $i = 0; $__LIST__ = $tagres;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li class="cat-item cat-item-18 current-cat">
				<a title="<?php echo ($v["tagname"]); ?>" href="<?php echo U('/Blog/List/showlisttag',array('tagid'=>$v['tagid']));?>">	
				    <?php echo ($v["tagname"]); ?>
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