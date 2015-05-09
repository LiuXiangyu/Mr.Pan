function getNewMessages(messages) {
    for (var i = 0; i < messages.length; ++i) {
        putNewMessage(messages[i]);
    }
}

function putNewMessage(message) {
    var feed = document.createElement("div");
    var user = document.createElement("span");
    user.html(message["user_name"];
    var teacher = document.createElement("span");
    teacher.html(message["teacher_name"]);
    var course = document.createElement("span");
    course.html(message["course_name"]);
    var header = document.createElement("div");
    header.appendChild(user);
    header.appendChild("评论了");
    header.appendChild(teacher);
    header.appendChild("的");
    header.appendChild(course);
    feed.appendChild(header);
    var content = document.createElement("div");
    content.html(message["comment_content"]);
    feed.appendChild(content);
    document.getElementById("feeds").appendChild(feed);
}

ajax(baseurl, getNewMessages);
