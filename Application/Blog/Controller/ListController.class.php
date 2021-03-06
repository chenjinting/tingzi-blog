<?php
namespace Blog\Controller;
use Think\Controller;
use Think\Page;

/**
 * 各个分类下的列表页
 */
class ListController extends Controller {

    public function showlistsort(){
        
        $sort = D('Sort');
        $sortid = I('sortid');
        $sortres = $sort->select();

        $tag = D('Tag');
        $tagres = $tag->select();

        $article = D('Article');
        $comment = D('Comment');

        $condition['sortid'] = $sortid;
        
        // 分页开始
        $count = $article->where($condition)->count(); //查询该分类下的所有文章
        $page = new Page($count,10); // 实例化分页类 传入总记录数和每页显示的记录数(9)

        // 分页样式配置
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('theme','共%TOTAL_ROW%篇文章 有%TOTAL_PAGE%页 %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');

        $pageshow = $page->show(); // 分页显示输出

        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $firstRow = $page->firstRow;    // 起始行数
        $articleres = $article->where($condition)->limit($firstRow.','.$page->listRows)->relation(true)->order('lastmodifytime DESC')->select();
        // 每篇文章的所有已审核留言数量
        foreach($articleres as $value){
            $articleid = $value['id'];                  
            $articlecommentnum1[] = $comment->where(array('articleid'=>$articleid,'status'=>1))->count();      
        }
        // 将所有已审核留言数量数组插入文章数组里
        foreach($articlecommentnum1 as $k2=>$v2){
            $articleres[$k2]['commentcount1'][] = $v2;
        }

        $this->assign('firstRow',$firstRow);
        $this->assign('articleres',$articleres);    // 赋值数据集
        $this->assign('page',$pageshow);    // 赋值分页输出
        $this->assign('sortres',$sortres);
        $this->assign('tagres',$tagres);
        $this->assign('sortid',$sortid);

        $this->display();
    }


    /**
     * [showlisttag 后台某个标签文章列表]
     * @return [type] [description]
     */
    public function showlisttag(){

        $articletag = D('Articletag');
        $article = D('Article');
        $comment = D('Comment');
        $tag = D('Tag');
        $tagid = I('tagid');
        $condition['tagid'] = $tagid;
        $articletagid = $articletag->where($condition)->getField('articleid',true); // 查询articletag表中该标签下的文章id数组（一维数组）

        $tagres = $tag->select();

        $sort = D('Sort');
        $sortres = $sort->select();

        $articletagname = $tag->where($condition)->getField('tagname',true);  // 获取该标签名称
        $articletagnamestr = implode($articletagname); //得到的标签名称为数组，将其转化为字符串

        $map['id'] = array('in',$articletagid);        

        // 分页开始
        $count = $articletag->where($condition)->count(); //查询该标签下的记录总数
        $page = new Page($count,10); // 实例化分页类 传入总记录数和每页显示的记录数(9)

        // 分页样式配置
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('theme','共%TOTAL_ROW%篇文章 有%TOTAL_PAGE%页 %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');

        $pageshow = $page->show(); // 分页显示输出

        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $firstRow = $page->firstRow;    // 起始行数

        // 当该该标签下有文章时查询所有文章
        if($articletagid){
            $articlelisttag = $article->where($map)->limit($firstRow.','.$page->listRows)->relation(true)->order('lastmodifytime DESC')->select();
            // 每篇文章的所有已审核留言数量
            foreach($articlelisttag as $value){
                $articleid = $value['id'];                  
                $articlecommentnum1[] = $comment->where(array('articleid'=>$articleid,'status'=>1))->count();      
            }
            // 将所有已审核留言数量数组插入文章数组里
            foreach($articlecommentnum1 as $k2=>$v2){
                $articlelisttag[$k2]['commentcount1'][] = $v2;
            }
        }

        $this->assign('firstRow',$firstRow);
        $this->assign('articlelisttag',$articlelisttag);
        $this->assign('articletagnamestr',$articletagnamestr);
        $this->assign('page',$pageshow);
        $this->assign('tagres',$tagres);
        $this->assign('sortres',$sortres);

        $this->display();
        
    }


    /**
     * [search 搜索文章]
     * @return [type] [description]
     */
    public function search(){
        /*显示导航栏分类*/
        $sort = D('Sort');
        $sortres = $sort->select();
        /*显示右侧标签栏*/
        $tag = D('Tag');
        $tagres = $tag->select();

        $article = D('Article');
        $comment = D('Comment');

        $keywords = I('search-key');

        $keywordsarray = explode(' ', $keywords);   // 将搜索关键词转换为数组   

        $article = D('Article');

        foreach($keywordsarray as $k=>$v){
            $keywordsarray2[$k] = '%'.$v.'%';
        }
        $condition['title'] = array('like',$keywordsarray2,'AND');

        // 分页开始
        $count = $article->where($condition)->count(); //查询该标签下的记录总数
        // echo $count;exit();
        $page = new Page($count,10); // 实例化分页类 传入总记录数和每页显示的记录数(10)

        // 分页样式配置
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('theme','共%TOTAL_ROW%篇文章 有%TOTAL_PAGE%页 %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');

        $pageshow = $page->show(); // 分页显示输出

        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $firstRow = $page->firstRow;    // 起始行数
        $searchres = $article->where($condition)->limit($firstRow.','.$page->listRows)->relation(true)->order('lastmodifytime DESC')->select();

        /*将文章标题中包含关键字的文字全部加上关键字样式*/
        foreach($keywordsarray as $words){
            $words = trim($words);
            foreach($searchres as $key => $value){
                $searchres[$key]['title'] = str_ireplace($words, "<span class='searchkey-in-articletitle'>$words</span>", $value['title']);
            }
        }

        // 每篇文章的所有已审核留言数量
        foreach($searchres as $value){
            $articleid = $value['id'];                  
            $articlecommentnum1[] = $comment->where(array('articleid'=>$articleid,'status'=>1))->count();      
        }
        // 将所有已审核留言数量数组插入文章数组里
        foreach($articlecommentnum1 as $k2=>$v2){
            $searchres[$k2]['commentcount1'][] = $v2;
        }

        $this->assign('searchres',$searchres);
        $this->assign('count',$count);
        $this->assign('keywords',$keywords);
        $this->assign('page',$pageshow);
        $this->assign('sortres',$sortres);
        $this->assign('tagres',$tagres);


        $this->display();

    }
}