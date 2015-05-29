function getNewMessages(data) {
    var messages = JSON.decode(data);
    for (var i = 0; i < messages.length; ++i) {
        putNewMessage(messages[i]);
    }
}

function putNewMessage(message) {
    var feed = document.createElement("div");
    var user = document.createElement("span");
    user.textContent = message["user_name"];
    var teacher = document.createElement("span");
    teacher.textContent = message["teacher_name"];
    var course = document.createElement("span");
    course.textContent = message["course_name"];
    var header = document.createElement("div");
    header.appendChild(user);
    header.appendChild(document.createTextNode("评论了"));
    header.appendChild(teacher);
    header.appendChild(document.createTextNode("的"));
    header.appendChild(course);
    feed.appendChild(header);
    var content = document.createElement("div");
    content.textContent = message["comment_content"];
    feed.appendChild(content);
    document.getElementById("feeds").appendChild(feed);
}

ajax(baseurl, getNewMessages);
