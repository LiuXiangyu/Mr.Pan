<?php
namespace Home\Model;
use Think\Model;

class InfoCommentModel extends Model{

	protected $_validate = array(
		array('user_id', 'require', "请先登录"),
		array('comment_time', 'require', '发表时间获取出错'),
		array('comment_content', 'require', '评论内容不能为空'),
		array('comment_content', '1,500', '评论内容不能超过500字数', self::EXISTS_VALIDATE, 'length'),

	);

	/*
	添加评论
	$param
		user_id
		course_id
		teacher_id
		school_id
		college_id
		comment_content
		comment_time
	*/
	public function addComment($data){
		if ($this->create($data)){
			if ($this->add($data))
				return true;
			else {
				$this->error = "发表失败";
				return false;
			}
		}
		else{
			return false;
		}
	}
	
}