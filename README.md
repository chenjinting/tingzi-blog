项目的技术选型是：LAMP + jQuery + SASS + ThinkPHP。

项目运行需要配置虚拟主机。

先这样吧，之后继续完善，嘻嘻。

## 项目架构
<pre>
<code>
www             WEB部署目录（或者子目录）
├─index.php        入口文件
├─README.md        README文件
├─Application      应用目录
│  ├─Admin            后台管理模块目录
│  │  ├─Controller        控制器文件目录
│  │  ├─Model             模型文件目录
│  │  ├─View              模板文件目录
│  │  ├─Public            资源文件目录
│  │  │  ├─sass-admin         sass文件目录
│  │  │  ├─css                经sass编译后的css文件目录
│  │  │  ├─img                图片资源文件目录
│  │  │  ├─js                 js文件目录
│  │  │  ├─vendor             第三方工具目录
│  │  │  └──Ueditor             后台模块引用的百度富文本编辑器目录
│  │  
│  ├─Blog             博客模块目录
│  │  ├─Controller        控制器文件目录
│  │  ├─Model             模型文件目录
│  │  ├─View              模板文件目录
│  │  ├─Public            资源文件目录
│  │  │  ├─sass-blog      sass文件目录
│  │  │  ├─css            经sass编译后的css文件目录
│  │  │  ├─img            图片资源文件目录
│  │  │  └──js            js文件目录
│  │  
│  └─Home             网站主页默认模块目录
│    
├─Public          公共资源文件目录
└─ThinkPHP        框架目录
</code>
</pre>






