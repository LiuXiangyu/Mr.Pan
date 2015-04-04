<?php

namespace Home\Model;
use Think\Model;

class UserModel extends Model{
	public function login($data){
		$user_name = $data["user_name"];
		$user_pwd = $data["use_pwd"];
		$result = $this->where("user_name='$user_name'")->find();
		if (is_array($result)){
			if ($result["user_pw"] == $user_pw){
				session('user_name', $user_name);
				session("user_id", $user_id);
				session("user_level", $user_level);
				return true;
			}
			else{
				$this->error = "密码不正确"；
				return false;
			}
		}
		else{
			$this->error = "用户名不存在";
			return false;
		}
	}
}