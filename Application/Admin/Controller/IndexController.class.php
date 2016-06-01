<?php
namespace Admin\Controller;
use Think\Controller;

/**
 * 后台主界面
 */
class IndexController extends BaseController {

    public function index(){

        
        $article = D('Article');
        $comment = D('Comment');
        $sort = D('Sort');
        $tag = D('Tag');


        $articlenum = $article->count();	// 文章总数量

        $readnumsum = $article->getField('SUM(readnum)');	// 所有文章总阅读数量

        $commentnum = $comment->count();	// 总留言数量

        $sortnum = $sort->count();	// 总分类数量

        $tagnum = $tag->count();	// 总标签数量

        $maxreadnum = $article->max('readnum');
        $maxreadnumarticle = $article->where(array('readnum'=>$maxreadnum))->getField('title');	// 阅读次数最多的文章

        $maxcommentnum = $article->max('readnum');
        $maxreadnumarticle = $article->where(array('readnum'=>$maxreadnum))->getField('title');	// 留言最多的文章

        /* 查询留言最多的文章标题 */
        $maxcomment = $comment->field('articleid, count(articleid)')->group('articleid')->order('count(articleid) DESC')->limit(1)->select();
        foreach($maxcomment as $value){
            $maxarticleid = $value['articleid'];
        }
        $maxarticle = $article->where(array('id'=>$maxarticleid))->getField('title');
        

        $this->assign('articlenum',$articlenum);
        $this->assign('commentnum',$commentnum);
        $this->assign('sortnum',$sortnum);
        $this->assign('tagnum',$tagnum);
        $this->assign('readnumsum',$readnumsum);

        $this->display();
    } 

}