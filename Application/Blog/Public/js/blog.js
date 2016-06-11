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

});