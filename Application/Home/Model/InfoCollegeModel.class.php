<?php
namespace Home\Model;
use Think\Model;

class InfoCollegeModel extends Model{
	/*
	返回所有学院的ID和学院名称
	*/
	public function getAllCollege(){
		$data = $this->getField("college_id, college_name", true);
		return $data;
	}
}