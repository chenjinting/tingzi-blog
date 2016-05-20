<?php
namespace Admin\Model;
use Think\Model\RelationModel;
/**
 * 对数据表Sort的模型操作
 */
class TagModel extends RelationModel{
	
	/**
	 * [$_validate 添加标签时自动验证]
	 * @var array
	 */
	protected $_validate = array(
		array('tagname','require','请添加一个标签名称'), // 标签名称不为空
		array('tagname','','已有该标签，请勿重复添加！',0,'unique',1), // 标签名称应唯一
	);

}