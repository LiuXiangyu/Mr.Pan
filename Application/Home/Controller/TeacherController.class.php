<?php

namespace Home\Controller;
use Think\Controller;

class TeacherController extends Controller{
	/*
		增加老师
		@param POST
			teacher_name
			school_id  学校ID
			college_id  学院ID
	*/
	

	public function addTeacher(){	
		$school = D("InfoSchool");
		$school_name = $school->getSchool();
		if ($school_name) {
			$this->assign("school", $school_name);
		}
		else {
			$this->error($school->getError());
		}
		//$this->display();
		if (IS_GET){
			$school_id = I("school_id");
			$college_arr = $school->getCollege($school_id);
			echo json_encode($college_arr);
		}

		
		if (IS_POST){
			$data["teacher_name"] = I("teacher_name");
			$data["school_id"] = I("school");
			$data["college_id"] = I("college");
			$data["teacher_course"] = "|";

			$teacher = D("InfoTeacher");
			$create_result = $teacher->addTeacher($data);

			if ($create_result){
				$this->success("创建成功", U("Home/Index/index"), 2);
			}
			else{
				$this->error($teacher->getError());
			}
		}
		else{
			$this->display();
		}
	}
}
?>