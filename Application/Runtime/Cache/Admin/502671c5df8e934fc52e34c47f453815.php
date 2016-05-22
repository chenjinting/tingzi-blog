<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>添加文章</title>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <link href="<?php echo (ADMIN_CSS_URL); ?>mine.css" type="text/css" rel="stylesheet">
        <script src="<?php echo (ADMIN_JS_URL); ?>jquery.min.js"></script> 
        <script type="text/javascript">
            window.UEDITOR_HOME_URL = '<?php echo (ADMIN_VENDOR_URL); ?>Ueditor/';
            window.onload = function(){
                window.UEDITOR_CONFIG.initialFrameWidth = '100%';
                window.UEDITOR_CONFIG.initialFrameHeight = 500;
                window.UEDITOR_CONFIG.scaleEnabled = true;

                UE.getEditor('content');
            }
        </script>
        <script type="text/javascript" src="<?php echo (ADMIN_VENDOR_URL); ?>Ueditor/ueditor.config.js"></script>
        <script type="text/javascript" src="<?php echo (ADMIN_VENDOR_URL); ?>Ueditor/ueditor.all.min.js"></script>

        <script type="text/javascript">
            jQuery(function(){              
                $('.articletag2').each(function(i){
                    var articletag2 = $(this).val();

                    $('.articletag1').each(function(){
                        var articletag1 = $(this).val();

                        if(articletag2 == articletag1){
                            $('.articletag2').eq(i).attr('checked','checked');
                        }
                    });
                });
            })
        </script>

    </head>

    <body>

        <div class="div_head">
            <span>
                <span style="float:left">当前位置是：文章管理-》修改文章信息</span>
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
                    <td>文章标签</td>
                    <td>
                        <?php if(is_array($articletagid)): $i = 0; $__LIST__ = $articletagid;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><input class="articletag1" type="hidden" name="tagidselected[]" value="<?php echo ($vo); ?>" /><?php endforeach; endif; else: echo "" ;endif; ?>

                        <?php if(is_array($tagres)): $i = 0; $__LIST__ = $tagres;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><input class="articletag2" type="checkbox" name="tagid[]" value="<?php echo ($v["tagid"]); ?>" /><?php echo ($v["tagname"]); endforeach; endif; else: echo "" ;endif; ?>           
                    </td>
                </tr>
                <tr>
                    <td>文章封面</td>
                    <td>
                        <input type="file" name="coverpic" />
                        <img src="/Uploads/image/<?php echo ($articleres["coverpic"]); ?>" width="250px;" />
                    </td>
                </tr>
                <tr>
                    <td>文章摘要</td>
                    <td>
                        <textarea style="width: 1610px;height: 50px;" name="abstract" onKeyUp="if(this.value.length > 100) alert('摘要不能超过100字！标点符号也算一个字噢~');this.value=this.value.substr(0,100)"><?php echo ($articleres["abstract"]); ?></textarea>
                    </td>
                    
                </tr>
                <tr>
                    <td>文章详情</td>
                    <td>
                        <textarea id="content" style="width: 1500px;height: 400px;" name="content"><?php echo ($articleres["content"]); ?></textarea>
                    </td>
                </tr>
                
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" value="修改">
                    </td>
                </tr>  
            </table>
            </form>
        </div>
    </body>
</html>