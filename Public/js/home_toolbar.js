

document.write('<div id="top-bar">'+
			'<div class="wrap">' +
				'<div class="top-bar-left">'+
					'<form method="GET" action=' + search_url + '>'+
						'<span class="logo"> <a href=' + index_url + '> 教师评价系统</a></span>'+
						'<input type="search" name="keyword" class="searchkey"/>'+
						'<input type="radio" name="searchType" value="teacher" checked="checked" />&nbsp教师'+
						'<input type="radio" name="searchType" value="course" />&nbsp课程'+
						
						'<input type="submit" value="serach" class="searchbtn"/>'+

					'</form>'+
				'</div>'+
				'<div class="top-bar-right">'+
	
					'<ul class="nav navbar-nav navbar-right">'+
						'<li class="dropdown">'+
							'<a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="glyphicon glyphicon-user"></i> ' + user_name_url + '<b class="caret"></b></a>'+
							'<ul class="dropdown-menu">'+
		                       	'<li><a href=' + comment_manage_url + '><i class="glyphicon glyphicon-cog"></i> 所有评论</a>'+
		                      		'<li><a href=' + show_info_url + '><i class="glyphicon glyphicon-edit"></i> 个人资料</a></li>'+
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