//Start of education's javascript code
window.openVariants = function (evt, cityName) {
    var x = document.getElementsByClassName("monty");
    for (var i = 0; i < x.length; i++) {
        x[i].classList.remove("active");
    }
    document.getElementById(cityName).classList.add("active");
    var width = window.getComputedStyle(evt.currentTarget).getPropertyValue("width");
    var pos = 17;
    var z = document.getElementsByClassName("variantsButton");
    for (var i = 0; i < z.length; ++i) {
        if (z[i] == evt.currentTarget) {
            break;
        }
        else {
            var temp = window.getComputedStyle(z[i]).getPropertyValue("width")
            temp = temp.replace("px", "");
            pos += parseFloat(temp);
            pos += (17 * 2);
            pos += 4.25;
        }
    }
    document.getElementById("slider").style.cssText = "left: " + pos + "px";
    document.getElementById("slider").style.width = width;
}

window.addEventListener('load', () => {
    document.getElementById("defaultOpen").click();
})

//Start of other javascript code
window.selectTable = function (dataCategory) {
    var x = document.getElementsByClassName("dataCategory");
    for (var i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    document.getElementById(dataCategory).style.display = "block";
}
