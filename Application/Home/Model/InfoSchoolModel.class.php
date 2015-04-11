<?php

namespace Home\Model;
use Think\Model;

class InfoSchoolModel extends Model{
	/*
		获取学校列表
	*/
	public function getSchool(){
		$school_result = $this->getField('school_id,school_name', true);
		if(is_array($school_result)) {
			return $school_result;
		}
		else {
			$this->error = "获取学校列表dfs失败";
			return false;
		}		
	}

	/*
		获取学校所有学院
	*/
	public function getCollege($school_id){
		$result = $this->where("school_id='$school_id'")->find();
		$college_id = explode("|", $result["school_college"]);
		$college_name = array();
		foreach($college_id as $id){
			$name = getCollegeNameById($id);
			array_push($college_name, $name);
		}
		dump($college_name);
        return $college_name;
	}
}
