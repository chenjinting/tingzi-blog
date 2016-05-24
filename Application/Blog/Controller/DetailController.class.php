<?php
namespace Blog\Controller;
use Think\Controller;

/**
 * 文章详情页
 */
class DetailController extends Controller {

    /**
     * [index 文章内容页和评论内容展示]
     * @return [type] [description]
     */
    public function index(){

        $sort = D('Sort');
        $sortres = $sort->select();

        $tag = D('Tag');
        $tagres = $tag->select();

        $readnum = D('Article');
        
        $article = D('Article');
        $articleid = I('id');

        $readres = $readnum->where(array('id'=>$articleid))->setInc('readnum',1); // 用户浏览一次文章，即更新数据库readnum字段，使其加1

        // 加载评论
        $comment = D('Comment');
        $commentlist = $comment->where(array('articleid'=>$articleid))->order('commenttime DESC')->select();

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
        $this->assign('commentlist',$commentlist);

        $this->display('detail');
    }

    /**
     * [addcomment 添加评论内容]
     * @return [type] [description]
     */
    public function addcomment(){

        if(IS_POST){

            $data['commentauthor'] = I('commentauthor');
            $personsiteurl = I('personsite');
            $data['personsite'] = $personsiteurl;
            $data['commentcontent'] = I('commentcontent');
            $data['articleid'] = I('articleid'); // 留言所属文章id
            $data['commenttime'] = time();

            $personsiteis = strstr($personsiteurl, "http://"); // 判断个人站点的URL中是否包含“http://”

            if(!$personsiteis){
                $data['personsite'] = 'http://'.$personsiteurl;
            }

            $comment = D('Comment');

            if($comment->create($data)){
                if($comment->add($data)){
                    $this->success("留言提交成功，等待审核！",U("index/",array('id'=>$data['articleid'])),1);
                }else{
                    $this->error("留言失败，请重新留言！");
                }
            }else{
                $this->error($comment->getError());
            }
            
            // return;
        }
                
        // $this->display();
        

    }

}