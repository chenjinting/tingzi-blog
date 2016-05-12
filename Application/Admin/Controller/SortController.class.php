<?php
namespace Admin\Controller;
use Think\Controller;

class SortController extends Controller {

    // 加载分类列表页面
    public function showlist(){
        $this->display();
    }

    // 加载添加分类页面
    public function addsort(){
        $this->display();
    }  

    // 加载修改分类页面
    public function modifysort(){
        $this->display();
    }

}