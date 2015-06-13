var newuser = document.getElementById("newuser");
var signin = document.getElementById("signin");
var signup = document.getElementById("signup");
var handler = function() {
    signin.style.display = "none";
    signup.style.display = "block";
}

EventUtil.addHandler(newuser, "click", handler);

var login1 = document.getElementById("login1");

var handler1 = function() {
    signin.style.display = "block";
    signup.style.display = "none";
}

EventUtil.addHandler(login1, "click", handler1);

