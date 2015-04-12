<?php

namespace Home\Model;
use Think\Model;

class InfoTeacherModel extends Model{

	//老师模型自动验证
	protected $_validate = array(
		/*  验证老师名字 */
		array('teacher_name', 'require', "用户名必须提供"),
		array('teacher_name','1,20',"用户名长度必须为4到20个字符",self::EXISTS_VALIDATE,'length'),

	);

	/*
	public function create(){
		$teacher_result = $this->getField('teacher_name');
		
		return $teacher_result;	
	}
	*/

	/*
	向数据库中插入一个新的老师
	@param
		teacher_name
		school_id  学校ID
		college_id  学院ID
		teacher_course  该教师所教课程
	*/
	public function addTeacher($data){
		if ($this->create($data)){
			if ($this->add()){
				return true;
			}
			else{
				$this->error = "添加老师失败";
				return false;
			}
		}
		else{
			return false;
		}
	}
}