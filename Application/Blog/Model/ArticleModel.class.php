<?php
namespace Blog\Model;
use Think\Model\RelationModel;
/**
 * 对数据表Article的模型操作
 */
class ArticleModel extends RelationModel{

	/**
	 * [$_link Article表的关联模型]
	 * @var array
	 */
	protected $_link = array(

		/* 文章和分类的关联模型 */
		'sort_article' => array(
			'mapping_type' => self::BELONGS_TO,
			'class_name'   => 'Sort',
			'foreign_key'  => 'sortid',
			'as_fields'    => 'sortname',
		),

		/* 文章和标签的关联模型 */
		'tag'                       =>  array(
			'mapping_type'          =>  self::MANY_TO_MANY,
			'relation_table'        =>  'cjt_articletag',
			'foreign_key'           =>  'articleid',
			'relation_foreign_key'  =>  'tagid',
		),
	);
	
}