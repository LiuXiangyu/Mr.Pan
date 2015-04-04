<?php

namespace Home\Model;
use Think\Model;

class InfoUserModel extends Model{

	//用户模型自动验证
	protected $_validate = array(
			/*  验证用户名 */
			array('user_name', 'require', "用户名必须提供"),
			array('user_name','4,20',"用户名长度必须为4到20个字符",self::EXISTS_VALIDATE,'length'),

			/* 验证密码 */
			array('user_pwd', 'require', "密码必须提供"),
			array('user_pwd', '6,16', "密码长度必须为6到16个字符", self::EXISTS_VALIDATE, 'length'),
			array('user_repwd','user_pwd',"确认密码不相同",0,'confirm'), 

			/* 验证邮箱 */
			array('user_email', 'require', "邮箱必须提供"),
			array('user_email', 'email', "邮箱格式不正确", self::EXISTS_VALIDATE),
			array('user_email','',"该邮箱已被注册",self::EXISTS_VALIDATE,'unique'),

		);
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
		if (is_array($result) && !empty($result)){
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