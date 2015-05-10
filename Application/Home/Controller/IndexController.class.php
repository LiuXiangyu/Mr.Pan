<?php
namespace Home\Controller;
use Think\Controller;

class IndexController extends Controller {
	/*
		读取前三天的所有评论
	*/
    public function index(){
   
		$this->display();
    }

    public function getComment(){
    	$date = date("Y-m-d H:i:s", strtotime("-3 year")); //前三天时间
		$comment = M("InfoComment");

		$comment_data = $comment->where("comment_time>='$date'")->limit(30)->select(); //读取前三天的30条评论

		foreach($comment_data as $key => &$value){
			$value['school_id'] = getSchoolIdByTeacherId($value['teacher_id']);
			$value['teacher_name'] = getTeacherNameById($value['teacher_id']);
			$value['school_name'] = getSchoolNameById($value['school_id']);
			$value['user_name'] = getUserNameById($value['user_id']);
			$value['course_name'] = getCourseNameById($value['course_id']);
		}
		$this->ajaxReturn($comment_data);
    }
}