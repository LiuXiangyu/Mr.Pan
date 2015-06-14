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

	/*
	通过学校的id和学院的id查找并返回该学校学院所有老师的id和名字
	@param
		school_id  学校ID
		college_id  学院ID
	*/

	public function getTeacher($school_id, $college_id) {
		$redis = new \Redis();
		$redis->connect('localhost','6379');
		//$teacherIds = $redis->keys(strval($school_id).':'.strval($college_id));

		$isCached = false;

		if($redis->hexists(strval($school_id).':'.strval($college_id),'0') != "") {
			$isCached = true;
		}

		if($isCached) {
			$temps = $redis->hgetall(strval($school_id).':'.strval($college_id));
			$result = array();
			foreach ($temps as $key => $id) {
				$temp2['teacher_id'] = $id;
				array_push($result, $temp2);
			}
			
            /*$file = fopen('result.txt', 'w');
		    foreach ($result as $key => $value) {
		    	foreach($value as $n => $id) {
              		fwrite($file, $key.' '.$n.' '.$id);
              	}
		    }
			fclose($file);*/

		} else {
			$result = $this->where("school_id='$school_id' AND college_id='$college_id'")->field('teacher_id')->select();
			$teachersIds = array();
			foreach($result as $m => $record){
				foreach($record as $n => $id) {
					array_push($teachersIds,$id);
				}
			}
			$redis->hmset(strval($school_id).':'.strval($college_id),$teachersIds);
		}


		if(is_array($result)) {
			$teachers = array();
			foreach($result as $m => $record){
				foreach($record as $n => $id) {
					$name = getTeacherNameById($id); //根据教师ID得到教师名
					$tmp["teacher_id"] = $id;
					$tmp["teacher_name"] = $name;
					array_push($teachers, $tmp);
				}
			}
			return $teachers;	
		}
		else {
			$this->error = "获取教师列表失败";
			return false;
		}		
	}

	public function getCourse($school_id, $college_id, $teacher_id) {
		$redis = new \Redis();
		$redis->connect('localhost','6379');

		$isCached = false;

		if($redis->hexists(strval($school_id).':'.strval($college_id).':'.strval($teacher_id),'0') != "") {
			$isCached = true;
		}

		if($isCached) {
			$result = $redis->hgetall(strval($school_id).':'.strval($college_id).':'.strval($teacher_id));
		} else {
			$result = $this->where("school_id='$school_id' AND college_id='$college_id' AND teacher_id='$teacher_id'")->find();
			//$redis->set("inf",$result);
			/*$file = fopen('result.txt', 'w');
		    foreach ($result as $key => $value) {
		    	foreach($value as $n => $id) {
              		fwrite($file, $key.' '.$n.' '.$id);
              	}
              	fwrite($file, $key.' '.$value.'#');
		    }
			fclose($file);*/
			$redis->hmset(strval($school_id).':'.strval($college_id).':'.strval($teacher_id),array(
				'teacher_id' => $result['teacher_id'],
				'teacher_name' => $result['teacher_name'],
				'school_id' => $result['school_id'],
				'college_id' => $result['college_id'],
				'teacher_course' => $result['teacher_course']
				));
		}

		if(is_array($result)) {
			$courses = array();
			$course_id = explode("|", $result['teacher_course']);
			foreach($course_id as $m => $id) {
				$name = getCourseNameById($id); //根据教师ID得到教师名
				$tmp["course_id"] = $id;
				$tmp["course_name"] = $name;
				array_push($courses, $tmp);
			}
			return $courses;	
		}
		else {
			$this->error = "获取课程列表失败";
			return false;
		}
	}
}


