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


	/*百度分享*/
    window._bd_share_config = {
    	// 通用设置
		common : {
			bdText: "{$articleres.content}",  // 分享的内容
			bdDesc: "{$articleres.abstract}", //分享的摘要
			bdUrl: "http://www.chenjinting.com/Blog/Detail/index/id/{$articleres['id']}", //分享的Url地址
			bdPic: "http://www.chenjinting.com/__UPLOADIMG__{$articleres.coverpic}", // 分享的图片
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

});