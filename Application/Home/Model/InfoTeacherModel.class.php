<?php

namespace Home\Model;
use Think\Model;

class InfoTeacherModel extends Model{
	/*
	public function create(){
		$teacher_result = $this->getField('teacher_name');
		
		return $teacher_result;	
	}
	*/
	public function addTeacher($data){
		if ($this->create($data)){
			$this->add();
			return true;
		}
		else{
			return false;
		}
	}
}