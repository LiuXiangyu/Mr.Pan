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
		if (is_array($result) && $result){
			$college_id = explode("|", $result["school_college"]);
			foreach ($college_id as $key => $value) {
				$college_arr[$value] = getCollegeNameById($value);
			}
            $this->ajaxReturn($college_arr);
		}
		else{
			$this->error = "获取学院列df表失败";
			return false;
		}
	}
}
