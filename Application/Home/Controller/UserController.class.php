<?php

namespace Home\Controller;
use Think\Controller;

class UserController extends Controller{
	/*
		用户登录
		@param  POST
			user_email
			user_pwd
	*/
	public function login(){
		if (IS_POST){
			$data["user_email"] = I("user_email");
			$data["user_pwd"] = I("user_pwd");

			$user = D("InfoUser");
			$login_result = $user->login($data); //登录结果，成功为true，失败为false

			
			if ($login_result){
				$this->success("登录成功", U("Home/Index/index"), 2);
			}
			else{
				$this->error($user->getError());
			}
		}
		else{
			$this->display();
        }
	}

	/*
		用户登出
	*/
	public function logout(){
		$user = D("InfoUser");
		$user->logout();
	}

	/*
		用户注册
		@param  POST
			user_name
			user_email
			user_pwd
	*/
	public function register(){
		if (IS_POST){
			$data["user_name"] = I("user_name");
			$data["user_pwd"] = I("user_pwd");
			$data["user_repwd"] = I("user_repwd");
			$data["user_email"] = I("user_email");
			$data["school_id"] = 0;//default = 0
			$data["college_id"] = 0;

			$user = D("InfoUser");
			$register_result = $user->register($data); //注册结果，成功为true，失败为false
			if ($register_result){
				$this->success("注册成功", U("Home/Index/index"),3);
			}
			else{
				$this->error($user->getError());

			}
		}
	}

	/*
		添加评论
	*/
	public function addComment(){
		if (IS_POST){
			if (isLogin()){
				$data['course_id'] = I("course_id");
				$data['teacger_id'] = I("teacher_id");
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

?>
