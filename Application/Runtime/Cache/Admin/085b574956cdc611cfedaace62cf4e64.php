<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">    
    <meta name="author" content="陈锦挺，253018164@qq.com">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <meta http-equiv="Cache-Control" content="no-siteapp" /> <!-- 禁止百度转码 -->
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>挺|后台管理</title>

    <link href="<?php echo (ADMIN_CSS_URL); ?>admin.css" type="text/css" rel="stylesheet" />
</head>
<body>
    <div class="page">
         <div class="page-header">
    <div class="header">
        <div class="header-logo float-left">
            <a href="<?php echo U('http://www.chenjinting.com/Admin');?>">
                <img class="logo01" src="<?php echo (ADMIN_IMG_URL); ?>logo.png" />
                <img class="logo02" src="<?php echo (ADMIN_IMG_URL); ?>logoadmin.png" />
            </a>
        </div>
        <div class="header-menu float-right">
            <ul>
                <li class="float-left">
                    <a class="blog-a" href="<?php echo U('http://www.chenjinting.com/Blog');?>" target="_blank">博客主页</a>
                </li>
                <li class="float-left">
                    <span class="welcome float-left">你好呀，</span><span class="currentuser float-left"><?php echo ($admin); ?></span>
                </li>
                <li class="float-left">
                    <a class="logout" href="<?php echo U('/Admin/Login/logout');?>">退出</a> 
                </li>
            </ul>
        </div>
    </div>
</div>





<br />
<br />
<br />



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv=content-type content="text/html; charset=utf-8" />
        <link href="<?php echo (ADMIN_CSS_URL); ?>admin.css" type="text/css" rel="stylesheet" />
    </head>
    <body>
        <table cellspacing=0 cellpadding=0 width="100%" 
               background="<?php echo (ADMIN_IMG_URL); ?>header_bg.jpg" border=0>
            <tr height=56>
                <td width=260>
                    <a href="<?php echo U('/Admin/Index/index');?>"><img height=56 src="<?php echo (ADMIN_IMG_URL); ?>header_left.jpg" width=260></a>
                </td>
                <td style="font-weight: bold; color: #fff; padding-top: 20px">
                    <a style="color: #fff" href="<?php echo U('http://www.chenjinting.com/Blog');?>" target="_blank">博客主页</a>
                </td>
                <td style="font-weight: bold; color: #fff; padding-top: 20px" align=middle>
                    当前用户：<?php echo ($admin); ?> &nbsp;&nbsp; 
                    <a style="color: #fff" href="<?php echo U('/Admin/Login/logout');?>" target=_top>退出系统</a> 
                </td>
                <td align=right width=268><img height=56 
                                               src="<?php echo (ADMIN_IMG_URL); ?>header_right.jpg" width=268></td></tr></table>
        <table cellspacing=0 cellpadding=0 width="100%" border=0>
            <tr bgcolor=#1c5db6 height=4>
                <td></td>
            </tr>
        </table>
    </body>
</html>

        













<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html><head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <link href="<?php echo (ADMIN_CSS_URL); ?>admin.css" type="text/css" rel="stylesheet" />
        <script language="javascript">
            function expand(el)
            {
                childobj = document.getElementById("child" + el);

                if (childobj.style.display == 'none')
                {
                    childobj.style.display = 'block';
                }
                else
                {
                    childobj.style.display = 'none';
                }
                return;
            }
        </script>
    </head>
    <body>
        <table width="170" height="800" cellspacing="0" cellpadding="0" border="0" background="<?php echo (ADMIN_IMG_URL); ?>menu_bg.jpg">
               <tbody><tr>
                <td valign="top" align="center">
                    <table width="100%" cellspacing="0" cellpadding="0" border="0">

                        <tbody><tr>
                            <td height="10"></td></tr></tbody></table>
                    <table width="150" cellspacing="0" cellpadding="0" border="0">

                        <tbody><tr height="22">
                            <td background="<?php echo (ADMIN_IMG_URL); ?>menu_bt.jpg" style="padding-left: 30px"><a class="menuparent" onclick="expand(1)" href="javascript:void(0);">网站管理</a></td></tr>
                        <tr height="4">
                            <td></td></tr></tbody></table>
                    <table width="150" cellspacing="0" cellpadding="0" border="0" id="child1" style="display: block;">
                        <tbody>
                            <tr height="20">
                                <td width="30" align="center">
                                    <img width="9" height="9" src="<?php echo (ADMIN_IMG_URL); ?>menu_icon.gif">
                                </td>
                                <td>
                                    <a class="menuchild" href="<?php echo U('/Admin/Article/showlist');?>" target="main">文章管理</a>
                                </td>
                            </tr>
                            <tr height="20">
                                <td width="30" align="center">
                                    <img width="9" height="9" src="<?php echo (ADMIN_IMG_URL); ?>menu_icon.gif">
                                </td>
                                <td>
                                    <a class="menuchild" href="<?php echo U('/Admin/Sort/showlist');?>" target="main">分类管理</a>
                                </td>
                            </tr>
                            <tr height="20">
                                <td width="30" align="center">
                                    <img width="9" height="9" src="<?php echo (ADMIN_IMG_URL); ?>menu_icon.gif">
                                </td>
                                <td>
                                    <a class="menuchild" href="<?php echo U('/Admin/Tag/showlist');?>" target="main">标签管理</a>
                                </td>
                            </tr>
                            <tr height="20">
                                <td width="30" align="center">
                                    <img width="9" height="9" src="<?php echo (ADMIN_IMG_URL); ?>menu_icon.gif">
                                </td>
                                <td>
                                    <a class="menuchild" href="<?php echo U('/Admin/Comment/index');?>" target="main">
                                        留言管理<?php if(($newcommentnum) != "0"): ?>(待审核：<?php echo ($newcommentnum); ?>)<?php endif; ?>
                                    </a>
                                </td>
                            </tr>
                            <tr height="20">
                                <td width="30" align="center">
                                    <img width="9" height="9" src="<?php echo (ADMIN_IMG_URL); ?>menu_icon.gif">
                                </td>
                                <td>
                                    <a class="menuchild" href="<?php echo U('/Admin/Admin/showlist');?>" target="main">管理员</a>
                                </td>
                            </tr>
                            <tr height="4">
                                <td colspan="2"></td>
                            </tr>
                        </tbody>
                    </table>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    </td>
                <td width="1" bgcolor="#d1e6f7"></td>
            </tr>
        </tbody></table>
    
</body></html>

        
    </div>
   
</body>
</html>














<!doctype html public "-//w3c//dtd xhtml 1.0 frameset//en" "http://www.w3.org/tr/xhtml1/dtd/xhtml1-frameset.dtd">
<html>
    <head>
        <meta http-equiv=content-type content="text/html; charset=utf-8" />
        <meta http-equiv=pragma content=no-cache />
        <meta http-equiv=cache-control content=no-cache />
        <meta http-equiv=expires content=-1000 />
        
        <title>管理中心 v1.0</title>
    </head>
    <frameset border=0 framespacing=0 rows="60, *" frameborder=0>
        <frame name=head src="<?php echo U('/Admin/Index/head');?>" frameborder=0 noresize scrolling=no>
            <frameset cols="170, *">
                <frame name=left src="<?php echo U('/Admin/Index/left');?>" frameborder=0 noresize />
                <frame name=main src="<?php echo U('/Admin/Index/right');?>" frameborder=0 noresize scrolling=yes />
            </frameset>
    </frameset>
    <noframes>
    </noframes>
</html>