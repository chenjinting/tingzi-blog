<?php
namespace Blog\Controller;
use Think\Controller;
use Think\Page;

/**
 * 博客主界面
 */
class IndexController extends Controller {

    public function index(){

    	$sort = D('Sort');
    	$sortres = $sort->select();

        $tag = D('Tag');
        $tagres = $tag->select();

    	$article = D('Article');
    	
    	// 分页开始
        $count = $article->count(); //查询满足要求的记录总数
        $page = new Page($count,9); // 实例化分页类 传入总记录数和每页显示的记录数(9)

        // 分页样式配置
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');

        $pageshow = $page->show(); // 分页显示输出

        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $firstRow = $page->firstRow;    // 起始行数
        $articleres = $article->limit($firstRow.','.$page->listRows)->relation(true)->order('lastmodifytime DESC')->select();

        $this->assign('firstRow',$firstRow);
        $this->assign('articleres',$articleres);
        $this->assign('sortres',$sortres);
        $this->assign('tagres',$tagres);
        $this->assign('page',$pageshow);    // 赋值分页输出

        $this->display();
    }
}