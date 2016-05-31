<?php if (!defined('THINK_PATH')) exit();?> <!DOCTYPE HTML>
<html><head>
<meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
<meta content="pc,mobile" name="applicable-device">
<meta content="no-transform" http-equiv="Cache-Control">
<meta content="no-siteapp" http-equiv="Cache-Control">
<meta content="width=device-width" name="viewport">
<link href="<?php echo (BLOG_CSS_URL); ?>style.css" media="screen" type="text/css" rel="stylesheet">
<link href="<?php echo (BLOG_CSS_URL); ?>base.css" media="screen" type="text/css" rel="stylesheet">

<script src="<?php echo (BLOG_JS_URL); ?>jquery.min.js"></script> 
<title>人生哲理_人生哲理文章阅读_人生哲理语录句子大全_意空间阅读网</title><meta content="人生哲理_人生哲理文章阅读_人生哲理语录句子大全" name="keywords">
<meta content="人生哲理栏目为广大网友奉献人生哲理名言，人生哲理故事，人生哲理文章，哲理名人名言名录大全。" name="description">

<script type="text/javascript">

	// 设置当前页面的导航栏高亮
    $(function(){
        var current_url = "/Blog/List/showlistsort/sortid/<?php echo ($articleres["sortid"]); ?>";
        $('a[href="'+current_url+'"]').addClass('activeli');
    });

    // 设置页面评论跳转锚点速度
    // $(function(){
    // 	var anchor = "<?php echo ($commentlist["commentid"]); ?>";
    // 	$('html,body').animate({scrollTop:$('#'.anchor).offset().top},500);
    // });

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
		留言：<?php echo ($commentnum); ?>
	</p>
</div>

<div class="entry">
	<img width="630" alt="<?php echo ($articleres["title"]); ?>" src="/Uploads/image/<?php echo ($articleres["coverpic"]); ?>" class="aligncenter size-full wp-image-38074">
	<?php echo (stripslashes(htmlspecialchars_decode($articleres["content"]))); ?>
</div>

<div>文章版权属于文章作者所有，转载请注明：<a href="<?php echo U('/Blog/Detail/index',array('id'=>$articleres['id']));?>" title=" 诸葛亮写给儿子的一封信，仅86字！ " rel="bookmark"><?php echo ($articleres["title"]); ?></a></div> 

<p>
上一篇：<?php if(empty($frontres)): ?><span>前面没有文章啦</span>
		<?php else: ?>
			<span><a href="<?php echo U('/Blog/Detail/index',array('id'=>$frontres['id']));?>"><?php echo ($frontres["title"]); ?></a></span><?php endif; ?>
</p>
<p>
下一篇：<?php if(empty($afterres)): ?><span>后面没有文章啦</span>
		<?php else: ?>
			<span><a href="<?php echo U('/Blog/Detail/index',array('id'=>$afterres['id']));?>"><?php echo ($afterres["title"]); ?></a></span><?php endif; ?>
</p>

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

<!-- 评论 -->
<div class="comment">
	<h2>评论</h2>
	<?php if(is_array($commentlist)): $i = 0; $__LIST__ = $commentlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c): $mod = ($i % 2 );++$i;?><div class="comment-list" id="<?php echo ($c["commentid"]); ?>">
		<div class="every-comment">
			<div class="comment-img">
				<img src="<?php echo (BLOG_IMG_URL); ?>commentauthor-img.png" />
			</div>		
			<div class="comment-author comment-paddingleft">
				<?php if(empty($c["personsite"])): ?><strong><?php echo ($c["commentauthor"]); ?></strong>
				<?php else: ?>
					<a href="<?php echo ($c["personsite"]); ?>" target="_blank"><strong><?php echo ($c["commentauthor"]); ?></strong></a><?php endif; ?>				
			</div>
			<div class="comment-content comment-paddingleft">
				<?php echo ($c["commentcontent"]); ?>
			</div>
			<div class="comment-time comment-paddingleft">
				<?php echo (date("Y-m-d",$c["commenttime"])); ?>
			</div>
		</div>
	</div><?php endforeach; endif; else: echo "" ;endif; ?>

	<div style="height: 30px;text-align: center;">
        <?php if(empty($commentlist)): ?><p>
                还没有留言噢，写条留言吧~
            </p><?php endif; ?>
    </div>

	<form action="<?php echo U('/Blog/Detail/addcomment');?>" method="post"  enctype="multipart/form-data">
		<div class="publish-comment">
			<h3>留言</h3>
			<p>
				<input type="hidden" name="articleid" value="<?php echo ($articleres["id"]); ?>" />		
				<input type="text" name="commentauthor" placeholder="你的昵称（必填）" />
			</p>
			<p>		
				<input type="text" name="personsite" placeholder="你的个人站点网址" />
			</p>
			<p>		
				<textarea name="commentcontent" placeholder="在这写下你的留言吧~"></textarea>
			</p>
			<p>
				<button type="submit">发表留言</button>
			</p>
		</div>
	</form>


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


<script type="text/javascript">
	// 百度分享
    window._bd_share_config = {
    	// 通用设置
		common : {
			bdText: "<?php echo ($articleres["content"]); ?>",  // 分享的内容
			bdDesc: "<?php echo ($articleres["abstract"]); ?>", //分享的摘要
			bdUrl: "http://www.chenjinting.com/Blog/Detail/index/id/<?php echo ($articleres['id']); ?>", //分享的Url地址
			bdPic: "http://www.chenjinting.com/Uploads/image/<?php echo ($articleres["coverpic"]); ?>", // 分享的图片
			// onAfterClick: 'function(cmd){}', // 在用户点击分享按钮后执行代码，cmd为分享目标id。可用于统计等

		},
		// 分享按钮设置
		share : [{
			"tag": "share_1", // 与data-tag一致，表示该配置只会应用于data-tag值一致的分享按钮。如果不设置tag，该配置将应用于所有分享按钮
			"bdSize": 24, //分享按钮的尺寸
			// "bdCustomStyle": "样式文件地址", //自定义样式，引入样式文件
		}],
		// 浮窗分享设置
		slide : [{
			bdImg : 0, // 分享浮窗图标的颜色
			bdPos : "right", // 分享浮窗的位置
			bdTop : 100, // 分享浮窗与可视区域顶部的距离(px)
		}],
		// 图片分享设置
		image : [{
			//此处放置图片分享设置
		
		}],
		selectShare : [{
			//此处放置划词分享设置
		
		}]
	}

	//以下为js加载部分
	with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?cdnversion='+~(-new Date()/36e5)];
</script>

</body></html>