<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>添加文章</title>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <link href="<?php echo (ADMIN_CSS_URL); ?>mine.css" type="text/css" rel="stylesheet">
    </head>

    <body>

        <div class="div_head">
            <span>
                <span style="float:left">当前位置是：文章管理-》添加文章信息</span>
                <span style="float:right;margin-right: 8px;font-weight: bold">
                    <a style="text-decoration: none" href="<?php echo U('/Admin/Article/showlist');?>">【返回】</a>
                </span>
            </span>
        </div>
        <div></div>

        <div style="font-size: 13px;margin: 10px 5px">
            <form action="<?php echo U('/Admin/Article/modifyarticle');?>" method="post" enctype="multipart/form-data">
            <table border="1" width="100%" class="table_a">
                <tr>
                    <td>文章标题</td>
                    <td><input type="text" name="title" value="<?php echo ($articleres["title"]); ?>" /><input type="hidden" name="id" value="<?php echo ($articleres["id"]); ?>" /></td>
                </tr>
                <tr>
                    <td>文章作者</td>
                    <td><input type="text" name="author" value="<?php echo ($articleres["author"]); ?>" /></td>
                </tr>
                <tr>
                    <td>文章分类</td>
                    <td>
                        <select name="sortid">
                            <option value="0">选择一个分类</option>
                            <?php if(is_array($sortres)): $i = 0; $__LIST__ = $sortres;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sort): $mod = ($i % 2 );++$i;?><option <?php if($articleres['sortid'] == $sort['sortid']): ?>selected="selected"<?php endif; ?> value="<?php echo ($sort["sortid"]); ?>">
                                <?php echo ($sort["sortname"]); ?>
                            </option><?php endforeach; endif; else: echo "" ;endif; ?>

                        </select>
                    </td>
                </tr>
                <tr>
                    <td>文章图片</td>
                    <td>
                        <input type="file" name="coverpic" />
                        <img src="/Uploads/<?php echo ((isset($articleres["coverpic"]) && ($articleres["coverpic"] !== ""))?($articleres["coverpic"]):'default.jpg'); ?>" width="250px;" />
                    </td>
                </tr>
                <tr>
                    <td>文章详情</td>
                    <td>
                        <textarea style="width: 1500px;height: 400px;" name="content">
                            <?php echo ($articleres["content"]); ?>
                        </textarea>
                    </td>
                </tr>
                
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" value="添加">
                    </td>
                </tr>  
            </table>
            </form>
        </div>
    </body>
</html>