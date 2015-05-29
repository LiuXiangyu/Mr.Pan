<?php
namespace Home\Controller;
use Think\Controller;

class IndexController extends Controller {
	
    public function index__(){
		$this->display();
    }

    /*
		读取前三天的所有评论
	*/
    public function showRecentComment($date){
    	$date = date("Y-m-d H:i:s", strtotime("-3 day")); //前三天时间
		$comment = D("InfoComment");
		$comment_data = $comment->getRecentComment($date);
		$this->assign('comment', $comment_data);
    }

    public function index(){
		if (isLogin()) { //判断是否登录
			$this->showRecentComment();
			if (IS_POST){

				$this->success("创建成功");

				$data["school_id"] = I("school_id");
				$data["college_id"] = I("college_id"); 
				$data["teacher_id"] = I("teacher_id");
				$data["course_id"] = I("course_id");
				$data["user_id"] = I("liu");
				//$teacher = D("InfoTeacher");
				//$add_result = $teacher->addTeacher($data); //把新纪录插入数据库

				if ($add_result){ //判断插入是否成功
					$this->success("创建成功");
				}
				else{
					$this->error($teacher->getError());
				}
			} else if (IS_AJAX) {
				if (I("action") == 'a') {
					$school = D("InfoSchool");
					$school_id = I("school_id"); //通过选择的学校返回学校的所有学院名称
					$all_college = $school->getCollege($school_id);
					$json = json_encode($all_college);
					$this->ajaxReturn($json);	
				}
				else if (I("action") == 'b'){
					$school_id = I("school_id");					
					$college_id = I("college_id");
					$teacher = D("InfoTeacher");
					$all_teacher = $teacher->getTeacher($school_id, $college_id);
					$json = json_encode($all_teacher);
					$this->ajaxReturn($json);	
				} else if (I("action") == 'c') {
					$school_id = I("school_id");
					$college_id = I("college_id");
					$teacher_id = I("teacher_id");
					$teacher = D("InfoTeacher");
					$all_course = $teacher->getCourse($school_id, $college_id, $teacher_id);
					$json = json_encode($all_course);
					$this->ajaxReturn($json);
				}
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








