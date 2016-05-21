<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

        <title>管理员列表</title>

        <link href="<?php echo (ADMIN_CSS_URL); ?>mine.css" type="text/css" rel="stylesheet" />
    </head>
    <body>
        <style>
            .tr_color{background-color: #9F88FF}
        </style>
        <div class="div_head">
            <span>
                <span style="float: left;">当前位置是：管理员管理-》管理员列表</span>
                <span style="float: right; margin-right: 8px; font-weight: bold;">
                    <a style="text-decoration: none;" href="<?php echo U('/Admin/Admin/addadmin');?>">【添加管理员】</a>
                </span>
            </span>
        </div>
        <div></div>
        <div style="font-size: 13px; margin: 10px 5px;">
            <table class="table_a" border="1" width="100%">
                <tbody>
                    <tr style="font-weight: bold;">
                        <td>序号</td>
                        <td>管理员帐号</td>
                        <td colspan="2">操作</td>
                    </tr>

                    <?php if(is_array($adminlist)): $i = 0; $__LIST__ = $adminlist;if( count($__LIST__)==0 ) : echo "还没有管理员噢，快添加管理员吧~" ;else: foreach($__LIST__ as $key=>$admin): $mod = ($i % 2 );++$i;?><tr id="product1">
                        <td><?php echo ($i+$firstRow); ?></td>
                        <td><a href="#"><?php echo ($admin["username"]); ?></a></td>
                        <td><a href="<?php echo U('/Admin/Admin/editadmin',array('id'=>$admin['id']));?>">修改</a></td>
                        <td><a href="<?php echo U('/Admin/Admin/deleteadmin',array('id'=>$admin['id']));?>" onclick="return confirm('你真的要删除这个管理员吗？');">删除</a></td>
                    </tr><?php endforeach; endif; else: echo "还没有管理员噢，快添加管理员吧~" ;endif; ?>

                    <tr>
                        <td colspan="20" style="text-align: center;">
                            <?php echo ($page); ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>
</html>