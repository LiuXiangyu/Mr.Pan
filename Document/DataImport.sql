INSERT INTO `info_school`(`school_id`, `school_name`, `school_college`) VALUES ('1', '清华大学', '1｜2｜3');
INSERT INTO `info_school`(`school_id`, `school_name`, `school_college`) VALUES ('2', '北京大学', '1｜2｜3');	
INSERT INTO `info_school`(`school_id`, `school_name`, `school_college`) VALUES ('3', '中山大学', '1｜2｜3｜4｜5');

INSERT INTO `info_college`(`college_id`, `college_name`) VALUES ('1', '软件学院');
INSERT INTO `info_college`(`college_id`, `college_name`) VALUES ('2', '信息科学与技术学院');
INSERT INTO `info_college`(`college_id`, `college_name`) VALUES ('3', '传播与设计学院');
INSERT INTO `info_college`(`college_id`, `college_name`) VALUES ('4', '工学院');
INSERT INTO `info_college`(`college_id`, `college_name`) VALUES ('5', '外语学院');
INSERT INTO `info_college`(`college_id`, `college_name`) VALUES ('6', '咨询管理学院');

INSERT INTO `info_teacher`(`teacher_id`, `teacher_name`, `school_id`, `college_id`, `teacher_course`) VALUES (2, '潘茂林', 3, 1, '1|2|3');
INSERT INTO `info_teacher`(`teacher_id`, `teacher_name`, `school_id`, `college_id`, `teacher_course`) VALUES (3, '孙雪东', 3, 1, '1|2');

INSERT INTO `info_teacher`(`teacher_id`, `teacher_name`, `school_id`, `college_id`, `teacher_course`) VALUES (4, '张三', 3, 2, '1|2|3');
INSERT INTO `info_teacher`(`teacher_id`, `teacher_name`, `school_id`, `college_id`, `teacher_course`) VALUES (5, '李四', 3, 2, '1|2');

INSERT INTO `info_teacher`(`teacher_id`, `teacher_name`, `school_id`, `college_id`, `teacher_course`) VALUES (6, '王海', 4, 1, '1|2');
INSERT INTO `info_teacher`(`teacher_id`, `teacher_name`, `school_id`, `college_id`, `teacher_course`) VALUES (6, '潘岩', 4, 1, '1|2');

INSERT INTO `info_teacher`(`teacher_id`, `teacher_name`, `school_id`, `college_id`, `teacher_course`) VALUES (2, '潘茂林', 3, 2, '1|2');

INSERT INTO `info_course`(`course_id`, `course_name`) VALUES (1, '系统分析与设计');
INSERT INTO `info_course`(`course_id`, `course_name`) VALUES (2, '高等数学');
INSERT INTO `info_course`(`course_id`, `course_name`) VALUES (3, 'Web2.0');
INSERT INTO `info_course`(`course_id`, `course_name`) VALUES (4, '软件工程导论');
INSERT INTO `info_course`(`course_id`, `course_name`) VALUES (5, '线性代数');
INSERT INTO `info_course`(`course_id`, `course_name`) VALUES (6, '数据结构');
INSERT INTO `info_course`(`course_id`, `course_name`) VALUES (7, '软件测试');

INSERT INTO `info_comment`(`school_id`, `college_id`, `course_id`, `teacher_id`, `user_id`, `comment_content`) VALUES (3, 1, 1, 1, 1, '不错，期末求过');
INSERT INTO `info_comment`(`school_id`, `college_id`, `course_id`, `teacher_id`, `user_id`, `comment_content`) VALUES (3, 1, 1, 1, 1, '不错，期末求过');
INSERT INTO `info_comment`(`school_id`, `college_id`, `course_id`, `teacher_id`, `user_id`, `comment_content`) VALUES (3, 1, 1, 1, 1, '不错，求不挂');
INSERT INTO `info_comment`(`school_id`, `college_id`, `course_id`, `teacher_id`, `user_id`, `comment_content`) VALUES (3, 1, 1, 1, 1, '不错，哈哈');

INSERT INTO `info_comment`(`school_id`, `college_id`, `course_id`, `teacher_id`, `user_id`, `comment_content`) VALUES (3, 1, 1, 2, 1, '不错，求不挂');
INSERT INTO `info_comment`(`school_id`, `college_id`, `course_id`, `teacher_id`, `user_id`, `comment_content`) VALUES (3, 1, 1, 2, 1, '不错，还OK');
INSERT INTO `info_comment`(`school_id`, `college_id`, `course_id`, `teacher_id`, `user_id`, `comment_content`) VALUES (3, 1, 1, 2, 1, '不错，老师叫啥');

INSERT INTO `info_comment`(`school_id`, `college_id`, `course_id`, `teacher_id`, `user_id`, `comment_content`) VALUES (3, 1, 2, 2, 1, '不错，还OK');