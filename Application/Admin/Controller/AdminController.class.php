<?php
namespace Admin\Controller;
use Think\Controller;

class AdminController extends Controller{

	public function manageUser(){
		if (isLogin() and $_SESSION['user_level'] == 'b')
	}
}