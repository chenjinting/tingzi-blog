<?php
namespace Admin\Controller;
use Think\Controller;

/**
 * 后台主界面
 */
class IndexController extends BaseController {

	// 加载后台管理首页index.html
    public function index(){
        $this->display();
    } 

    // 加载head.html
    public function head(){
    	$this->display();
    }

    // 加载left.html
    public function left(){

        /* 显示待审核留言数量 */
        $comment = D('Comment');

        $newcommentnum = $comment->where(array('status'=>0))->count();
        $this->assign('newcommentnum',$newcommentnum);

    	$this->display();
    }

    // 加载right.html
    public function right(){
    	$this->display();
    }
}