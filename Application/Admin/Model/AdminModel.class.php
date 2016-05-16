<?php
namespace Admin\Model;
use Think\Model;
/**
 * 对数据表Admin的模型操作
 */
class AdminModel extends Model{

	/**
	 * [$_validate 修改管理员信息时自动验证]
	 * @var array
	 */
	protected $_validate = array(
		array('username','require','请添加一个管理员帐号！'), // 管理员帐号不为空
		array('password','d41d8cd98f00b204e9800998ecf8427e','请输入管理员密码！',0,'notequal'), // 管理员密码不为空
		array('username','','已存在该管理员，请勿重复！',0,'unique',1), // 管理员帐号应唯一
	);
	
	/**
	 * [checklogin 登录验证帐号密码]
	 * @param  [type] $user     [用户名]
	 * @param  [type] $password [密码]
	 * @return [type]           [description]
	 */
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