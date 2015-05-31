<?php
namespace Admin\Model;
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