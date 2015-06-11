CREATE DATABASE IF NOT EXISTS db_tc DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE db_tc;

INSERT INTO `info_user`(`user_level`, `user_email`, `user_pwd`, `user_name`, `school_id`, `college_id`, `verify_code`, `reg_time`, `status`) VALUES (1, '123@qq.com', '123456', 'lcc123', 3, 1, 'd63a4720fb176227a6be385323485eea', '2015-06-07 12:57:16', 1);
INSERT INTO `info_user`(`user_level`, `user_email`, `user_pwd`, `user_name`, `school_id`, `college_id`, `verify_code`, `reg_time`, `status`) VALUES (1, '444@qq.com', '123456', 'lcc444', 3, 1, 'e7f99a22784f7fdd66248fdb5edda068', '2015-06-07 20:58:10', 1);
INSERT INTO `info_user`(`user_level`, `user_email`, `user_pwd`, `user_name`, `school_id`, `college_id`, `verify_code`, `reg_time`, `status`) VALUES (2, 'admin', 'admin', 'admin', 3, 1, '981a5acc257f28309a8d95f24feff751', '2015-06-07 20:58:56', 1);

INSERT INTO `info_school` (`school_name`, `school_college`) VALUES ('清华大学', '1|2|3');
INSERT INTO `info_school` (`school_name`, `school_college`) VALUES ('北京大学', '1|2|3');	
INSERT INTO `info_school` (`school_name`, `school_college`) VALUES ('中山大学', '1|2|3|4|5');

INSERT INTO `info_college` (`college_name`) VALUES ('软件学院');
INSERT INTO `info_college` (`college_name`) VALUES ('信息科学与技术学院');
INSERT INTO `info_college` (`college_name`) VALUES ('传播与设计学院');
INSERT INTO `info_college` (`college_name`) VALUES ('工学院');
INSERT INTO `info_college` (`college_name`) VALUES ('外语学院');
INSERT INTO `info_college` (`college_name`) VALUES ('资讯管理学院');

INSERT INTO `info_teacher` (`teacher_name`, `school_id`, `college_id`, `teacher_course`) VALUES ('潘茂林', 3, 1, '1|2|3');
INSERT INTO `info_teacher` (`teacher_name`, `school_id`, `college_id`, `teacher_course`) VALUES ('孙雪东', 3, 1, '1|2');
INSERT INTO `info_teacher` (`teacher_name`, `school_id`, `college_id`, `teacher_course`) VALUES ('张三', 1, 2, '1|2|3');
INSERT INTO `info_teacher` (`teacher_name`, `school_id`, `college_id`, `teacher_course`) VALUES ('王海', 1, 2, '1|2|3');
INSERT INTO `info_teacher` (`teacher_name`, `school_id`, `college_id`, `teacher_course`) VALUES ('李四', 2, 2, '1|2');
INSERT INTO `info_teacher` (`teacher_name`, `school_id`, `college_id`, `teacher_course`) VALUES ('潘岩', 3, 1, '1|2');
INSERT INTO `info_teacher` (`teacher_name`, `school_id`, `college_id`, `teacher_course`) VALUES ('潘茂林', 3, 2, '1|2');

INSERT INTO `info_course` (`course_name`) VALUES ('系统分析与设计');
INSERT INTO `info_course` (`course_name`) VALUES ('高等数学');
INSERT INTO `info_course` (`course_name`) VALUES ('Web2.0');
INSERT INTO `info_course` (`course_name`) VALUES ('软件工程导论');
INSERT INTO `info_course` (`course_name`) VALUES ('线性代数');
INSERT INTO `info_course` (`course_name`) VALUES ('数据结构');
INSERT INTO `info_course` (`course_name`) VALUES ('软件测试');

INSERT INTO `info_comment` (`school_id`, `college_id`, `course_id`, `teacher_id`, `user_id`, `comment_content`) VALUES (3, 1, 1, 1, 1, '不错，期末求过');
INSERT INTO `info_comment` (`school_id`, `college_id`, `course_id`, `teacher_id`, `user_id`, `comment_content`) VALUES (3, 1, 1, 1, 2, '不错，期末求过');
INSERT INTO `info_comment` (`school_id`, `college_id`, `course_id`, `teacher_id`, `user_id`, `comment_content`) VALUES (3, 1, 1, 1, 1, '不错，求不挂');
INSERT INTO `info_comment` (`school_id`, `college_id`, `course_id`, `teacher_id`, `user_id`, `comment_content`) VALUES (3, 1, 1, 1, 2, '不错，哈哈');
INSERT INTO `info_comment` (`school_id`, `college_id`, `course_id`, `teacher_id`, `user_id`, `comment_content`) VALUES (3, 1, 1, 2, 2, '不错，求不挂');
INSERT INTO `info_comment` (`school_id`, `college_id`, `course_id`, `teacher_id`, `user_id`, `comment_content`) VALUES (3, 1, 1, 2, 1, '不错，还OK');
INSERT INTO `info_comment` (`school_id`, `college_id`, `course_id`, `teacher_id`, `user_id`, `comment_content`) VALUES (3, 1, 1, 2, 1, '不错，老师叫啥');
INSERT INTO `info_comment` (`school_id`, `college_id`, `course_id`, `teacher_id`, `user_id`, `comment_content`) VALUES (3, 1, 2, 2, 2, '不错，还OK');
