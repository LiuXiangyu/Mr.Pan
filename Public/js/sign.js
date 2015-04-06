var newuser = document.getElementById("newuser");
var signin = document.getElementById("signin");
var signup = document.getElementById("signup");
var handler = function() {
    signin.style.display = "none";
    signup.style.display = "block";
}

EventUtil.addHandler(newuser, "click", handler);
