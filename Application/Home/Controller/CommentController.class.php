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
			if (isLogin()){
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
		else{
			$this->display();
		}
	}
}