<?php
return array(
	//'配置项'=>'配置值'
 
	// 'SHOW_PAGE_TRACE' 		          =>		    true,            // 页面Trace信息
	
	'URL_CASE_INSENSITIVE'            =>            true,            // 使项目在Linux系统下URL不区分大小写（默认为区分大小写）
	'DEFAULT_THEME'				      =>   		    'default',       // 设置默认主题

	// 设置可访问模块以及默认模块
	'MODULE_ALLOW_LIST'			      =>			array('Home','Admin'),
	'DEFAULT_MODULE'			      =>			'Home',
 
	// 设置URL访问模式      
	'URL_MODEL'					      =>			2,		

	// 启用路由功能      
	'URL_ROUTER_ON'				      =>			true,
);