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
                <span style="float: right; margin-right: 8px; font-weight: bold;">
                    <a style="text-decoration: none;" href="<?php echo U('/Admin/Article/addarticle');?>">【添加文章】</a>
                </span>
            </span>
        </div>
        <div></div>
        <div class="div_search">
            <span>
                <form action="#" method="get">
                    品牌<select name="s_product_mark" style="width: 100px;">
                        <option selected="selected" value="0">请选择</option>
                        <option value="1">苹果apple</option>
                    </select>
                    <input value="查询" type="submit" />
                </form>
            </span>
        </div>
        <div style="font-size: 13px; margin: 10px 5px;">
            <table class="table_a" border="1" width="100%">
                <tbody>
                    <tr style="font-weight: bold;">
                        <td>序号</td>
                        <td>封面</td>
                        <td>文章标题</td>
                        <td>文章分类</td>
                        <td>作者</td>
                        <td>发布时间</td>
                        <td colspan="2" align="center">操作</td>
                    </tr>

                    <?php if(is_array($articlelist)): $i = 0; $__LIST__ = $articlelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr id="product1">
                        <td><?php echo ($i+$firstRow); ?></td>
                        <td><img src="/Uploads/<?php echo ((isset($vo["coverpic"]) && ($vo["coverpic"] !== ""))?($vo["coverpic"]):'default.jpg'); ?>" height="60" width="60"></td>
                        <td><a href="#"><?php echo ($vo["title"]); ?></a></td>
                        <td><?php echo ($vo["sortname"]); ?></td>                  
                        <td><?php echo ($vo["author"]); ?></td>
                        <td><?php echo (date("Y-m-d",$vo["time"])); ?></td>
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
                <?php if(empty($articlelist)): ?><p>
                        还没有文章噢，快写篇文章吧~
                    </p><?php endif; ?>
            </div>

        </div>
    </body>
</html>