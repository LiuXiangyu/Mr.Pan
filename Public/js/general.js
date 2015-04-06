function ajax(url) {
    var xmlhttp;
    var data;
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            data = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET", url, true);
    xmlhttp.sent();
    return data;
}

function getSelectVal(url, selector) {
    var data = ajax(url).parseJSON();
    selector.length = 0;
    for (var i = 0; i < data.length; ++i) {
        var optiona = "<option value='" + data[i]['id'] + "'>" + data[i]['school_name'] + "</option>";
        selector.appendChild(option);
    }
}
