<?php
namespace Admin\Model;
use Think\Model;
/**
 * 对数据表Sort的模型操作
 */
class SortModel extends Model{
	/**
	 * [$_validate 添加分类时自动验证]
	 * @var array
	 */
	protected $_validate = array(
		array('sortname','require','请添加一个分类名称'), // 分类名称不为空
		array('sortname','','已有该分类，请勿重复添加！',0,'unique',1), // 分类名称应唯一
	);
}