<?php

use Home\Model\InfoCollegeModel;
use Home\Model\InfoUserModel;
use Home\Model\InfoSchoolModel;

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
