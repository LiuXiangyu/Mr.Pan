<?php

namespace Home\Controller;
use Think\Controller;

class CommentController extends Controller{
	/*
		添加评论
		$param
			course_id
			teacher_id
			school_id
			college_id
			comment_content
	*/
	public function addComment(){
		if (IS_POST){
			if (isLogin()){ //判断是否登录
				$data['course_id'] = I("course_id");
				$data['teacher_id'] = I("teacher_id");
				$data['school_id'] = I("school_id");
				$data['college_id'] = I("college_id");
				$data['user_id'] = $_SESSION['user_id'];
				$data['comment_content'] = I("comment_content");
				$data['comment_time'] = date('Y-m-d H:i:s');

				$comment = D("InfoComment");
				$result = $comment->addComment($data);
				if ($result){
					$this->success("发表成功", U("Index/index"), 3);
				}
				else{
					$this->error($comment->getError());
				}

			}
			else{
				$this->error("请登录", U('User/login'));
			}

		}
	}

	/*
		查看自己的所有评论
	*/
	public function manageComment(){
		if (isLogin()) { //判断是否登录
			$user_id = $_SESSION['user_id']; //获取自己的user_id
			$comment = M("InfoComment");

			$data = $comment->where("user_id='$user_id'")->select();
			foreach($data as $key => &$value){
				$value['teacher_name'] = getTeacherNameById($value['teacher_id']);
				$value['school_name'] = getSchoolNameById($value['school_id']);
				$value['user_name'] = getUserNameById($value['user_id']);
				$value['course_name'] = getCourseNameById($value['course_id']);
			}
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
}