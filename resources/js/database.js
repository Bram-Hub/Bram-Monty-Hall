function selectTable(dataCategory) {
    var i;
    var x = document.getElementsByClassName("dataCategory");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    document.getElementById(dataCategory).style.display = "block";
}