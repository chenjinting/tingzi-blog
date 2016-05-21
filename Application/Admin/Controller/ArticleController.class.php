<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Upload;
use Think\Page;
/**
 * 文章管理
 */
class ArticleController extends BaseController {

    /**
     * [showlist 后台所有文章列表]
     * @return [type] [description]
     */
    public function showlist(){

        $article = D('Article');
        // $articleres = $article->relation(true)->select();
        
        // 分页开始
        $count = $article->count(); //查询满足要求的记录总数
        $page = new Page($count,9); // 实例化分页类 传入总记录数和每页显示的记录数(9)

        // 分页样式配置
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('theme','共%TOTAL_ROW%篇文章 有%TOTAL_PAGE%页 %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');

        $pageshow = $page->show(); // 分页显示输出

        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $firstRow = $page->firstRow;    // 起始行数

        // 所有文章
        $articlelist = $article->limit($firstRow.','.$page->listRows)->relation(true)->order('lastmodifytime DESC')->select();
        
        $this->assign('firstRow',$firstRow);
        $this->assign('articlelist',$articlelist);    // 赋值数据集
        $this->assign('page',$pageshow);    // 赋值分页输出

        $this->display();
    }


    /**
     * [showlistsort 后台某个分类文章列表]
     * @return [type] [description]
     */
    public function showlistsort(){
        $article = D('Article');
        $sortid = I('sortid');
        $condition['sortid'] = $sortid;

        // 分页开始
        $count = $article->where($condition)->count(); //查询该分类下的记录总数
        $page = new Page($count,9); // 实例化分页类 传入总记录数和每页显示的记录数(9)

        // 分页样式配置
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('theme','共%TOTAL_ROW%篇文章 有%TOTAL_PAGE%页 %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');

        $pageshow = $page->show(); // 分页显示输出

        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $firstRow = $page->firstRow;    // 起始行数

        // 该分类下所有文章
        $articlelistsort = $article->where($condition)->limit($firstRow.','.$page->listRows)->relation(true)->order('lastmodifytime DESC')->select();
        
        $this->assign('firstRow',$firstRow);
        $this->assign('articlelistsort',$articlelistsort);
        $this->assign('page',$pageshow);

        $this->display();

    }


    /**
     * [showlisttag 后台某个标签文章列表]
     * @return [type] [description]
     */
    public function showlisttag(){

        $articletag = D('Articletag');
        $article = D('Article');
        $tagid = I('tagid');
        $condition['tagid'] = $tagid;
        $articletagid = $articletag->where($condition)->getField('articleid',true); // 查询articletag表中该标签下的文章id数组（一维数组）

        $map['id'] = array('in',$articletagid); 

        // 分页开始
        $count = $articletag->where($condition)->count(); //查询该标签下的记录总数
        // echo $count;exit();
        $page = new Page($count,9); // 实例化分页类 传入总记录数和每页显示的记录数(9)

        // 分页样式配置
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('theme','共%TOTAL_ROW%篇文章 有%TOTAL_PAGE%页 %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');

        $pageshow = $page->show(); // 分页显示输出

        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $firstRow = $page->firstRow;    // 起始行数

        // 该标签下所有文章
        $articlelisttag = $article->where($map)->limit($firstRow.','.$page->listRows)->relation(true)->order('lastmodifytime DESC')->select();
        // print_r($articlelisttag);exit();
        
        $this->assign('firstRow',$firstRow);
        $this->assign('articlelisttag',$articlelisttag);
        $this->assign('page',$pageshow);

        $this->display();
        
    }

    
    /**
     * [addarticle 添加文章]
     * @return [type] [description]
     */
    public function addarticle(){

        if(IS_POST){           
            $data['title'] = I('title'); // 获取文章标题
            $data['author'] = I('author'); // 获取文章作者
            $data['sortid'] = I('sortid'); // 获取文章分类id
            $tagid = I('tagid'); // 获取文章标签id
            $data['content'] = I('content'); //获取文章详情内容
            $data['time'] = time(); //获取文章发布时间
            $data['lastmodifytime'] = time(); // 新增文章时设置文章最后编辑时间即为文章发布时间

            /* 图片上传 */
            if($_FILES['coverpic']['tmp_name'] != ''){
                $upload = new Upload();
                $upload->maxSize = 3145718; //设置附件上传大小
                $upload->exts = array('jpg','jpeg','png','gif','bmp'); //设置附件上传类型
                $upload->rootPath = './Uploads/';
                $upload->savePath = ''; //设置附件上传目录
                // 上传单个文件
                $info = $upload->uploadOne($_FILES['coverpic']);
                if(!$info){ // 上传错误提示信息
                    $this->error($upload->getError());
                }else{  //上传成功，获取上传文件信息
                    $data['coverpic'] = $info['savepath'].$info['savename'];
                }
            }

            $article = D('Article');
            $Articletag = D('Articletag');

            if($article->create($data)){
                $articleid = $article->relation(true)->add($data);

                if($articleid){

                    $tagidstr = implode(',', $tagid); //把接收到的tagid转换为字符串
                    $tagidone = explode(',', $tagidstr); //把tagid转换后的字符串再转换为一维数组

                    $data2['articleid'] = $articleid;

                    $data2['Articletag'] = array(
                        'articleid' => $data2['articleid'],
                        'tagid'     => $data2['tagid'], 
                    );

                    foreach($tagidone as $value){
                        $data2['tagid'] = $value;

                        if($Articletag->create($data2)){
                            $addresult = $Articletag->relation(true)->add($data2);                     
                        }else{
                            $this->error($Articletag->getError());
                        }

                    }

                    if($addresult){
                        $this->success('文章添加成功！',U('showlist'),1);
                    }else{
                        $this->error('文章添加失败！');
                    }
                    
                }
                    
            }else{
                $this->error($article->getError());
            }

            return;
        }

        /* 获取所有分类 */
        $sort = D('Sort');
        $sortres = $sort->select();
        $this->assign('sortres',$sortres);
        /* 获取所有标签 */
        $tag = D('Tag');
        $tagres = $tag->select();
        $this->assign('tagres',$tagres);

        $this->display();
    }


