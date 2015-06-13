<?php

namespace Home\Controller;
use Think\Controller;

class CommentController extends Controller{
	
	/*
		查看自己的所有评论
	*/
	public function manageComment(){
		if (isLogin()) { //判断是否登录
			
			$user_id = $_SESSION['user_id']; //获取自己的user_id
			$comment = M("InfoComment");
			
			$data = $comment->where("user_id='$user_id'")->select();

			foreach($data as $key => &$value){
				$value['teacher'] = getTeacherNameById($value['teacher_id']);
				$value['school'] = getSchoolNameById($value['school_id']);
				$value['college'] = getCollegeNameById($value["college_id"]);
				$value['username'] = getUserNameById($value['user_id']);
				$value['course'] = getCourseNameById($value['course_id']);
			}
			//dump($data);
			$this->assign("comment", $data);
			$this->display();
		}
		else{
			$this->error("请先登录", U("User/login"),3);
		}
	}

	/*
		查看关注者的所有评论
	*/
	public function followComment(){
		if (isLogin()) { //判断是否登录
			
			$user_id = I('user_id'); //获取自己的user_id
			$comment = M("InfoComment");
			
			$data = $comment->where("user_id='$user_id'")->select();
			foreach($data as $key => &$value){
				$value['teacher'] = getTeacherNameById($value['teacher_id']);
				$value['school'] = getSchoolNameById($value['school_id']);
				$value['college'] = getCollegeNameById($value["college_id"]);
				$value['username'] = getUserNameById($value['user_id']);
				$value['course'] = getCourseNameById($value['course_id']);
			}
			//dump($data);
			$this->assign("comment", $data);
			$this->display();
		}
		else{
			$this->error("请先登录", U("User/login"),3);
		}
	}

	/*
		删除一条评论
		$param
			comment_id
	*/
	public function deleteComment(){
		if (isLogin()){
			$comment_id = I("comment_id");
			$comment = M("InfoComment");

			if ($comment->where("comment_id='$comment_id'")->delete()) {
				$this->success("删除成功");
			}
			else{
				$this->error("删除失败");
			}
		}
		else{
			$this->error("请先登录", U("User/login"));
		}
	}

	/*
	举报评论
	@param
		comment_id
		user_id
	*/
	public function report(){
		if (isLogin()){
			$data['user_id'] = I("user_id");
			$data['comment_id'] = I("comment_id");
			
			$report = D("InfoReport");
			$result = $report->addReport($data);
			$this->redirect("Home/Index/index");
		}
		else
			$this->error("请先登录", U("User/login"));
	}
}