<?php

use Home\Model\InfoCollegeModel;
use Home\Model\InfoUserModel;
use Home\Model\InfoSchoolModel;

function isLogin(){
	if ($_SESSION['user_name'] != null && $_SESSION['user_name'] != "")
		return true;
	else
		return false;
}

/*  
	通过college_id来获得college_name
	@param $college_id
	return $college_name;
*/
function getCollegeNameById($college_id){
	$college = M("InfoCollege");
	$college_name= $college->where("college_id='$college_id'")->getField("college_name");
	return $college_name;	
}

/*
	通过用户ID来获取用户名
	$param
		user_id
*/
function getUserNameById($user_id){
	$user = M("InfoUser");
	$name = $user->where("user_id='$user_id'")->getField("user_name");

	return $name;
}

/*
	通过学校ID来获取学校名
	$param
		school_id
*/
function getSchoolNameById($school_id){
	$school = M("InfoSchool");
	$name = $school->where("school_id='$school_id'")->getField("school_name");

	return $name;
}

/*
	通过老师ID来获取老师姓名
	$param
		teacher_id
*/
function getTeacherNameById($teacher_id){
	$teacher = M("InfoTeacher");
	$name = $teacher->where("teacher_id='$teacher_id'")->getField("teacher_name");

	return $name;
}

/*
	通过课程ID来获取课程名
	$param
		course_id
*/
function getCourseNameById($course_id){
	$course = M("InfoCourse");
	$name = $course->where("course_id='$course_id'")->getField("course_name");

	return $name;
}

function getSchoolIdByTeacherId($teacher_id){
	$teacher = M("InfoTeacher");
	$id = $teacher->where("teacher_id='$teacher_id'")->getField("school_id");
	return $id;
}

/*
	通过教师名来获得教师ID列表
	$param
		teacher_name
*/
function getTeacherIdByName($teacher_name){
	$teacher = M("InfoTeacher");
	$result = $teacher->where("teacher_name='$teacher_name'")->field('teacher_id')->select();
	$names = array();
	foreach ($result as $n => $record) {
		array_push($names, $record['teacher_id']);
	}
	return $names;
}

/*
	通过课程名来获得课程ID列表
	$param
		course_name
*/
function getCourseIdByName($course_name){
	$course = M("InfoCourse");
	$result = $course->where("course_name='$course_name'")->field('course_id')->select();
	$names = array();
	foreach ($result as $n => $record) {
		array_push($names, $record['course_id']);
	}
	return $names;
}







