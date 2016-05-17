<?php
namespace Admin\Model;
use Think\Model\RelationModel;
/**
 * 对数据表Article的模型操作
 */
class ArticleModel extends RelationModel{

	/**
	 * [$_validate 添加文章时自动验证]
	 * @var array
	 */
	protected $_validate = array(
		array('title','require','请填写一个文章标题！'), // 文章标题不为空
		array('title','','该文章已存在！',0,'unique',1), // 文章标题应唯一
		array('sortid','0','请选择一个文章分类！',0,'notequal',3), // 文章分类不为空
		array('coverpic','require','请上传一张文章封面！'), // 文章封面不为空
		array('content','require','您还没有填写文章内容！'), // 文章内容不为空
	);

	/**
	 * [$_link 分类表和文章表的一对多关联]
	 * @var array
	 */
	protected $_link = array(
		'sort_article' => array(
			'mapping_type' => self::BELONGS_TO,
			'class_name'   => 'Sort',
			'foreign_key'  => 'sortid',
			'as_fields'    => 'sortname',
		),
	);
	
}