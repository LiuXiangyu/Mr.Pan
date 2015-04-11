var school = document.getElementById("school");
var college = document.getElementById("college");
function getSelectVal(url, selector) {
    ajax(url, function(data) {
        jsondata = data.parseJSON();
        selector.length = 0;
        for (var i = 0; i < jsondata.length; ++i) {
            var optiona = "<option value='" + jsondata[i]['id'] + "'>" + jsondata[i]['school_name'] + "</option>";
            selector.appendChild(option);
        }
    });
}
var handler = function() {
    getSelectVal("" + school.value, college);
};
EventUtil.addHandler(school, "change", handler);
