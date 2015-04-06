<?php

namespace Home\Model;
use Think\Model;

class InfoTeacherModel extends Model{

	public function create(){
		$teacher_result = $this->getField('teacher_name');	
		return $teacher_result;	
	}
}