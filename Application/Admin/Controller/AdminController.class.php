<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Page;

/**
 * 管理员管理
 */
class AdminController extends BaseController {

    /**
     * [showlist 管理员列表]
     * @return [type] [description]
     */
    public function showlist(){
        $admin = D('Admin');
        $adminres = $admin->select();
        // 分页开始
        $count = $admin->count(); //查询满足要求的记录总数
        $page = new Page($count,30); // 实例化分页类 传入总记录数和每页显示的记录数(30)

        // 分页样式配置
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('theme','共%TOTAL_PAGE%页 %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');

        $pageshow = $page->show(); // 分页显示输出

        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $firstRow = $page->firstRow;    // 起始行数
        $adminlist = $admin->limit($firstRow.','.$page->listRows)->select();
        $this->assign('firstRow',$firstRow);
        $this->assign('adminlist',$adminlist);    // 赋值数据集
        $this->assign('page',$pageshow);    // 赋值分页输出
        $this->display();
    }


    /**
     * [addsort 添加管理员]
     * @return [type] [description]
     */
    public function addadmin(){
        if(IS_POST){
            $data['username'] = I('adminname');  // 获取帐号添加输入框的值
            $data['password'] = md5(I('admipassword'));  // 获取密码输入框的值

            $admin = D('Admin');
            if($admin->create($data)){
                if($admin->add($data)){
                    $this->success("成功新增一个管理员！",U('showlist'),1);
                }else{
                    $this->error("新增管理员失败，请重新添加！");
                }
            }else{
                $this->error($admin->getError());
            }
            
            return;
        }
                
        $this->display();
    }  

    /**
     * [modifysort 修改管理员信息]
     * @return [type] [description]
     */
    public function editadmin(){
        /* 修改提交 */
        if(IS_POST){
            $data['id'] = I('adminid');
            $data['username'] = I('adminname');
            $data['password'] = md5(I('password'));

            $admin = D('Admin');
            if($admin->create($data)){
                if($admin->save($data)){
                    $this->success("成功修改管理员信息！",U('showlist'),1);
                }else{
                    $this->error("修改管理员信息失败，请重新操作！");
                }
            }else{
                $this->error($admin->getError());
            }

            return;
        }

        /* 获取管理员帐号密码显示在修改界面输入框 */
        $adminid = I('id');
        $admin = D('Admin');
        $username = $admin->where("id=$adminid")->getField('username');
        $password = $admin->where("id=$adminid")->getField('password');
        $this->assign('username',$username);
        $this->assign('password',$password);
        $this->assign('adminid',$adminid);
        $this->display();
    }

    /**
     * [deletesort 删除管理员]
     * @return [type] [description]
     */
    public function deleteadmin(){
        $adminid = I('id');
        $admin = D('Admin');
        if($admin->delete($adminid)){
            $this->success("删除成功！",U('showlist'),1);
        }else{
            $this->error("删除失败！");
        }
    }

}