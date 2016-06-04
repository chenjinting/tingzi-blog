<?php
namespace Blog\Model;
use Think\Model\RelationModel;

/**
 * 对数据表Comment的模型操作
 */
class CommentModel extends RelationModel{

	/**
	 * [$_validate 用户留言时自动验证]
	 * @var array
	 */
	protected $_validate = array(
		array('commentauthor','require','请留下你的大名吧！'), // 用户昵称不为空
		array('commentcontent','require','您还没有填写留言内容呢！'), // 文章内容不为空
	);
	
}