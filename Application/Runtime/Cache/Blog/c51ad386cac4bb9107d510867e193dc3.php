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

<script type="text/javascript">
    $(function(){
        var current_url = "/Blog/List/index/sortid/<?php echo ($sortid); ?>";
        $('.nav li a[href="'+current_url+'"]').addClass('activeli');
    })
 </script>

</head>
<body class="archive category category-philosophy-life category-18">

<div class="topbar">
	<div class="inner">
		<a title="意空间阅读网_青春励志文章_励志文章阅读" href="<?php echo U('/Blog');?>" class="logo">意空间阅读网</a>
		<ul class="nav">
			<?php if(is_array($sortres)): $i = 0; $__LIST__ = $sortres;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="menu-item menu-item-type-taxonomy menu-item-object-category" id="menu-item-180">
					<a href="<?php echo U('/Blog/List/index',array('sortid'=>$vo['sortid']));?>" ><?php echo ($vo["sortname"]); ?></a>
				</li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>

	</div>
</div> 

<div class="wrapper">
	<div class="content">


	
	<!-- 分享代码 --><!-- 分享代码 -->
	
	<ul class="excerpt thumb">
		<?php if(is_array($articleres)): $i = 0; $__LIST__ = $articleres;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
			<a class="pic" href="/38073.html">
			<img alt="<?php echo ($vo["title"]); ?>" src="/Uploads/<?php echo ((isset($vo["coverpic"]) && ($vo["coverpic"] !== ""))?($vo["coverpic"]):'default.jpg'); ?>"></a>			
			<h2 class="excerpt-tit"><a href="<?php echo U('/Blog/Detail/index',array('id'=>$vo['id']));?>"><?php echo ($vo["title"]); ?></a></h2>
			<p class="excerpt-desc">				
				<?php echo (substr($vo["content"],0,300)); ?>...
			</p>
			<div class="excerpt-time"><?php echo (date("Y-m-d",$vo["time"])); ?></div>
		</li><?php endforeach; endif; else: echo "" ;endif; ?>
	</ul>

<div class="paging"><?php echo ($page); ?></div>

</div>
<div class="sidebar">
	
	<div class="widget widget_categories"><h3 class="widget-tit"> </h3>		<ul>
	<li class="cat-item cat-item-18 current-cat"><a title="人生哲理栏目为广大网友奉献人生哲理名言，人生哲理故事，人生哲理文章，哲理名人名言名录大全。" href="/category/philosophy-life">人生哲理_人生哲理文章阅读_人生哲理语录句子大全</a>
</li>
	<li class="cat-item cat-item-795"><a title="人生感悟栏目为读者分享人生感悟日志、人生感悟的句子、人生感悟文章、人生感悟名言、人生感悟散文等一系列人生的感悟。" href="/category/perception-life">人生感悟文章散文_人生感悟的句子_人生感悟语录语句</a>
</li>
	<li class="cat-item cat-item-25"><a title="意空间伤感说说栏目主要分享伤感的句子说说心情，心情不好的说说大全，伤感QQ说说大全，说说心情短语，qq说说心情短语，qq空间说说，爱情说说等各类说说。" href="/category/network">伤感心情说说_伤感的句子说说心情_心情不好的说说心情短语</a>
</li>
	<li class="cat-item cat-item-1"><a title="励志文章栏目为网友倾心奉献励志名言大全，励志的句子，名人励志人生故事，励志经典语录，励志经典语句等励志资料大全，读励志文章，过励志人生。" href="/category/inspirational-life">励志文章_励志小故事_励志的句子_励志语录名言</a>
</li>
	<li class="cat-item cat-item-119"><a title="意空间阅读网唯美的句子栏目为读者分享关于爱情的唯美句子，关于友情的唯美句子，唯美伤感的句子，唯美诗句，唯美语录，唯美文字，唯美爱情句子，唯美古风句子等，和唯美相关的句子语录。" href="/category/workplace-life">唯美的句子_关于爱情的唯美句子_关于友情的唯美句子</a>
