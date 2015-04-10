var school = document.getElementById("school");
var college = document.getElementById("college");
getSelectVal(baseurl + school.value, college);
var handler = function() {
    getSelectVal("" + school.value, college);
};
EventUtil.addHandler(school, "change", handler);
