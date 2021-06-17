window.openVariants = function (evt, cityName) {
    var x = document.getElementsByClassName("monty");
    for (var i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    document.getElementById(cityName).style.display = "block";
    var y = document.getElementsByClassName("variantsButton");
    for (var i = 0; i < y.length; i++) {
        y[i].className = y[i].className.replace(" active", "");
    }
    evt.currentTarget.className += " active";
}

window.addEventListener('load', () => {
    document.getElementById("defaultOpen").click();
})

window.selectTable = function (dataCategory) {
    var x = document.getElementsByClassName("dataCategory");
    for (var i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    document.getElementById(dataCategory).style.display = "block";
}
