<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Page;
/**
 * 文章管理
 */
class CommentController extends BaseController {

    /**
     * [index 文章留言列表]
     * @return [type] [description]
     */
    public function showlist(){

        $comment = D('Comment');
        
        // 分页开始
        $count = $comment->count(); //查询满足要求的记录总数
        $page = new Page($count,15); // 实例化分页类 传入总记录数和每页显示的记录数(15)

        // 分页样式配置
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('theme','共%TOTAL_ROW%条留言 有%TOTAL_PAGE%页 %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');

        $pageshow = $page->show(); // 分页显示输出

        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $firstRow = $page->firstRow;    // 起始行数

        // 所有留言
        $commentlist = $comment->limit($firstRow.','.$page->listRows)->relation(true)->order('commenttime DESC')->select();

        $this->assign('firstRow',$firstRow);
        $this->assign('commentlist',$commentlist);    // 赋值数据集
        $this->assign('page',$pageshow);    // 赋值分页输出
        $this->assign('count',$count);

        $this->display();
    }


    public function showlistarticle(){

        $articleid = I('articleid');

        $comment = D('Comment');
        $article = D('Article');

        // 分页开始
        $count = $comment->count(); //查询满足要求的记录总数
        $page = new Page($count,30); // 实例化分页类 传入总记录数和每页显示的记录数(10)

        // 分页样式配置
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('theme','共%TOTAL_ROW%条留言 有%TOTAL_PAGE%页 %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');

        $pageshow = $page->show(); // 分页显示输出

        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $firstRow = $page->firstRow;    // 起始行数

        // 所有留言
        $commentlist = $comment->where(array('articleid'=>$articleid))->limit($firstRow.','.$page->listRows)->relation(true)->order('commenttime DESC')->select();

        // 得到该条留言的文章id和名称
        $articleidname = $article->where(array('id'=>$articleid))->field('id, title')->select();
        // var_dump($articleidname);exit();
        
        $this->assign('firstRow',$firstRow);
        $this->assign('commentlist',$commentlist);    // 赋值数据集
        $this->assign('page',$pageshow);    // 赋值分页输出
        $this->assign('articleidname',$articleidname);

        $this->display('showlistarticle');

    }


    /**
     * [reviewcomment 审核留言(审核通过)]
     * @return [type] [description]
     */
    public function reviewcomment(){
        $articleid = I('articleid');
        $data['commentid'] = I('commentid');
        $data['status'] = 1;
        $comment = D('Comment');
        if($comment->create($data)){
            if($comment->save($data)){
                if($articleid){
                    $this->success("该留言审核通过！",U("showlistarticle/",array('articleid'=>$articleid)),1);
                }else{
                    $this->success("该留言审核通过！",U("showlist"),1);
                }              
            }else{
                $this->error("留言审核失败，请重新操作！");
            }
        }else{
            $this->error($article->getError());
        }

    }


    /**
     * [deletearticle 删除留言（审核不通过）]
     * @return [type] [description]
     */
    public function deletecomment(){
        $articleid = I('articleid');
        // var_dump($articleid);exit();
        $commentid = I('commentid');      
        $comment = D('Comment');
        if($comment->relation(true)->delete($commentid)){
            if($articleid){
                $this->success("成功删除该留言！",U("showlistarticle/",array('articleid'=>$articleid)),1);
            }else{
                $this->success("成功删除该留言！",U("showlist"),1);
            }
            
        }else{
            $this->error("留言删除失败！");
        }
    }

}