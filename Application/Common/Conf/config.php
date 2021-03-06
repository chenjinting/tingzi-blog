<?php
return array(
	//'配置项'=>'配置值'
 
	// 'SHOW_PAGE_TRACE' 		          =>		    true,                       // 页面Trace信息
	
	'URL_CASE_INSENSITIVE'            =>            true,                       // 使项目在Linux系统下URL不区分大小写（默认为区分大小写）
	'DEFAULT_THEME'				      =>   		    'default',                  // 设置默认主题

	/* 设置可访问模块以及默认模块 */
	'MODULE_ALLOW_LIST'			      =>			array('Admin','Blog'),
	'DEFAULT_MODULE'			      =>			'Blog',
       
	'URL_MODEL'					      =>			2,                         // 设置URL访问模式		

	      
	// 'URL_ROUTER_ON'				      =>			true,                      // 启用路由功能


	/* 数据库配置 */
	'DB_TYPE'                         =>            'mysql',                    // 数据库类型
    'DB_HOST'                         =>            'localhost',                // 服务器地址
    'DB_NAME'                         =>            'chenjtwebsite',            // 数据库名
    'DB_USER'                         =>            'root',                     // 用户名
    'DB_PWD'                          =>            '',                         // 密码
    'DB_PORT'                         =>            '',                         // 端口
    'DB_PREFIX'                       =>            'cjt_',                     // 数据库表前缀
    'DB_PARAMS'          	          =>            array(),                    // 数据库连接参数    
    'DB_DEBUG'  			          =>            TRUE,                       // 数据库调试模式 开启后可以记录SQL日志
    'DB_FIELDS_CACHE'                 =>            true,                       // 启用字段缓存
    'DB_CHARSET'                      =>            'utf8',                     // 数据库编码默认采用utf8
    'DB_DEPLOY_TYPE'                  =>            0,                          // 数据库部署方式:0 集中式(单一服务器),1 分布式(主从服务器)
    'DB_RW_SEPARATE'                  =>            false,                      // 数据库读写是否分离 主从式有效
    'DB_MASTER_NUM'                   =>            1,                          // 读写分离后 主服务器数量
    'DB_SLAVE_NO'                     =>            '',                         // 指定从服务器序号   

    /* 模板路径替换 */
    'TMPL_PARSE_STRING'               =>            array(
        '__UPLOADIMG__'                  =>            'Uploads/image/',    // 文章图片模板路径
    ),

    /* 设置伪静态后缀 */
    'URL_HTML_SUFFIX'                 =>            '',
);
