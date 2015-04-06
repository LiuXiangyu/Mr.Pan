var school = document.getElementById("school");
var college = document.getElementById("college");
var baseurl = <?php echo U("/Home/Teacher/create?school_id=") ?>;
getSelectVal(baseurl + school.value, college);
var handler = function() {
    getSelectVal("" + school.value, college);
};
EventUtil.addHandler(school, "change", handler);
