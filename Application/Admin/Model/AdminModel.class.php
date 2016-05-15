<?php
namespace Admin\Model;
use Think\Model;
/**
 * 对数据表Admin的模型操作
 */
class AdminModel extends Model{
	
	public function checklogin($user, $password){
		$condition['username'] = $user;
		$condition['password'] = md5($password);
		$adminresult = $this->where($condition)->find();
		if($adminresult){
			session('admin',$user);
			return true;
		}else{
			return false;
		}
	}
}