<?php if (!defined('THINK_PATH')) exit();?> <!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">    
    <meta name="author" content="挺，253018164@qq.com">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <meta http-equiv="Cache-Control" content="no-siteapp" /> <!-- 禁止百度转码 -->
    <meta name="description" content="<?php echo ($articleres["abstract"]); ?>">
    <meta name="keywords" content="<?php if(is_array($articleres['tag'])): $i = 0; $__LIST__ = $articleres['tag'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i; echo ($vo2["tagname"]); ?> |<?php endforeach; endif; else: echo "" ;endif; ?>">
    <title>挺 | 前端与生活</title>

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

		<!-- 用于存储当前导航菜单的URL值，使引入的外部js文件获取到该值，以达到高亮导航栏的效果 -->
    	<input type="hidden" id="currenturl" value="/Blog/List/showlistsort/sortid/<?php echo ($articleres["sortid"]); ?>" />

		<div class="content">
			<div class="content-left float-left">
				<div class="content-detail-area">
					<div class="detai-info">
						<p class="detail-title"><?php echo ($articleres["title"]); ?></p>
						<p class="detail-baseinfo">
							<span>作者</span>
							<span><?php echo ($articleres["author"]); ?></span>
							<span>时间</span>
							<span><?php echo (date("Y-m-d",$articleres["lastmodifytime"])); ?></span>
							<span>阅读</span>
							<span><?php echo ($articleres["readnum"]); ?></span>
							<span>留言</span>
							<span><?php echo ($commentnum); ?></span>
						</p>
						<p class="detail-classification">
							<span class="detail-sort">
							<span class="detail-srot-head">分类:</span>
							<a class="detail-sort-name" href="<?php echo U('/Blog/List/showlistsort',array('sortid'=>$articleres['sortid']));?>"><?php echo ($articleres["sortname"]); ?></a>
							</span>
							<span class="detail-tag">
								<span class="detail-tag-head">标签:</span>
								<?php if(is_array($articleres['tag'])): $i = 0; $__LIST__ = $articleres['tag'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?><a class="detail-tag-name" href="<?php echo U('/Blog/List/showlisttag',array('tagid'=>$vo2['tagid']));?>"><?php echo ($vo2["tagname"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
							</span>
						</p>
						
					</div>

					<div class="detail-content"><?php echo (stripslashes(htmlspecialchars_decode($articleres["content"]))); ?></div>

					<div class="pre-next-article">
						<p class="pre-article float-left">
						上一篇：<?php if(empty($frontres)): ?><span>前面没有文章啦</span>
								<?php else: ?>
									<span><a href="<?php echo U('/Blog/Detail/index',array('id'=>$frontres['id']));?>"><?php echo ($frontres["title"]); ?></a></span><?php endif; ?>
						</p>
						<p class="next-article float-right">
							下一篇：<?php if(empty($afterres)): ?><span>后面没有文章啦</span>
									<?php else: ?>
										<span><a href="<?php echo U('/Blog/Detail/index',array('id'=>$afterres['id']));?>"><?php echo ($afterres["title"]); ?></a></span><?php endif; ?>
						</p>
						<div class="clear"></div>
					</div>

				</div>

				<!-- 百度分享 -->
				<div class="bdsharebuttonbox" data-tag="share_1">
					<a class="bds_mshare" data-cmd="mshare"></a>
					<a class="bds_qzone" data-cmd="qzone" href="#"></a>
					<a class="bds_tsina" data-cmd="tsina"></a>
					<a class="bds_baidu" data-cmd="baidu"></a>
					<a class="bds_renren" data-cmd="renren"></a>
					<a class="bds_tqq" data-cmd="tqq"></a>
					<a class="bds_more" data-cmd="more">更多</a>
					<a class="bds_count" data-cmd="count"></a>
				</div>    

				<!-- 留言列表 -->
				<div class="article-comment">
					<p class="article-comment-title">留言（<?php echo ($commentnum); ?>）</p>
					<div class="article-comment-list">				

						<?php if(is_array($commentlist)): $i = 0; $__LIST__ = $commentlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c): $mod = ($i % 2 );++$i;?><div class="every-article-comment" id="<?php echo ($c["commentid"]); ?>">
								<div class="article-comment-author float-left">
									<img src="<?php echo (BLOG_IMG_URL); ?>comment-author-img.png" />
								</div>
								<div class="article-comment-info float-left">
									<p class="article-comment-info-author">
										<?php if(empty($c["personsite"])): echo ($c["commentauthor"]); ?>
										<?php else: ?>
											<a href="<?php echo ($c["personsite"]); ?>" target="_blank"><strong><?php echo ($c["commentauthor"]); ?></strong></a><?php endif; ?>
									</p>
									<p class="article-comment-info-content">
										<?php echo ($c["commentcontent"]); ?>
									</p>
									<p class="article-comment-info-time">
										<?php echo (date("Y-m-d",$c["commenttime"])); ?>
									</p>
								</div>
								<div class="clear"></div>
							</div><?php endforeach; endif; else: echo "" ;endif; ?>

						<?php if(empty($commentlist)): ?><p class="no-comment">还没有留言，写条留言吧~</p><?php endif; ?>

					</div>
				</div>

				<!-- 留言输入 -->
				<div class="article-comment-input">
					<form action="<?php echo U('/Blog/Detail/addcomment');?>" method="post"  enctype="multipart/form-data">
						<div class="publish-comment">
							<h3 class="write-comment-title">写留言</h3>
							<p class="comment-author comment-input">
								<input type="hidden" name="articleid" value="<?php echo ($articleres["id"]); ?>" />		
								<input type="text" name="commentauthor" placeholder="你的昵称（必填）" />
							</p>
							<p class="comment-input">		
								<input type="text" name="personsite" placeholder="你的个人站点网址" />
							</p>
							<p class="comment-input">		
								<textarea name="commentcontent" placeholder="在这写下你的留言吧~"></textarea>
							</p>
							<p class="comment-input">
								<button class="publish-comment" type="submit">发表留言</button>
							</p>
						</div>
					</form>
				</div>
				
				
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
		<p>Copyright © 2011-2016 <a href="<?php echo U('/Blog');?>">挺子 | 前端与生活</a></p>
	</div>
</div> 

	</div>

</body>
</html>