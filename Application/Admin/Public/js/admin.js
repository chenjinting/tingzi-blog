$(function(){

	/* 获取当前导航菜单的URL值，并根据该值寻找该导航菜单，使其高亮 */
    var current_url = $('#currenturl').val();
    $('.sidebar-menu a[href="'+current_url+'"] li').addClass('active-sidebar');


    /*鼠标滑进滑出 显示/隐藏 文章修改与删除按钮*/
    $('.every-article').hover(function(){
    	$('.operate').eq($(this).index()).css('display','block');
    },function(){
    	$('.operate').eq($(this).index()).css('display','none');
    });


    /*鼠标滑进滑出 显示/隐藏 分类、标签修改与删除按钮*/
    $('.every-sort-tag').hover(function(){
    	$('.sort-tag-operate').eq($(this).index()).css('display','block');
    },function(){
    	$('.sort-tag-operate').eq($(this).index()).css('display','none');
    });


    /*鼠标滑进滑出 显示/隐藏 留言删除按钮*/
    $('.every-comment').hover(function(){
        $(this).find('.comment-delete').css('display','block');     
    },function(){
        $(this).find('.comment-delete').css('display','none');
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
		if(this.value.length > 70){
			alert('字数太多啦，最多70字噢~');
		}
		this.value=this.value.substr(0,70)
	});


    /*在修改文章的界面，设置该文章的所含标签为选中状态*/
    $('.articletag2').each(function(i){
        var articletag2 = $(this).val();
        $('.articletag1').each(function(){
            var articletag1 = $(this).val();
            if(articletag2 == articletag1){
                $('.articletag2').eq(i).attr('checked','checked');
            }
        });
    });


    /*在分类/标签文章列表打开添加文章界面，根据相应分类/文章名称默认选中该分类/标签，并且该分类/标签不可选*/
    var articletag11 = $('.articletag11').val();
    $('.articletag22').each(function(i){
        var articletag22 = $(this).val();
        if(articletag22 == articletag11){
            $('.articletag22').eq(i).attr({'checked':'checked','disabled':true});
        }
    });


    /*添加文章界面，点击提交按钮后设置取消分类和标签的相应控件不可选状态*/
    $('.publish-submit').click(function(){
        $('.select-sort').attr('disabled',false);
        $('.articletag22').attr('disabled',false);
    });


    /*使用键盘左右方向键控制实现上一篇下一篇文章*/
    var pre_page = $('.pagination .prev').attr("href");
    var next_page = $('.pagination .next').attr("href");
    var pre_num = $('.current').prev('.num').length;
    var next_num = $('.current').next('.num').length;

    $(document).keydown(function(e){
        // 上一页下一页列表
        if((pre_page || next_page)){
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

})