window.selectTable = function (dataCategory) {
    var x = document.getElementsByClassName("dataCategory");
    for (var i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    document.getElementById(dataCategory).style.display = "block";
}