    /**
     * [modifyarticle 修改文章]
     * @return [type] [description]
     */
    public function modifyarticle(){

        $article = D('Article');

        if(IS_POST){
            $data['id'] = I('id');
            $data2['articleid'] = I('id');
            $data['title'] = I('title');
            $data['author'] = I('author');
            $data['sortid'] = I('sortid');
            // $tagidselected = I('tagidselected'); // 获取文章标签id
            $tagid = I('tagid'); // 获取文章标签id
            $data['content'] = I('content');
            $data['lastmodifytime'] = time(); // 文章最后编辑时间

            /* 图片修改上传 */
            if($_FILES['coverpic']['tmp_name'] != ''){
                $upload = new Upload();
                $upload->maxSize = 3145718; //设置附件上传大小
                $upload->exts = array('jpg','jpeg','png','gif','bmp'); //设置附件上传类型
                $upload->rootPath = './Uploads/';
                $upload->savePath = ''; //设置附件上传目录
                // 上传单个文件
                $info = $upload->uploadOne($_FILES['coverpic']);
                if(!$info){ // 上传错误提示信息
                    $this->error($upload->getError());
                }else{  //上传成功，获取上传文件信息
                    $data['coverpic'] = $info['savepath'].$info['savename'];
                }
            }

            $Articletag = D('Articletag');

            if($article->create($data)){
                $articlesave = $article->relation(true)->save($data);

                if($articlesave !== false){

                    $tagidstr = implode(',', $tagid); //把接收到的tagid转换为字符串

                    $tagidone = explode(',', $tagidstr); //把tagid转换后的字符串再转换为一维数组

                    $data2['articleid'] = I('id');

                    $data2['Articletag'] = array(
                        'articleid' => $data2['articleid'],
                        'tagid'     => $data2['tagid'], 
                    );

                    $deleteresult = $Articletag->relation(true)->where(array('articleid'=>$data2['articleid']))->delete();
                    foreach($tagidone as $value){
                        $data2['tagid'] = $value;

                        if($Articletag->create($data2)){
                            $addresult = $Articletag->relation(true)->add($data2);                    
                        }else{
                            $this->error($Articletag->getError());
                        }

                    }

                    // exit();

                    if($addresult !== false){
                        $this->success('文章修改成功！',U('showlist'),1);
                    }else{
                        $this->error('文章修改失败！');
                    }
                    
                }
                    
            }else{
                $this->error($article->getError());
            }

            // if($article->create($data)){
            //     if($article->save($data)){
            //         $this->success('文章修改成功！',U('showlist'),1);
            //     }else{
            //         $this->error('文章修改失败！');
            //     }
            // }else{
            //     $this->error($article->getError());
            // }

            return;
        }
              
        $articletag = D('Articletag');
        $articleid['articleid'] = I('id');

        $articletagid = $articletag->where($articleid)->getField('tagid',true); // 查询articletag表中该分类下的文章id数组（一维数组）
        // $map['id'] = array('in',$articletagid); 
        // $articletagidstr = implode(',', $articletagid); 

        $sort = D('Sort');
        $sortres = $sort->select();
        $tag = D('Tag');
        $tagres = $tag->select();
        // $tagresid = $tag->getField('tagid',true);
        // print_r($tagres);exit();

        $id = I('id');
        $articleres = $article->relation(true)->find($id);

        $this->assign('articleres',$articleres);
        $this->assign('sortres',$sortres);
        $this->assign('tagres',$tagres);
        // $this->assign('tagresid',$tagresid);
        $this->assign('articletagid',$articletagid);

        $this->display();
    }


    /**
     * [deletearticle 删除文章]
     * @return [type] [description]
     */
    public function deletearticle(){
        $articleid = I('id');
        $article = D('Article');
        if($article->relation(true)->delete($articleid)){
            $this->success("删除成功！",U('showlist'),1);
        }else{
            $this->error("删除失败！");
        }
    }

}