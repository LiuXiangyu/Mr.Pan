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

			$user_level = $_SESSION["user_level"];

			if ($login_result){
				if ($user_level == 1)
					$this->success("登录成功", U("Home/Index/index"), 2);
				else if ($user_level == 2)
					$this->success("登录成功", U("Admin/Admin/manageUser"), 2);
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

			$rule  = "/^([a-zA-Z0-9_-])+@(mail2.sysu.edu.cn)$/"; 
			$result = 1; 
        	$result = preg_match($rule, $data["user_email"] );

        	if ($result){

				$user = D("InfoUser");
				$register_result = $user->register($data); //注册结果，成功为true，失败为false
				if ($register_result){
					$this->success("注册成功，请在24小时内前往您的邮箱激活账户", U("Home/Index/index"),3);
				}
				else{
					$this->error($user->getError());

				}
			}
			else{
				$this->error("注册失败，只能使用中山大学邮箱进行注册!");
			}
		}	
	}

	public function active(){
		if (IS_GET){
			$verify_code = I("verify_code");
			
			$user = D("InfoUser");
			$result = $user->active($verify_code);
		
			if ($result){
				$this->success("激活成功，跳转到登录页面", U("User/login"));
			}
			else{
				$this->error("激活失败，请重新注册", U("User/login"));
			}
		}
	}

	

	public function showInfo(){
		if (isLogin()){
			$user_id = $_SESSION["user_id"];
			$user = M("InfoUser");
			$data = $user->where("user_id='$user_id'")->find();
			$data["schoolname"] = getSchoolNameById($data["school_id"]);
			$data["collegename"] = getCollegeNameById($data["college_id"]);
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

				$tmp = I("schoolname");
				//$tmp1 = (strstr($tmp, '武大') != null);
				//echo $tmp1;
				if ($tmp === "武汉大学") {
					$data["school_id"] = 1;
				}
				else if ($tmp === "华南理工大学") {
					$data["school_id"] = 2;
				}
				else if ($tmp === "中山大学") {
					$data["school_id"] = 3;
				}
					
				$tmp1 = I("collegename");
				if ($tmp1 === "软件学院") {
					$data["college_id"] = 1;
				}
				else if ($tmp1 === "信息科学与技术学院") {
					$data["college_id"] = 2;
				}
				else if ($tmp1 === "传播与设计学院") {
					$data["college_id"] = 3;
				}
				else if ($tmp1 === "工学院") {
					$data["college_id"] = 4;
				}
				else if ($tmp1 === "外国语学院") {
					$data["college_id"] = 5;
				}
				else if ($tmp1 === "计算机科学与工程学院") {
					$data["college_id"] = 6;
				}
				else if ($tmp1 === "计算机学院") {
					$data["college_id"] = 7;
				}
				
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

			foreach($followlist as &$value){
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
