<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

        <title>留言列表</title>

        <link href="<?php echo (ADMIN_CSS_URL); ?>mine.css" type="text/css" rel="stylesheet" />
    </head>
    <body>
        <style>
            .tr_color{background-color: #9F88FF}
        </style>
        <div class="div_head">
            <span style="float: left;">当前位置是：留言管理-》留言列表</span>
        </div>
        <div></div>
        <div style="font-size: 13px; margin: 10px 5px;">
            <?php if(!empty($commentlist)): ?><table class="table_a" border="1" width="100%">
                <tbody>
                    
                    <tr style="font-weight: bold;">
                        <td>序号</td>
                        <td>留言内容</td>
                        <td>文章</td>
                        <td>留言时间</td>
                        <td>留言人</td>
                        <td>留言人站点</td>
                        <td>审核状态</td>
                        <td colspan="2" align="center">操作</td>
                    </tr>
                    
                    <?php if(is_array($commentlist)): $k = 0; $__LIST__ = $commentlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr id="product1">
                        <td><?php echo ($k+$firstRow); ?></td>
                        <td><a href="/Blog/Detail/index/id/<?php echo ($vo["articleid"]); ?>/#<?php echo ($vo["commentid"]); ?>" target="_blank"><?php echo ($vo["commentcontent"]); ?></a></td>
                        <td><?php echo ($vo["title"]); ?></td>
                        <td><?php echo (date("Y-m-d H:i;s",$vo["commenttime"])); ?></td>  
                        <td><?php echo ($vo["commentauthor"]); ?></td>
                        <td><a href="<?php echo ($vo["personsite"]); ?>" target="_blank"><?php echo ($vo["personsite"]); ?></a></td>
                        <td>
                            <?php if($vo["status"] == 0): ?>待审核
                            <?php else: ?>
                                审核通过<?php endif; ?>
                        </td>
                        <td>
                            <?php if($vo["status"] == 0): ?><a href="<?php echo U('/Admin/Comment/reviewcomment',array('commentid'=>$vo['commentid']));?>">审核通过</a>
                                <a href="<?php echo U('/Admin/Comment/deletecomment',array('commentid'=>$vo['commentid']));?>">审核不通过</a>
                            <?php else: ?>
                                <a href="<?php echo U('/Admin/Comment/deletecomment',array('commentid'=>$vo['commentid']));?>" onclick="return confirm('你真的要删除这条留言吗？');">删除</a><?php endif; ?>
                        </td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>                  

                    <tr>
                        <td colspan="20" style="text-align: center;">
                            <?php echo ($page); ?>
                        </td>
                    </tr>
                </tbody>
            </table><?php endif; ?>

            <div style="height: 30px;text-align: center;">
                <?php if(empty($articlelist)): ?><p>
                        还没有留言噢，快写篇留言吧~
                    </p><?php endif; ?>
            </div>

        </div>
    </body>
</html>