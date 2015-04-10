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
	
	public function addTeacher(){	
		$school = D("InfoSchool");
		$school_name = $school->getSchool();
		if ($school_name !== false) {
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
	*/

	/*
		增加老师
		@param POST
			teacher_name
			school_id  学校ID
			college_id  学院ID
	*/
	public function addTeacher(){
		if (IS_POST){
			$data["teacher_name"] = I("teacher_name");
			$data["school_id"] = I("school_id");
			$data["college_id"] = I("college_id"); 
			$data["teacher_course"] = I("teacher_course");

			$teacher = D("InfoTeacher");
			$add_result = $teacher->addTeacher($data); //把新纪录插入数据库

			if ($add_result){ //判断插入是否成功
				$this->success("创建成功");
			}
			else{
				$this->error($teacher->getError());
			}
		}
		else{
			$school = D("InfoSchool");
			$all_school = $school->getSchool(); //得到所有学校的ID和名称

			$college = D("InfoCollege");
			$all_college = $college->getAllCollege();  //得到所有学院的ID和名称
			
			$this->assign("school", $all_school);
			$this->assign("college", $all_college);
			$this->display();
		}
	}
}


?>