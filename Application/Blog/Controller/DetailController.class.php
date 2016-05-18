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
        $this->assign('sortres',$sortres);

        $article = D('Article');
        $articleid = I('id');
        $articleres = $article->relation(true)->find($articleid);
        $this->assign('articleres',$articleres);

        $this->display('detail');
    }
}