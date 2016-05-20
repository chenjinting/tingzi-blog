<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

        <title>标签列表</title>

        <link href="<?php echo (ADMIN_CSS_URL); ?>mine.css" type="text/css" rel="stylesheet" />
    </head>
    <body>
        <style>
            .tr_color{background-color: #9F88FF}
        </style>
        <div class="div_head">
            <span>
                <span style="float: left;">当前位置是：标签管理-》标签列表</span>
                <span style="float: right; margin-right: 8px; font-weight: bold;">
                    <a style="text-decoration: none;" href="<?php echo U('/Admin/Tag/addtag');?>">【添加标签】</a>
                </span>
            </span>
        </div>
        <div></div>
        <div style="font-size: 13px; margin: 10px 5px;">
            <table class="table_a" border="1" width="100%">
                <tbody>
                    <tr style="font-weight: bold;">
                        <td>序号</td>
                        <td>标签名称</td>
                        <td colspan="2">操作</td>
                    </tr>

                    <?php if(is_array($taglist)): $i = 0; $__LIST__ = $taglist;if( count($__LIST__)==0 ) : echo "还没有标签噢，快添加标签吧~" ;else: foreach($__LIST__ as $key=>$tag): $mod = ($i % 2 );++$i;?><tr id="product1">
                        <td><?php echo ($i+$firstRow); ?></td>
                        <td><a href="#"><?php echo ($tag["tagname"]); ?></a></td>
                        <td><a href="<?php echo U('/Admin/Tag/modifytag',array('tagid'=>$tag['tagid'],'tagname'=>$tag['tagname']));?>">修改</a></td>
                        <td><a href="<?php echo U('/Admin/Tag/deletetag',array('tagid'=>$tag['tagid']));?>" onclick="return confirm('你真的要删除这个标签吗？');">删除</a></td>
                    </tr><?php endforeach; endif; else: echo "还没有标签噢，快添加标签吧~" ;endif; ?>

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