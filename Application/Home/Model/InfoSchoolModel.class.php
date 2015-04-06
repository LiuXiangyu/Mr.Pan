<?php

namespace Home\Model;
use Think\Model;

class InfoSchoolModel extends Model{

	public function create(){
		$school_result = $this->getField('school_id,school_name', true);
		if(!empty($school_result)&&$school_result) {
			return $school_result;
		}
		else {
			$this->error = "获取学校列表失败";
			return false;
		}
		
	}
}