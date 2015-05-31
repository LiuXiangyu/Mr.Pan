<?php
namespace Home\Model;
use Think\Model;

class InfoReportModel extends Model{
	protected $_validate = array(
		array('user_id', 'require', "用户ID必须提供"),
		array('comment_id', 'require', "评论ID必须提供"),
		array('comment_id','',"该评论已被举报过",self::EXISTS_VALIDATE,'unique'),
	);

	/*
	举报评论
		@param
			user_id
			comment_id
	*/
	public function addReport($data){
		if ($this->create($data)){
			if ($this->add($data))
				return true;
			else{
				$this->error = "举报失败";
				return false;
			}
		}
		else
			return false;
	}
}