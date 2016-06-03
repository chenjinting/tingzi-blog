<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Page;

/**
 * 文章分类管理
 */
class SortController extends BaseController {

    /**
     * [showlist 分类列表]
     * @return [type] [description]
     */
    public function showlist(){
        $sort = D('Sort');
        $article = D('Article');
        $sortres = $sort->select();

        // 分页开始
        $count = $sort->count(); //查询满足要求的记录总数
        $page = new Page($count,30); // 实例化分页类 传入总记录数和每页显示的记录数(30)

        // 分页样式配置
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('theme','共%TOTAL_PAGE%页 %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');

        $pageshow = $page->show(); // 分页显示输出

        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $firstRow = $page->firstRow;    // 起始行数
        $sortlist = $sort->limit($firstRow.','.$page->listRows)->select();

        // 查询每个分类下的文章数量
        $sortid = $sort->field('sortid')->select();
        foreach($sortid as $value){
            $sortidres = $value['sortid'];
            $sortarticlecount[] = $article->where(array('sortid'=>$sortidres))->count();
        }
        // 将该分类下的文章数量插到分类列表数组里
        foreach($sortarticlecount as $k=>$v){
            $sortlist[$k]['sortarticlecount'][] = $v;
        }

        $this->assign('firstRow',$firstRow);
        $this->assign('sortlist',$sortlist);    // 赋值数据集
        $this->assign('page',$pageshow);    // 赋值分页输出
        $this->assign('count',$count);    // 分类数量

        $this->display();
    }


    /**
     * [addsort 添加分类]
     * @return [type] [description]
     */
    public function addsort(){
        if(IS_POST){
            $data['sortname'] = I('sortname');  // 获取分类添加输入框的值
            $sort = D('Sort');
            if($sort->create($data)){
                if($sort->add($data)){
                    $this->success("成功新增一个栏目！",U('showlist'),1);
                }else{
                    $this->error("新增分类失败，请重新添加！");
                }
            }else{
                $this->error($sort->getError());
            }
            
            return;
        }
                
        $this->display();
    }  

    /**
     * [modifysort 修改分类]
     * @return [type] [description]
     */
    public function modifysort(){
        /* 修改提交 */
        if(IS_POST){
            $data['sortname'] = I('sortname');
            $data['sortid'] = I('sortid');
            $sort = D('Sort');
            if($sort->create($data)){
                if($sort->save($data)){
                    $this->success("成功修改分类名称！",U('showlist'),1);
                }else{
                    $this->error("修改分类名称失败，请重新操作！");
                }
            }else{
                $this->error($sort->getError());
            }

            return;
        }
        /* 获取分类名称显示在修改界面输入框 */
        $sortname = I('sortname');
        $sortid = I('id');
        $this->assign('sortname',$sortname);
        $this->assign('sortid',$sortid);
        $this->display();
    }

    /**
     * [deletesort 删除分类]
     * @return [type] [description]
     */
    public function deletesort(){
        $sortid = I('id');
        $sort = D('Sort');
        if($sort->delete($sortid)){
            $this->success("删除分类成功！",U('showlist'),1);
        }else{
            $this->error("删除分类失败！");
        }
    }

}