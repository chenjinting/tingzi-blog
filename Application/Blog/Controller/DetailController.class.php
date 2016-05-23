<?php
namespace Blog\Controller;
use Think\Controller;

/**
 * 文章详情页
 */
class DetailController extends Controller {

    public function index(){

        $sort = D('Sort');
        $sortres = $sort->select();

        $tag = D('Tag');
        $tagres = $tag->select();

        $readnum = D('Article');
        
        $article = D('Article');
        $articleid = I('id');

        $readres = $readnum->where(array('id'=>$articleid))->setInc('readnum',1); // 用户浏览一次文章，即更新数据库readnum字段，使其加1

        // 上一篇
        $frontres = $article->where("id<".$articleid)->order('id DESC')->limit('1')->find();
        
        // 下一篇
        $afterres = $article->where("id>".$articleid)->order('id ASC')->limit('0,1')->find();

        $articletag = D('Articletag');
        $articleid['articleid'] = I('id');

        $articleres = $article->relation(true)->find($articleid);
        $this->assign('articleres',$articleres);
        $this->assign('sortres',$sortres);
        $this->assign('tagres',$tagres);
        $this->assign('frontres',$frontres);
        $this->assign('afterres',$afterres);

        $this->display('detail');
    }
}