$(function(){
	/* 引入百度富文本编辑器，并做相关配置 */
	window.UEDITOR_HOME_URL = '{$Think.const.ADMIN_VENDOR_URL}Ueditor/';
	window.onload = function(){
	    window.UEDITOR_CONFIG.initialFrameWidth = '100%';
	    window.UEDITOR_CONFIG.initialFrameHeight = 450;
	    window.UEDITOR_CONFIG.scaleEnabled = true;
	    UE.getEditor('content');
	}
})
