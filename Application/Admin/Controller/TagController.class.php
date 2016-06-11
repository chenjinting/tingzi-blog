<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Page;

/**
 * 文章标签管理
 */
class TagController extends BaseController {

    /**
     * [showlist 标签列表]
     * @return [type] [description]
     */
    public function showlist(){
        $tag = D('Tag');
        $articletag = D('Articletag');
        $tagres = $tag->select();

        // 分页开始
        $count = $tag->count(); //查询满足要求的记录总数
        $page = new Page($count,30); // 实例化分页类 传入总记录数和每页显示的记录数(30)

        // 分页样式配置
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('theme','共%TOTAL_ROW%个标签 有%TOTAL_PAGE%页 %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');

        $pageshow = $page->show(); // 分页显示输出

        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $firstRow = $page->firstRow;    // 起始行数
        $taglist = $tag->limit($firstRow.','.$page->listRows)->select();

        // 查询每个标签下的文章数量
        $tagid = $tag->field('tagid')->select();
        foreach($tagid as $value){
            $tagidres=$value['tagid'];
            $tagarticlecount[] = $articletag->where(array('tagid'=>$tagidres))->count();
        }
        // 将该标签下的文章数量插到标签列表数组里
        foreach($tagarticlecount as $k=>$v){
            $taglist[$k]['tagarticlecount'][] = $v;
        }

        $this->assign('firstRow',$firstRow);
        $this->assign('taglist',$taglist);    // 赋值数据集
        $this->assign('page',$pageshow);    // 赋值分页输出
        $this->assign('count',$count);
        $this->display();
    }


    /**
     * [addtag 添加标签]
     * @return [type] [description]
     */
    public function addtag(){
        if(IS_POST){
            $data['tagname'] = I('tagname');  // 获取标签添加输入框的值
            $tag = D('Tag');
            if($tag->create($data)){
                if($tag->add($data)){
                    $this->success("成功新增一个标签！",U('showlist'),1);
                }else{
                    $this->error("新增标签失败，请重新添加！");
                }
            }else{
                $this->error($tag->getError());
            }
            
            return;
        }
                
        $this->display();
    }  

    /**
     * [modifytag 修改标签]
     * @return [type] [description]
     */
    public function modifytag(){
        /* 修改提交 */
        if(IS_POST){
            $data['tagname'] = I('tagname');
            $data['tagid'] = I('tagid');
            $tag = D('Tag');
            if($tag->create($data)){
                if($tag->save($data)){
                    $this->success("成功修改标签名称！",U('showlist'),1);
                }else{
                    $this->error("修改标签名称失败，请重新操作！");
                }
            }else{
                $this->error($tag->getError());
            }

            return;
        }
        /* 获取标签名称显示在修改界面输入框 */
        $tagname = I('tagname');
        $tagid = I('tagid');
        $this->assign('tagname',$tagname);
        $this->assign('tagid',$tagid);
        
        $this->display();
    }

    /**
     * [deletetag 删除标签]
     * @return [type] [description]
     */
    public function deletetag(){
        $tagid = I('tagid');
        $tag = D('Tag');
        if($tag->relation(true)->delete($tagid)){
            $this->success("删除标签成功！",U('showlist'),1);
        }else{
            $this->error("删除标签失败！");
        }
    }

}