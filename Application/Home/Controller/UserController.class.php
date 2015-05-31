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
		$this->success("注销成功", U("Home/Index/index"));
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

	public function showInfo(){
		if (isLogin()){
			$user_id = $_SESSION["user_id"];
			$user = M("InfoUser");
			$data = $user->where("user_id='$user_id'")->find();
			//dump($data);
			$this->assign("userdata", $data);
			$this->display();
		}
		else{
			$this->error("请先登录", U("User/login"));
		}
	}

	public function updateInfo(){
		if (isLogin()){
			$user = D("InfoUser");
			$user_id = $_SESSION['user_id'];
			$userdata = $user->where("user_id='$user_id'")->find();
			$this->assign("userdata", $userdata);
			if (IS_POST){
				$data["user_id"] = $_SESSION['user_id'];
				$data["user_name"] = I("user_name");
				$data["user_pwd"] = I("user_pwd");
				$data["user_email"] = I("user_email");

				
				$result = $user->updateInfo($data);

				if ($result){
					$this->success("修改成功", U("User/showInfo"));
				}
				else{
					$this->error($user->getError());
				}
			}
			else{
				$this->display();
			}
		}
		else{
			$this->error("请先登录", U("User/login"));
		}
	}

	public function follow(){
		if (isLogin()){
			$data['follow_id'] = I("user_id");
			$data['user_id'] = $_SESSION['user_id'];
			$follow_id = $data["follow_id"];
			$user_id = $data["user_id"];
			$follow = D("InfoFollow");
			$hasFollow = $follow->where("user_id='$user_id' and follow_id='$follow_id'")->select();
			
			if (count($hasFollow) == 0 and $follow_id != $user_id){
				$result = $follow->add($data);
			}
			$this->redirect("Home/Index/index");
		}
		else{
			$this->error("请先登录", U("User/login"));
		}
	}

	public function followList(){
		if (isLogin()){
			$user_id = $_SESSION["user_id"];
			$follow = M("InfoFollow");
			$followlist = $follow->where("user_id='$user_id'")->select();
			$user = M("InfoUser");

			foreach($followlist as $key => &$value){
				$value["username"] = getUserNameById($value['follow_id']);
				$follow_id = $value["follow_id"];
				$data = $user->where("user_id='$follow_id'")->find();
				$value["schoolname"] = getSchoolNameById($data["school_id"]);
				$value["collegename"] = getCollegeNameById($data['college_id']);
				$value["user_email"] = $data["user_email"];
			}
			$this->assign("data", $followlist);

			$this->display();
		}
		else{
			$this->error("请先登录", U("User/login"));
		}
	}
}

?>
