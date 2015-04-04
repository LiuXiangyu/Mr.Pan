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
			$login_result = $user->login($data);
			if ($login_result){
				$this->redirect(U("Home/Index/index"), "", 0);
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
			$data["user_email"] = I("user_email");

			$user = D("InfoUser");
			$register_result = $user->register($data);
			if ($register_result){
				$this->redirect(U("Home/Index/index"), "注册成功", 3);
			}
			else{
				$this->error($user->getError());
			}
		}
		else{
			$this->display();
		}
	}
}

?>