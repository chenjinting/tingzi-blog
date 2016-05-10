<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        echo "sdjfsoifj";
        var_dump(D('admin')->select());
    }
}