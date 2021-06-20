var counter = 0;
var display_str = "";
var display_div = document.getElementById("display_div_id");
var simulationCount = document.getElementById("simCountBox");
var wins = 0;
var losses = 0;
var winCount = document.getElementById("wins");
var lossCount = document.getElementById("losses");
var wl = document.getElementById("wl");

window.step = function (){
    clearCount();
    if(simulationCount.value == "#" || simulationCount.value == counter || simulationCount.value > simulationCount.max){
        counter = 0;
        errorMessage("Invalid input");
        return;
    }
    //do something
    //if(completes a run increment){
    incrementCount(1);
    //}
    displayCount();
    //just here temporarily to test
    incrementWins();
}

window.next = function (){
    clearCount();
    if(simulationCount.value == "#" || simulationCount.value == counter || simulationCount.value > simulationCount.max){
        counter = 0;
        errorMessage("Invalid input");
        return;
    }
    incrementCount(1);
    displayCount();
    //just here temporarily to test
    incrementLosses();
}

window.runAll = function (){
    clearCount();
    if(simulationCount.value == "#" || simulationCount.value == counter || simulationCount.value > simulationCount.max){
        counter = 0;
        errorMessage("Invalid input");
        return;
    }
    maxCount();
    displayCount();

    //just here temporarily to test
    resetWL();
}

window.incrementCount = function (amountIncrease){
    counter+=amountIncrease;
}

window.displayCount = function (){
    display_str = counter.toString() + "/" + simulationCount.value;
    for (var i = 0; i < display_str.length; i++) {
        var new_span = document.createElement('span');
        new_span.className = 'num_tiles';
        new_span.innerText = display_str[i];
        display_div.appendChild(new_span);
    }
}

window.clearCount = function (){
    while (display_div.hasChildNodes()) {
        display_div.removeChild(display_div.lastChild);
    }
}

window.maxCount = function (){
    counter = simulationCount.value;
}

window.errorMessage = function (errorText) {
    var error = document.getElementById("error")
    error.textContent = errorText;
}

window.incrementWins = function (){
    wins++;
    winCount.innerHTML = wins.toString();
    wl.innerHTML = (wins/losses).toString();
}

window.incrementLosses = function (){
    losses++;
    lossCount.innerHTML = losses.toString();
    wl.innerHTML = (wins/losses).toString();
}

window.resetWL = function (){
    wins = 0;
    losses = 0;
    winCount.innerHTML = "";
    lossCount.innerHTML = "";
    wl.innerHTML = "";
}