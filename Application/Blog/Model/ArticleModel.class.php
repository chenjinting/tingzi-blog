<?php
namespace Blog\Model;
use Think\Model\RelationModel;
/**
 * 对数据表Article的模型操作
 */
class ArticleModel extends RelationModel{

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