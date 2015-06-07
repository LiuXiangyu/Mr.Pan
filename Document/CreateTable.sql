CREATE DATABASE IF NOT EXISTS db_tc DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

USE db_tc;

CREATE TABLE info_user(
	user_id INT(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	user_level INT NOT NULL DEFAULT 1,
	user_email VARCHAR(40) NOT NULL,
	user_pwd VARCHAR(40) NOT NULL,
	user_name VARCHAR(20) NOT NULL,
	school_id INT(10) NOT NULL,
	college_id INT(10) NOT NULL,
	verify_code VARCHAR(50) NOT NULL,
	reg_time DATE NOT NULL,
	status  INT NOT NULL DEFAULT 0
);

CREATE TABLE info_teacher(
	teacher_id INT(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	teacher_name VARCHAR(10) NOT NULL,
	school_id INT(10) NOT NULL,
	college_id INT(10) NOT NULL,
	teacher_course VARCHAR(100) NOT NULL
);

CREATE TABLE info_comment(
	comment_id INT(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	school_id INT(10) NOT NULL,
	college_id INT(10) NOT NULL,
	course_id INT(10) NOT NULL,
	teacher_id INT(10) NOT NULL,
	FOREIGN KEY(teacher_id) REFERENCES info_teacher(teacher_id),
	user_id INT(10) NOT NULL,
	FOREIGN KEY(user_id) REFERENCES info_user(user_id),
	comment_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	comment_content VARCHAR(500) NOT NULL
);

CREATE TABLE info_follow(
	id INT(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	user_id INT(10) NOT NULL,
	follow_id INT(10) NOT NULL,
	follow_type CHAR(1) NOT NULL
);


CREATE TABLE info_college(
	college_id INT(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	college_name VARCHAR(30) NOT NULL
);

CREATE TABLE info_school(
	school_id INT(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	school_name VARCHAR(30) NOT NULL,
	school_college VARCHAR(500) NOT NULL
);

CREATE TABLE info_course(
	course_id INT(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	course_name VARCHAR(30) NOT NULL
);

CREATE TABLE info_report(
	id INT(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	user_id INT(10),
	comment_id INT(10)
);