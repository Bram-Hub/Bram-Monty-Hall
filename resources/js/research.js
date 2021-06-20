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

/*
--------------------------------------------------------------------
Simulation
--------------------------------------------------------------------
*/
let door1 = 0;
let door2 = 0;
let door3 = 0;
let carDoor = 2;

window.initialize = function(){
    carDoor = 1;
}

window.clickDoor1 = function(){
    if(door1 == 0){
        door1 = 1;
        openDoor1();
    }
}

window.clickDoor2 = function(){
    if(door2 == 0){
        door2 = 1;
        openDoor2();
    }   
}

window.clickDoor3 = function(){
    if(door3 == 0){
        door3 = 1;
        openDoor3();
    }
}

window.openDoor1 = function(){
    if(carDoor == 1){
        document.getElementById("door1").src = "img/carDoor.png";
        alert("You win");
    }
    else{
        document.getElementById("door1").src = "img/goatDoor.png";
        alert("You lose");
    }
}

window.openDoor2 = function(){
    if(carDoor == 2){
        document.getElementById("door2").src = "img/carDoor.png";
        alert("You win");
    }
    else{
        document.getElementById("door2").src = "img/goatDoor.png";
        alert("You lose");
    }
}

window.openDoor3 = function(){
    if(carDoor == 3){
        document.getElementById("door3").src = "img/carDoor.png";
        alert("You win");
    }
    else{
        document.getElementById("door3").src = "img/goatDoor.png";
        alert("You lose");
    }
}