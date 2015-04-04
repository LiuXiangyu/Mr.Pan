<?php

namespace Home\Model;
use Think\Model;

class InfoUserModel extends Model{
	/*
		用户登录
		@param 
			user_email
			user_pwd
	*/
	public function login($data){
		$user_email = $data["user_email"];
		$user_pwd = $data["use_pwd"];
		$result = $this->where("user_email='$user_email'")->find();
		if (is_array($result)){
			if ($result["user_pw"] == $user_pw){
				session('user_name', $result["user_name"]);
				session("user_id", $result["user_id"]);
				session("user_level", $result["user_level"]);
				session("user_email", $user_email);
				return true;
			}
			else{
				$this->error = "密码不正确";
				return false;
			}
		}
		else{
			$this->error = "用户名不存在";
			return false;
		}
	}

	/*
		用户注册
		@param
			user_name
			user_email
			user_pwd
	*/
	public function register($data){
		if ($this->create($data)){ //判断数据是否符合要求
			$this->add();
			return true;
		}
		else{
			return false;
		}
	}

}