<?php
namespace Admin\Model;
use Think\Model\RelationModel;
/**
 * 对数据表Comment的模型操作
 */
class CommentModel extends RelationModel{
	
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