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
		if (isLogin()) { //判断是否登录
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
			} else if (IS_AJAX) {
				$school = D("InfoSchool");
				$school_id = I("school_id"); //通过选择的学校返回学校的所有学院名称
				$all_college = $school->getCollege(intval($school_id));
				$json = json_encode($all_college);
				$this->ajaxReturn($json);
				$this->display();
			}
			else{
				$school = D("InfoSchool"); //连接学校信息表，以获取全部学校名称
				$all_school = $school->getSchool(); //在Model中的定义，得到所有学校的ID和名称
				$this->assign("school", $all_school); //传给view
				$this->display();
			}
		}
		else{
			$this->error("请先登录", U("User/login"));
		}
	}


	
}
?>
