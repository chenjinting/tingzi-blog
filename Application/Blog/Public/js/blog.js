$(function(){

	/* 获取当前导航菜单的URL值，并根据该值寻找该导航菜单，使其高亮 */
    var current_url = $('#currenturl').val();
    $('.head-sort a[href="'+current_url+'"] li').addClass('active-header');


	/*使footer始终位于页面底部*/
	var windowheight = $(window).height();	//获取屏幕高度
	var containerheight = $('.page').height();	//获取内容区高度

	if(containerheight < windowheight){
		$('.footer').css({
			'position':'absolute',
			'left':'0',
			'bottom':'0',
		});
	}


	/*使用键盘左右方向键控制实现上一篇下一篇文章*/
	var pre_article = $('.pre-article a').attr("href");
	var next_article = $('.next-article a').attr("href");
	var pre_page = $('.pagination .prev').attr("href");
	var next_page = $('.pagination .next').attr("href");
	var pre_num = $('.current').prev('.num').length;
	var next_num = $('.current').next('.num').length;

	$(document).keydown(function(e){
		// 上一篇下一篇文章
		if(pre_article || next_article){
			if(e.which == 37){
				if(!pre_article){
					alert('前面没有文章啦~');
				}else{
					location.href = pre_article;
				}
			}
			if(e.which == 39){
				if(!next_article){
					alert('后面没有文章啦~');
				}else{
					location.href = next_article;
				}
			}
		}
		
		// 上一页下一页列表
		if(pre_page || next_page){
			if(e.which == 37){
				if(pre_num == 0){
					alert('前面没有啦');
				}else{
					location.href = pre_page;
				}
			}
			if(e.which == 39){
				if(next_num == 0){
					alert('后面没有啦');
				}else{
					location.href = next_page;
				}
			}	
		}
	});

});