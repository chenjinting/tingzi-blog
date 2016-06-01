<?php
namespace Admin\Controller;
use Think\Controller;

/**
 * 登录检测，基于登录状态的所有控制器均继承于该控制器
 */
class BaseController extends Controller {


    public function __construct(){
        parent::__construct();  //必须调用父类的构造方法
        $this->checklogin_status();

    }

    /**
     * [checklogin 检测是否登录]
     * @return [type] [description]
     */
    public function checklogin_status(){
        if(!$_SESSION['admin']){    //未登录状态
            $this->error('请先登录！',U('Login/login'),1);  
        }else{
            $sessionname = session('admin');    // 获取登录session的用户名
            $this->assign('admin',$sessionname);    // 传入用户名变量，在进入后台后显示登录帐户名

            /* 加载左侧导航栏待审核留言数量 */
            $comment = D('Comment');
            $commentnum = $comment->count();    // 总留言数量
            $newcommentnum = $comment->where(array('status'=>0))->count();  // 待审核留言数量
            $this->assign('newcommentnum',$newcommentnum);
        }
    }
    

}