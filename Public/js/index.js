$(function(){
	var perpage = 5, currentpage = 0;
	var comments = $('.content');

	/*
	翻页，更新页面
	*/
	function showpage(objs) {
		comments.each(function(i) {
			if (parseInt(i / perpage) == currentpage) {
				$(this).show();
			} else {
				$(this).hide();
			}
		});
	}

	/*
	初始化翻页导航
	*/
	function page() {
		showpage();
		var pagenav = $('#pagenav');
		var prev = $('<span/>').text('<前页').addClass('prev');
		var next = $('<span/>').text('后页>').addClass('next');
		prev.click(function() {
			if (currentpage <= 0) {
				return;
			} else {
				currentpage--;
				$('.curpage').prev().click();
			}
		});
		next.click(function() {
			if (currentpage >= comments.length / perpage) {
				return;
			} else {
				currentpage++;
				$('.curpage').next().click();
			}
		});

		pagenav.append(prev);
		for (var i = 0; i <= comments.length / perpage; ++i) {
			var a = $('<span/>').text((i+1).toString());
			if (i == 0) {
				a.addClass('curpage');
			}
			a.click(function() {
				$('.curpage').removeClass('curpage');
				currentpage = parseInt($(this).html()) - 1;
				showpage();
				$(this).addClass('curpage');
			})
			$('#pagenav').append(a);
		}
		pagenav.append(next);

	}

	/*
	* 根据选择的学校从后端获得该学校的所有
	* 学院名称和ID作为学院的选项
	*/
	$('#school').change(function() {
		var id = $('#school').val();
		$.ajax({
  			url: 'index',
  			dataType: 'json',
  			data: {action : 'a', school_id: id}
		}).done(function(data) {
			$('#college option').each(function(i) {
					if (i != 0)
						$(this).remove();
			});
			var colleges = $.parseJSON(data);
			for (var i = 0; i < colleges.length; ++i) {
				var opt = $('<option/>').attr({"value" : colleges[i].id}).text(colleges[i].college_name);
				$('#college').append(opt);
			}
		});
	});

	/*
	* 根据选择的学校和学院从后端获得该学校学院
	* 的所有教师名称和ID作为教师的选项
	*/
	$('#college').change(function() {
		var sid = $('#school').val();
		var cid = $('#college').val();
		$.ajax({
  			url: 'index',
  			dataType: 'json',
  			data: {action : 'b', school_id: sid, college_id: cid}
		}).done(function(data) {
			$('#teacher option').each(function(i) {
					if (i != 0)
						$(this).remove();
			});
			var teachers = $.parseJSON(data);
			for (var i = 0; i < teachers.length; ++i) {
				var opt = $('<option/>').attr({"value" : teachers[i].teacher_id}).text(teachers[i].teacher_name);
				$('#teacher').append(opt);
			}
		});
	});

	/*
	* 根据选择的学校和学院从后端获得该学校学院
	* 的所有教师名称和ID作为教师的选项
	*/
	$('#teacher').change(function() {
		var sid = $('#school').val();
		var cid = $('#college').val();
		var tid = $('#teacher').val();

		$.ajax({
  			url: 'index',
  			dataType: 'json',
  			data: {action : 'c', school_id: sid, college_id: cid, teacher_id: tid}
		}).done(function(data) {
			$('#course option').each(function(i) {
				if (i != 0)
					$(this).remove();
			});
			var courses = $.parseJSON(data);
			for (var i = 0; i < courses.length; ++i) {
				var opt = $('<option/>').attr({"value" : courses[i].course_id}).text(courses[i].course_name);
				$('#course').append(opt);
			}
		});
	});
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
	
	//createCommentNode('school', 'college', 'teacher', 'course', 'username', 'time', 'content');

	$('#addbtn').click(function() {
		createCommentNode('school', 'college', 'teacher', 'course', 'username', 'time', 'content');
		var sid = $('#school').val();
		var cid = $('#college').val();
		var tid = $('#teacher').val();
		var courseid = $('#course').val();

		$.POST({
  			url: 'index',
  			dataType: 'json',
  			data: {actoin: 'd', school_id: sid, college_id: cid, teacher_id: tid, course_id: courseid}
		}).done(function(data) {
			alert(data);
			/*
			$('#course option').each(function(i) {
				if (i != 0)
					$(this).remove();
			});
			var courses = $.parseJSON(data);
			for (var i = 0; i < courses.length; ++i) {
				var opt = $('<option/>').attr({"value" : courses[i].course_id}).text(courses[i].course_name);
				$('#course').append(opt);
			}*/
		});
	});

	page();

});





