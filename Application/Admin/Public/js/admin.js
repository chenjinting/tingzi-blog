$(function(){

	/* 获取当前导航菜单的URL值，并根据该值寻找该导航菜单，使其高亮 */
    var current_url = $('#currenturl').val();
    $('.sidebar-menu a[href="'+current_url+'"] li').addClass('active-sidebar');

    $('.every-article').hover(function(){
    	$('.operate').eq($(this).index()).css('display','block');
    },function(){
    	$('.operate').eq($(this).index()).css('display','none');
    });


    /*绑定上传按钮到.upload-botton上*/
    $('.upload-botton').bind('click',function(e){
    	$('#coverpic-input').click();
    });
    /* 实现上传图片本地预览 */
    $("#coverpic-input").change(function(){
		var objUrl = getObjectURL(this.files[0]);
		// console.log("objUrl = "+objUrl);
		if(objUrl){
			$("#coverpicpreview").attr("src", objUrl).css({
				'width':'170px',
				'height':'135px',
			});
		}
	});
	function getObjectURL(file){
		var url = null; 
		if(window.createObjectURL!=undefined){ // basic
			url = window.createObjectURL(file);
		}else if(window.URL!=undefined){ // mozilla(firefox)
			url = window.URL.createObjectURL(file);
		}else if(window.webkitURL!=undefined){ // webkit or chrome
			url = window.webkitURL.createObjectURL(file);
		}
		return url;
	}


	/* 文章摘要字数检测 */
	$('.abstract-input').keyup(function(){
		if(this.value.length > 100){
			alert('字数太多啦，最多100字噢~');
		}
		this.value=this.value.substr(0,100)
	});

})