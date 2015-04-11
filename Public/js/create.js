var school = document.getElementById("school");
var college = document.getElementById("college");
function getSelectVal(url, selector) {
    ajax(url, function(data) {
        var jsondata = JSON.decode(data);
        selector.length = 0;
        for (var i = 0; i < jsondata.length; ++i) {
            var option = document.createElement("option");
            option.value = jsondata[i]['id'];
            option.text = jsondata[i]['school_name'];
            selector.appendChild(option);
        }
    });
}
var handler = function() {
    getSelectVal(baseurl + school.value, college);
};
EventUtil.addHandler(school, "change", handler);
