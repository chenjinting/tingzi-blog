<?php
namespace Admin\Controller;
use Think\Controller;

class BaseController extends Controller {


    public function __construct(){
        parent::__construct();  //必须调用父类的构造方法
        $this->checklogin();
    }

    /**
     * [checklogin 检测是否登录]
     * @return [type] [description]
     */
    public function checklogin(){
        if(!$_SESSION['admin']){    //未登录状态
            $this->error('请先登录！',U('Login/login'),1);  
        }else{
            $sessionname = session('admin');    // 获取登录session的用户名
            $this->assign('admin',$sessionname);    // 传入用户名变量，在进入后台后显示登录帐户名
        }
    }
    

}