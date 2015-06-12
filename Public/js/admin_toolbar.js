

document.write('<html>'+
'<head>'+
  '<meta http-equiv="Content-Type" content="text/html" charset="utf-8">'+
 '<link rel="stylesheet" href="__PUBLIC__/css/normalize.css">'+
  '<link rel="stylesheet" href="__PUBLIC__/css/general.css">'+
 '<link rel="stylesheet" href="__PUBLIC__/css/comment.css">'+
  '<link href="__PUBLIC__/css/bootstrap.min.css" rel="stylesheet">'+
    '<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/bootstrap.css"/>'+
    '<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/DT_bootstrap.css">'+
    '<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/style.css"/>'+
    '<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/style.css"/>'+
    '<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/style2.css"/>'+
    '<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/demo.css"/>'+
'</head>'+
'<body>'+
'<div id="top-bar">'+
      '<div class="wrap">'+
        '<div class="top-bar-left">'+
            '<span class="logo"><a>教师评价系统</a></span>'+
        '</div>'+
        '<div class="top-bar-right">'+
          '<ul class="nav navbar-nav navbar-right">'+
           '<li class="dropdown">'+
              '<a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="glyphicon glyphicon-user"></i>' + user_name + '<b class="caret"></b></a>'+
              '<ul class="dropdown-menu">'+
                            '<li><a href=' + user_manage_url +'><i class="glyphicon glyphicon-user"></i> 用户管理</a></li>'+
                            '<li><a href=' + all_comments_url +'><i class="glyphicon glyphicon-cog"></i> 所有评论</a></li>'+
                            '<li><a href=' + comment_manage_url +'><i class="glyphicon glyphicon-cog"></i> 举报管理</a></li>'+
                            '<li><a href=' + show_info_url +'><i class="glyphicon glyphicon-edit"></i> 我的信息</a></li>'+
                        '</ul>'+
            '</li>'+
            '<li>'+
              '<a  class="logout" href='  + logout_url +  '><i class="glyphicon glyphicon-off"></i> 注销</a>'+
            '</li>'+

          


          '</ul>'+
        '</div>'+
      '</div>'+
    '</div>'+
    '<script type="text/javascript" src="__PUBLIC__/js/jquery-1.7.2.min.js"></script>'+
    '<script type="text/javascript" src="__PUBLIC__/js/bootstrap-dropdown.js"></script>'+
    '<script type="text/javascript" src="__PUBLIC__/js/jquery.js"></script>'+
    '<script type="text/javascript" src="__PUBLIC__/js/jquery.dataTables.js"></script>'+
    '<script type="text/javascript" src="__PUBLIC__/js/demo.js"></script>'+
    '</body>'+
    '</html>');

