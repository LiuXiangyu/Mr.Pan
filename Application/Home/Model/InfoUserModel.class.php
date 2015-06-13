<?php

namespace Home\Model;
use Think\Model;

class InfoUserModel extends Model{

	//用户模型自动验证
	protected $_validate = array(
		/*  验证用户名 */
		array('user_name', 'require', "用户名必须提供"),
		array('user_name','',"该用户名已被注册",self::EXISTS_VALIDATE,'unique'),
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
		$user_pwd = $data["user_pwd"];
		$result = $this->where("user_email='$user_email'")->find();
		if (is_array($result) && !empty($result)){
			if ($result["user_pwd"] == $user_pwd && $result['status'] != 0){
				session('user_name', $result["user_name"]);
				session("user_id", $result["user_id"]);
				session("user_level", $result["user_level"]);
				session("user_email", $user_email);

				return true;
			}
			else if ($result['status'] == 0){
				$this->error = "登录失败，该邮箱未激活！";
				return false;
			}
			else{
				$this->error = "密码不正确";
				return false;
			}
		}
		else{
			$this->error = "邮箱不存在";
			return false;
		}
	}

	/*
		用户登出
	*/
	public function logout(){
		session("user_name", null);
		session("user_id", null);
		session("user_level", null);
		session("user_email", null);
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
			$data['reg_time'] =  date("Y-m-d H:i:s", time());
			$data['status'] = 0;
			$data['verify_code'] = md5($data['user_email'].$data['user_pwd'].$data['reg_time']);
		
			$emailResult = sendMail($data['user_email'],$data['verify_code']);
			if ($emailResult){
				if ($this->add($data)) {//把新数据插入数据库
					return true;
				}
				else{  //插入新数据失败
					$this->error = "注册用户失败";
					return false;
				}
			}
			else{
				$this->error = "验证邮件发送失败，请稍后再试";
				return false;
			}
		}
		else{
			return false;
		}
	}

	/*
		激活账户
	*/
	public function active($verify_code){
		$data = $this->where("verify_code='$verify_code'")->find();
		if (!empty($data)){
			$user_id = $data['user_id'];
			if ($data['status'] == 0){
				$current_time = date("Y-m-d H:i:s", strtotime("-1 day"));
				if ($data['reg_time'] < $current_time){
					$this->error = "您的激活有效期已过，请重新注册发送激活邮件";
					$this->where("user_id='$user_id'")->delete();
					return false;
				}
				else{
					$data['status'] = 1;
					if ($this->where("user_id='$user_id'")->save($data)){
						return true;
					}
					else{
						$this->error = "激活失败，请重新注册";
						$this->where("user_id='$user_id'")->delete();
						return false;
					}
				}
			}
			else{
				 return true;
			}
		}
		else{
			$this->error = "激活失败，请重新注册";
			return false;
		}
	}

	public function updateInfo($data){
		if ($this->create($data)){
			if ($this->save($data))
				return true;
			else{
				$this->error = "修改失败";
				return false;
			}
		}
		else{
			return false;
		}
	}

}