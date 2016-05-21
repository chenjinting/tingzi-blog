<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

        <title>文章列表</title>

        <link href="<?php echo (ADMIN_CSS_URL); ?>mine.css" type="text/css" rel="stylesheet" />
    </head>
    <body>
        <style>
            .tr_color{background-color: #9F88FF}
        </style>
        <div class="div_head">
            <span>
                <span style="float: left;">当前位置是：文章管理-》文章列表</span>
                <p>当前标签为：<?php echo ($articletagnamestr); ?></p>
                <span style="float: right; margin-right: 8px; font-weight: bold;">
                    <a style="text-decoration: none;" href="<?php echo U('/Admin/Article/addarticle');?>">【添加文章】</a>
                </span>
            </span>
        </div>
        <div></div>
        <div style="font-size: 13px; margin: 10px 5px;">
            <table class="table_a" border="1" width="100%">
                <tbody>
                    <tr style="font-weight: bold;">
                        <td>序号</td>
                        <td>封面</td>
                        <td>标题</td>
                        <td>分类</td>
                        <td>标签</td>
                        <td>作者</td>
                        <td>发布时间</td>
                        <td>最后修改时间</td>
                        <td colspan="2" align="center">操作</td>
                    </tr>

                    <?php if(is_array($articlelisttag)): $k = 0; $__LIST__ = $articlelisttag;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr id="product1">
                        <td><?php echo ($k+$firstRow); ?></td>
                        <td><img src="/Uploads/<?php echo ($vo["coverpic"]); ?>" height="60" width="60"></td>
                        <td><a href="<?php echo U('/Admin/Article/modifyarticle',array('id'=>$vo['id']));?>"><?php echo ($vo["title"]); ?></a></td>
                        <td>
                            <a href="<?php echo U('/Admin/Article/showlistsort',array('sortid'=>$vo['sortid']));?>"><?php echo ($vo["sortname"]); ?></a>
                        </td>

                        <td>
                        <?php if(is_array($vo['tag'])): $i = 0; $__LIST__ = $vo['tag'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="<?php echo U('/Admin/Article/showlisttag',array('tagid'=>$v['tagid']));?>"><?php echo ($v['tagname']); ?></a><br /><?php endforeach; endif; else: echo "" ;endif; ?>
                        </td>   

                        <td><?php echo ($vo["author"]); ?></td>
                        <td><?php echo (date("Y-m-d",$vo["time"])); ?></td>
                        <td><?php echo (date("Y-m-d",$vo["lastmodifytime"])); ?></td>

                        <td><a href="<?php echo U('/Admin/Article/modifyarticle',array('id'=>$vo['id']));?>">修改</a></td>
                        <td><a href="<?php echo U('/Admin/Article/deletearticle',array('id'=>$vo['id']));?>" onclick="return confirm('你真的要删除这篇文章吗？');">删除</a></td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>

                    
                    

                    <tr>
                        <td colspan="20" style="text-align: center;">
                            <?php echo ($page); ?>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div style="height: 30px;text-align: center;">
                <?php if(empty($articlelisttag)): ?><p>
                        还没有文章噢，快写篇文章吧~
                    </p><?php endif; ?>
            </div>

        </div>
    </body>
</html>