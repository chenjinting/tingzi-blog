<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
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