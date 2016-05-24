<?php
namespace Admin\Model;
use Think\Model\RelationModel;
/**
 * 对数据表Comment的模型操作
 */
class CommentModel extends RelationModel{

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
	 * [$_link Comment表的关联模型]
	 * @var array
	 */
	protected $_link = array(
		/* 留言和文章的关联模型 */
		'article'                      =>  array(
			'mapping_type'          =>  self::BELONGS_TO,
			'class_name'            =>  'Article',
			'foreign_key'           =>  'articleid',
			'as_fields'             =>  'title',
		),
	);

}