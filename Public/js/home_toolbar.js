

document.write('<div id="top-bar">'+
			'<div class="wrap">' +
				'<div class="top-bar-left">'+
					'<form method="GET" action=' + search_url + '>'+
						'<span class="logo"> <a href=' + index_url + '> 教师评价系统</a></span>'+
						'<input type="search" name="keyword" class="searchkey text-control" placeholder="搜索教师或课程"/>'+
						'<input type="radio" name="searchType" value="teacher" checked="checked" />&nbsp教师'+
						'<input type="radio" name="searchType" value="course" />&nbsp课程'+
						
						'<input type="submit" class=" zu-top-add-question" value="搜索"/>'+

					'</form>'+
				'</div>'+
				'<div class="top-bar-right">'+
	
					'<ul class="nav navbar-nav navbar-right">'+
						'<li class="dropdown">'+
							'<a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="glyphicon glyphicon-user"></i> ' + user_name_url + '<b class="caret"></b></a>'+
							'<ul class="dropdown-menu">'+
		                       	'<li><a href=' + comment_manage_url + '><i class="glyphicon glyphicon-cog"></i> 我的评论</a>'+
		                      		'<li><a href=' + show_info_url + '><i class="glyphicon glyphicon-edit"></i> 个人信息</a></li>'+
		                      		'<li><a href=' + follow_list_url + '><i class="glyphicon glyphicon-heart"></i> 我的关注</a>'+
		                  	'</ul>'+
						'</li>'+
						'<li>'+
						'<a href=' + logout_url + ' class="logout"><i class="glyphicon glyphicon-off"></i> 注销</a>'+
						'</li>'+
					'</ul>'+
				'</div>'+
			'</div>'+
		'</div>');