</li>
	<li class="cat-item cat-item-1376"><a title="意空间心情栏目主要分享心情说说，心情随笔，心情短语，心情日志大全等，一切有关心情的文章和语录说说，心情不好怎么办，就看意空间心情说说。" href="/category/good-books">心情说说_心情随笔_心情短语_心情日记大全</a>
</li>
	<li class="cat-item cat-item-198"><a title="情感美文栏目为读者奉献青春情感故事，青春情感文章，青春情感语录，青春情感爱情故事，校园青春情感故事，让我们阅读美好的情感美文，记忆自己的青春情感历程。" href="/category/youth-campus">情感美文文章_伤感美文散文阅读_情感语录句子</a>
</li>
	<li class="cat-item cat-item-330"><a title="意空间阅读散文精选栏目主要分享散文精选文章，优美散文阅读，经典散文随笔，散文诗，伤感散文，短篇散文精选以及朱自清散文，余秋雨散文，林清玄散文集等各类名家精选散文。" href="/category/renwen">散文精选_优美散文阅读_经典散文随笔_抒情散文吧</a>
</li>
	<li class="cat-item cat-item-211"><a title="涨姿势吧，全民涨姿势，更涨知识，社会，爆料，八卦，没品新闻，美食，涨姿势科普，涨姿势福利社，每天阅读十分钟，姿势倍儿涨。" href="/category/poetry">涨姿势吧_来这里涨点姿势吧_还可以更涨知识哦！</a>
</li>
	<li class="cat-item cat-item-5"><a title="爱情文章栏目为广大网友奉献感动你我的家庭亲情文章、亲情故事，感动天地的人间爱情故事、爱情文章，让世间充满情充满爱，情爱遍人间。" href="/category/affection-sentiment">爱情文章_爱情散文_爱情故事日记_爱情美文</a>
</li>
	<li class="cat-item cat-item-19"><a title="经典美文为读者分享每个人的美好心情，美好心情日志，美好心情文章，美文欣赏，经典美文美句摘抄，让心情踏上快乐的美好心灵旅途，成为读者心中的心灵鸡汤。" href="/category/spiritual-journey">经典美文摘抄_经典美文美句摘抄_经典美文欣赏</a>
</li>
	<li class="cat-item cat-item-3770"><a title="经典语录栏目分享经典语录语句，经典句子，一句话经典语录，经典爱情语录，亲情爱情友情伤感语录句子，青春励志经典语录语句，经典励志语录句子大全，传递正能量，活出精彩生活。" href="/category/jingdianyulu">经典语录句子_经典爱情语录_一句话经典语录语句大全</a>
</li>
		</ul>
</div>		<div class="widget widget_recent_entries">		<h3 class="widget-tit">最新发表</h3>		<ul>
					<li>
				<a href="/38069.html">我知道，我终将成为更好的人</a>
						</li>
					<li>
				<a href="/38073.html">诸葛亮写给儿子的一封信，仅86字！</a>
						</li>
					<li>
				<a href="/38061.html">你的第二身份是什么？看后让我沉思良久！</a>
						</li>
					<li>
				<a href="/38065.html">在喜欢的领域里打一场漂亮的持久战</a>
						</li>
					<li>
				<a href="/37984.html">爱情语录：我己被你完全俘虏，注定此生为你而沉醉</a>
						</li>
					<li>
				<a href="/37980.html">爱情语录：我们暧昧，我们却不属于对方</a>
						</li>
					<li>
				<a href="/37976.html">爱情语录：对于你的名字，从今不再想起</a>
						</li>
					<li>
				<a href="/37972.html">爱情语录：愿因只有三个字：我爱你！永远永远！</a>
						</li>
				</ul>
		</div></div></div>

<div class="footer">
	<div class="inner">
		
		<div class="copyright">
			意空间，<a href="">青春励志文章</a>阅读，版权所有，保留一切权利！ &copy; 2016 <a href="">意空间阅读网</a> <a href="http://www.miitbeian.gov.cn" target="_blank">湘ICP备13010121号-3</a>
		</div>
	</div>
</div> 








</body></html>