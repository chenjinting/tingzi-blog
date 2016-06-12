<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">    
    <meta name="author" content="挺，253018164@qq.com">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <meta http-equiv="Cache-Control" content="no-siteapp" /> <!-- 禁止百度转码 -->
    <meta name="description" content="前端与生活">
    <meta name="keywords" content="前端与生活">
    <title>挺 | 工作与生活</title>

    <link rel="shortcut icon" href="<?php echo (BLOG_IMG_URL); ?>favicon.ico" type="image/x-icon">
	<link rel="icon" href="<?php echo (BLOG_IMG_URL); ?>favicon.ico" type="image/x-icon">
    <link href="<?php echo (BLOG_CSS_URL); ?>blog.css" type="text/css" rel="stylesheet" />
    <script type="text/javascript" src="<?php echo (BLOG_JS_URL); ?>jquery-1.12.4.min.js"></script>
    <script type="text/javascript" src="<?php echo (BLOG_JS_URL); ?>blog.js"></script>

</head>
<body>

	<div class="page">
		<div class="header">
	<div class="header-area">
		<div class="blog-logo float-left">
			<a href="<?php echo U('/Blog');?>"><img src="<?php echo (BLOG_IMG_URL); ?>logo.png" alt="挺子的博客"></a>
		</div>
		<div class="search-area float-right">
	        <form action="<?php echo U('/Blog/List/search');?>" method="get">
	            <input type="text" placeholder="搜索文章标题..." class="search-input float-left" name="search-key" value="<?php echo ($keywords); ?>" />
	            <button type="submit" class="search-submit float-left">搜索</button>
	        </form>   
        </div>
		<div class="head-sort float-right">
			<ul>
				<?php if(is_array($sortres)): $i = 0; $__LIST__ = $sortres;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U('/Blog/List/showlistsort',array('sortid'=>$vo['sortid']));?>" >
					<li class="every-head-sort float-left">
						<?php echo ($vo["sortname"]); ?>
					</li>
				</a><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
		</div>

	</div>
</div>

		<div class="content">
			<div class="content-left float-left">
				<?php if(!empty($articleres)): ?><div class="article-list">
					<?php if(is_array($articleres)): $i = 0; $__LIST__ = $articleres;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo22): $mod = ($i % 2 );++$i;?><div class="every-article">
						<div class="article-coverpic float-left">
							<a href="<?php echo U('/Blog/Detail/index',array('id'=>$vo22['id']));?>">
								<img alt="<?php echo ($vo22["title"]); ?>" src="/Uploads/image/<?php echo ($vo22["coverpic"]); ?>">
							</a>
						</div>
						<div class="article-info float-left">
							<h2 class="article-title">
								<a href="<?php echo U('/Blog/Detail/index',array('id'=>$vo22['id']));?>"><?php echo ($vo22["title"]); ?></a>
							</h2>
							<p class="article-baseinfo">
								<span>作者</span>
								<span><?php echo ($vo22["author"]); ?></span>
								<span>时间</span>
								<span><?php echo (date("Y-m-d",$vo22["lastmodifytime"])); ?></span>
								<span>阅读</span>
								<span><?php echo ($vo22["readnum"]); ?></span>
								<span>留言</span>
								<span>
									<?php if(is_array($vo22['commentcount1'])): $i = 0; $__LIST__ = $vo22['commentcount1'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vc): $mod = ($i % 2 );++$i; echo ($vc["commentcount1"]); endforeach; endif; else: echo "" ;endif; ?>
								</span>
							</p>
							<p class="article-abstract"><?php echo ($vo22["abstract"]); ?>...	</p>
							<p class="article-classification">
								<div class="article-sort  float-left">
									<span>分类：</span>
									<a href="<?php echo U('/Blog/List/showlistsort',array('sortid'=>$vo22['sortid']));?>"><?php echo ($vo22["sortname"]); ?></a>
								</div>
								<div class="article-tag float-left">
									<span>标签:</span>
									<?php if(is_array($vo22['tag'])): $i = 0; $__LIST__ = $vo22['tag'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo3): $mod = ($i % 2 );++$i;?><a href="<?php echo U('/Blog/List/showlisttag',array('tagid'=>$vo3['tagid']));?>"><?php echo ($vo3['tagname']); ?>&nbsp;</a><?php endforeach; endif; else: echo "" ;endif; ?>
								</div>
							</p>
						</div>
						<a href="<?php echo U('/Blog/Detail/index',array('id'=>$vo22['id']));?>" class="article-read-all">阅读全文</a>
					</div><?php endforeach; endif; else: echo "" ;endif; ?>
				</div>	

				<div class="pagination"><?php echo ($page); ?></div><?php endif; ?>

				<?php if(empty($articleres)): ?><p class="emptydata">博主好懒啊，一篇文章都没有~</p><?php endif; ?>       		

			</div>		

			<div class="content-right float-left">
	
	<div class="content-right-tag">
		<h2 class="content-right-tag-head">标签</h2>
		<div class="content-right-tag-area">
			<?php if(is_array($tagres)): $i = 0; $__LIST__ = $tagres;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tagvo): $mod = ($i % 2 );++$i;?><span class="every-content-right-tag float-left">
				<a title="<?php echo ($tagvo["tagname"]); ?>" href="<?php echo U('/Blog/List/showlisttag',array('tagid'=>$tagvo['tagid']));?>">	
				    <?php echo ($tagvo["tagname"]); ?>
				</a>
			</span><?php endforeach; endif; else: echo "" ;endif; ?>
		</div>
	</div>

</div>

			<div class="clear"></div>
		</div>	

		<div class="footer">
	<div class="footer-area">
		<p>Copyright © 2011-2016 <a href="<?php echo U('/Blog');?>">挺子 | 工作与生活</a></p>
	</div>
</div> 
	</div>

</body>
</html>