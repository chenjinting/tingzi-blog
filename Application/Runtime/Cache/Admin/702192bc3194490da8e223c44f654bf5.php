<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

        <title>分类列表</title>

        <link href="<?php echo (ADMIN_CSS_URL); ?>mine.css" type="text/css" rel="stylesheet" />
    </head>
    <body>
        <style>
            .tr_color{background-color: #9F88FF}
        </style>
        <div class="div_head">
            <span>
                <span style="float: left;">当前位置是：分类管理-》分类列表</span>
                <span style="float: right; margin-right: 8px; font-weight: bold;">
                    <a style="text-decoration: none;" href="<?php echo U('/Admin/Sort/addsort');?>">【添加分类】</a>
                </span>
            </span>
        </div>
        <div></div>
        <div style="font-size: 13px; margin: 10px 5px;">
            <table class="table_a" border="1" width="100%">
                <tbody>
                    <tr style="font-weight: bold;">
                        <td>序号</td>
                        <td>分类名称</td>
                        <td colspan="2">操作</td>
                    </tr>

                    <?php if(is_array($sortlist)): $i = 0; $__LIST__ = $sortlist;if( count($__LIST__)==0 ) : echo "还没有分类噢，快添加分类吧~" ;else: foreach($__LIST__ as $key=>$sort): $mod = ($i % 2 );++$i;?><tr id="product1">
                        <td><?php echo ($i+$firstRow); ?></td>
                        <td><a href="#"><?php echo ($sort["sortname"]); ?></a></td>
                        <td><a href="<?php echo U('/Admin/Sort/modifysort',array('id'=>$sort['sortid'],'sortname'=>$sort['sortname']));?>">修改</a></td>
                        <td><a href="<?php echo U('/Admin/Sort/deletesort',array('id'=>$sort['sortid']));?>" onclick="return confirm('你真的要删除这个分类吗？');">删除</a></td>
                    </tr><?php endforeach; endif; else: echo "还没有分类噢，快添加分类吧~" ;endif; ?>

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