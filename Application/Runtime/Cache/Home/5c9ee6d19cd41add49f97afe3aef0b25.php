<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<title>Mr.Pan</title>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
<link rel="stylesheet" href="/Mr.Pan/Public/css/normalize.css">
<link rel="stylesheet" href="/Mr.Pan/Public/css/sign.css">
</head>
<body>
<div class="wrapper">
    <div class="center-wrapper">
        <div class="form-wrapper">
            <div class="logo">
            </div>
            <div class="sign">
                <div id="signin">
                    <form method="POST" action=<?php echo U("Home/User/login"); ?> >
                        <p>用户名：<input type="text" name="user_email"/></p>
                        <p>密  码：<input type="password" name="user_pwd"/></p>
                        <input type="submit" value="登录"></input>
                    </form>
                    <button id="newuser">新用户</button>
                </div>
                <div id="signup">
                    <form method="POST" action=<?php echo U("Home/User/register"); ?> >
                        <p>昵称：<input type="text" name="user_name" /><p>
                        <p>邮箱：<input type="text" name="user_email"/></p>
                        <p>密码：<input type="password" name="user_pwd"/></p>
                        <p>确认密码：<input type="password" name="user_repwd"/></p>
                        <input type="submit" value="注册">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script type="text/javascript" src="/Mr.Pan/Public/js/sign.js"></script>
</html>