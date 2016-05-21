<?php
namespace Admin\Model;
use Think\Model\RelationModel;
/**
 * 对数据表Sort的模型操作
 */
class ArticletagModel extends RelationModel{
	
	/**
	 * [$_validate 添加与修改文章时自动验证是否含有标签]
	 * @var array
	 */
	protected $_validate = array(
		array('tagid','require','请选择一个文章标签！'), // 文章标签不为空
	);

}