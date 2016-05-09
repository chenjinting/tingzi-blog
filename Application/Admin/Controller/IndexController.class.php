<?php
namespace Admin\Controller;
use Think\Controller;

class IndexController extends Controller {

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
    	$this->display();
    }

    // 加载right.html
    public function right(){
    	$this->display();
    }
}