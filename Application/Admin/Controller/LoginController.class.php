<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Verify;

/**
 * 后台登录、退出
 */
class LoginController extends Controller {

    /**
     * [login 登录验证]
     * @return [type] [description]
     */
    public function login(){

        if(IS_POST){
            $user = I('user');
            $password = I('password');
            $captcha = I('captcha');

            $verify = new Verify();
            /* 先检查验证码是否错误，有错误则提示重新验证，没有错误则继续验证表单其他内容 */
            if(!$verify->check($captcha)){
                $this->error('验证码有误，请重新验证！');
                return;
            }

            $admin = D('Admin');
            /* 再来检查用户名和密码是否正确 */
            $checklogin = $admin->checklogin($user,$password);
            if($checklogin){
                $this->success('登录成功！正在登录...',U('Index/index'),1);
            }else{
                $this->error('用户名或密码错误，请重新输入！');
            }

            return;
        }

        $this->display();
    }

    /**
     * [logout 退出]
     * @return [type] [description]
     */
    public function logout(){
        session(null);
        $this->success('退出成功！',U('Login/login'),1);
    }

    /**
     * [loginverify 验证码]
     * @return [type] [description]
     */
    public function loginverify(){
        /* 验证码参数设置 */
        $config = array(
            'fontSize' => 30,
            'length'   => 4,
            'useNoise' => true,
        );

        $verify = new Verify($config);
        $verify->entry();
    }
    

}