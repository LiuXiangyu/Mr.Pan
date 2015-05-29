$(function(){
	/*
		插入评论
		@param 
			school 学校名称
			college  学院名称
			course 课程名称
			username 评论者用户名
			time 评论时间
			content 评论内容
	*/
	function createCommentNode (school, college, teacher, course, username, time, content) {
		var school_span = $('<span/>').addClass('comment_school').text(school);
		var college_span = $('<span/>').addClass('comment_college').text(college);
		var teacher_span = $('<span/>').addClass('comment_teacher').text(teacher);
		var course_span = $('<span/>').addClass('comment_course').text(course);
		var username_span = $('<span/>').addClass('comment_username').text(username);
		var time_span = $('<span/>').addClass('time').text(time);

		var info1 = $('<span/>').addClass('info1').append(username_span).append(time_span);
		var info2 = $('<span/>').addClass('info2').append(school_span).append(college_span).append(teacher_span).append(course_span);
		
		var h3 = $('<h3/>').append(info1).append(info2);
		var content_p = $('<p/>').addClass('comment_content').text(content);

		var content_div = $('<div/>').addClass('content').append(h3).append(content_p);
		var item_div = $('<div/>').addClass('comment_item').append(content_div);

		$('#comment').prepend(item_div);
	}

});