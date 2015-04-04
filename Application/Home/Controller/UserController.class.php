<?php

namespace Home\Controller;
use Think\Controller;

class UserController extends Controller{
	public function login(){
		if (IS_POST){
			$data["user_name"] = I("user_name");
			$data["user_pwd"] = I("user_pwd");

			$user = D("User");
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
}