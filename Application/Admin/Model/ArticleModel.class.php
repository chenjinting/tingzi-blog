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
		array('abstract','require','请填写文章摘要！'), // 文章摘要不为空
		array('content','require','您还没有填写文章内容！'), // 文章内容不为空
	);

	/**
	 * [$_link Article表的关联模型]
	 * @var array
	 */
	protected $_link = array(
		/* 文章和分类的关联模型 */
		'sort'                      =>  array(
			'mapping_type'          =>  self::BELONGS_TO,
			'class_name'            =>  'Sort',
			'foreign_key'           =>  'sortid',
			'as_fields'             =>  'sortname',
		),

		/* 文章和标签的关联模型 */
		'tag'                       =>  array(
			'mapping_type'          =>  self::MANY_TO_MANY,
			'relation_table'        =>  'cjt_articletag',
			'foreign_key'           =>  'articleid',
			'relation_foreign_key'  =>  'tagid',
		),

		/* 文章和留言的关联模型 */
		'comment'                       =>  array(
			'mapping_type'          =>  self::HAS_MANY,
			'class_name'			=>  'Comment',
			'foreign_key'           =>  'articleid',
		),

	);
	
}