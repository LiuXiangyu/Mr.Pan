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
		$college_arr = array();
		echo $school_id;
		dump($result);
		foreach ($college_id as $key => $value) {
			echo $value;
			//$college_arr[$value] = getCollegeNameById($value);
		}
        return $college_arr;
	}
}
