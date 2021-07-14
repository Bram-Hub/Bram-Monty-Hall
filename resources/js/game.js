var gameState = 0;
var states = ["firstMove", "montyMove", "secondMove", "end"];
var montyVariant = document.getElementById("montySelect").value;
var simsRuns = 0;
var totalSims = document.getElementById("simCountBox").value;
document.getElementById("display_div_id").innerHTML = "1 / " + totalSims;
var firstDoor = -1;
var montyOpenDoor = -1;
var secondDoor = -1;
var prizeDoor = -1;
var totalWins = 0;
var totalLosses = 0;
var playerSwitch = document.getElementById("switchCheck").checked;
var showPrize = document.getElementById("prizeCheck").checked;

window.setGameText = function (text) {
    document.getElementById("gameText").innerHTML = text;
}

window.updateMontyVariant = function (variant) {
    montyVariant = variant;
    console.log('montyVariant', montyVariant);
}

window.updatePrizeBorder = function () {
    for(var i = 0; i < 3; i++) {
        document.getElementById("door" + (i + 1) + "btn").style.border = "solid 10px white";
    }
    if(showPrize == true) {
        document.getElementById("door" + (prizeDoor + 1) + "btn").style.border = "solid 10px red";
    }
}

window.gameSetPrizeDoor = function () {
    prizeDoor = Math.floor(Math.random() * 3);
    updatePrizeBorder();
}

gameSetPrizeDoor();

window.setShowPrize = function (value) {
    showPrize = value;
    updatePrizeBorder();
}

window.setPlayerSwitch = function (value) {
    playerSwitch = value;
}

window.openDoor = function (door) {
    if(prizeDoor == door) {
        document.getElementById("door" + (door + 1) + "img").src = "img/carDoor.png";
    }
    else {
        document.getElementById("door" + (door + 1) + "img").src = "img/goatDoor.png";
    }
}

window.openAllDoors = function () {
    for(var i = 0; i < 3; i++) {
        if(prizeDoor == i) {
            document.getElementById("door" + (i + 1) + "img").src = "img/carDoor.png";
        }
        else {
            document.getElementById("door" + (i + 1) + "img").src = "img/goatDoor.png";
        }
    }
}

window.selectDoor = function (door, color) {
    document.getElementById("door" + (door + 1) + "btn").style.backgroundColor = color;
}

window.closeAllDoors = function () {
    document.getElementById("door1img").src = "img/closedDoor.png";
    document.getElementById("door2img").src = "img/closedDoor.png";
    document.getElementById("door3img").src = "img/closedDoor.png";
}

window.deselectDoors = function () {
    document.getElementById("door1btn").style.backgroundColor = "white";
    document.getElementById("door2btn").style.backgroundColor = "white";
    document.getElementById("door3btn").style.backgroundColor = "white";
}

window.switchDoors = function() {
    if(firstDoor == 0) {
        if(montyOpenDoor == 1) {
            secondDoor = 2;
        }
        else {
            secondDoor = 1;
        }
    }
    else if(firstDoor == 1) {
        if(montyOpenDoor == 0) {
            secondDoor = 2;
        }
        else {
            secondDoor = 0;
        }
    }
    else {
        if(montyOpenDoor == 1) {
            secondDoor = 0;
        }
        else {
            secondDoor = 1;
        }
    }
}

window.gameFirstMove = function () {
    firstDoor = Math.floor(Math.random() * 3);
    selectDoor(firstDoor, "yellow");
    setGameText(`You chose door ${firstDoor + 1}. Monty will open a door.`);
}

// NOT DONE
window.gameStandardMonty = function () {
    do {
        montyOpenDoor = Math.floor(Math.random() * 3);
    } while (montyOpenDoor == firstDoor);
    return true;
}

// NOT DONE
window.gameIgnorantMonty = function () {
    do {
        montyOpenDoor = Math.floor(Math.random() * 3);
    } while (montyOpenDoor == firstDoor);
    return true;
}

// DONE
window.gameAngelicMonty = function () {
    if(firstDoor == prizeDoor) {
        return false;
    }
    do {
        montyOpenDoor = Math.floor(Math.random() * 3);
    } while (montyOpenDoor == firstDoor || montyOpenDoor == prizeDoor);
    return true;
}

// NOT DONE
window.gameEvilMonty = function () {
    do {
        montyOpenDoor = Math.floor(Math.random() * 3);
    } while (montyOpenDoor == firstDoor);
    return true;
}

// NOT DONE
window.gameMontyFromHell = function () {
    do {
        montyOpenDoor = Math.floor(Math.random() * 3);
    } while (montyOpenDoor == firstDoor);
    return true;
}

window.gameDetermineMontyMove = function () {
    if(montyVariant == "Standard Monty") {
        return gameStandardMonty();
    }
    else if(montyVariant == "Ignorant Monty") {
        return gameIgnorantMonty();
    }
    else if(montyVariant == "Angelic Monty") {
        return gameAngelicMonty();
    }
    else if(montyVariant == "Evil Monty") {
        return gameEvilMonty();
    }
    else {
        return gameMontyFromHell();
    }
}

window.gameMontyMove = function () {
    // if Monty opened a door and is allowing a switch
    if(gameDetermineMontyMove() == true) {
        console.log(`monty picked ${montyOpenDoor} - you picked ${firstDoor}`);
        openDoor(montyOpenDoor);
        selectDoor(montyOpenDoor, "cyan");
        if(montyOpenDoor == prizeDoor) {
            console.log("You lost -mmmmmmmmmmmmmmm");
            setGameText(`Monty opened door ${montyOpenDoor + 1}.`);
            gameTriggerEnd(false);
            return true;
        }
        
        setGameText(`Monty opened door ${montyOpenDoor + 1}. Will you switch?`);
    }
    // if Monty didn't open a door and won't allow a switch
    else {
        setGameText(`Monty didn't give you the option to switch.`);
        gameTriggerEnd(firstDoor == prizeDoor);
        return true;
    }
    return false;
}

window.gameSecondMove = function () {
    secondDoor = Math.floor(Math.random() * 3);
    if(playerSwitch == true) {
        switchDoors();
        setGameText(`You switched from door ${firstDoor} to door ${secondDoor}.`);
    }
    else {
        secondDoor = firstDoor;
        setGameText(`You chose to stick with door ${firstDoor}.`);
    }
    selectDoor(firstDoor, "white");
    selectDoor(secondDoor, "yellow");
}

window.gameTriggerEnd = function (win) {
    console.log("The prize door was", prizeDoor);
    openAllDoors();
    simsRuns++;
    if(win) {
        console.log("You won");
        setGameText(document.getElementById("gameText").innerHTML + " You won.");
        totalWins++;
        document.getElementById("wins").innerHTML = totalWins;
    }
    else {
        console.log("You lost");
        setGameText(document.getElementById("gameText").innerHTML + " You lost.");
        totalLosses++;
        document.getElementById("losses").innerHTML = totalLosses;
    }
    updateCurrentSim();
    if(totalLosses !== 0) {
        document.getElementById("wl").innerHTML = totalWins / totalLosses;
    }
    updateProgBar();
}

window.gameReset = function () {
    console.log("game resetting");
    gameState = 0;
    gameSetPrizeDoor();
    deselectDoors();
    closeAllDoors();
    setGameText("Pick a door.");
}

window.updateCurrentSim = function () {
    if(simsRuns < totalSims) {
        document.getElementById("display_div_id").innerHTML = simsRuns + 1 + " / " + totalSims;
    }
    else {
        document.getElementById("display_div_id").innerHTML ="Finished simulations";
    }
}

window.updateTotalSims = function (newTotal) {
    totalSims = newTotal;
    updateCurrentSim();
    updateProgBar();
    console.log("new total sims =", totalSims);
}

window.updateProgBar = function (newTotal) {
    document.getElementById("progBarSpan").style.width = (100 * simsRuns / totalSims) + "%";
    if(simsRuns == totalSims) {
        document.getElementById("progBarSpan").style.borderTopRightRadius = "20px";
        document.getElementById("progBarSpan").style.borderBottomRightRadius = "20px";
    }
    else {
        document.getElementById("progBarSpan").style.borderTopRightRadius = "8px";
        document.getElementById("progBarSpan").style.borderBottomRightRadius = "8px";
    }
}

window.gameStep = function () {
    if(simsRuns >= totalSims) {
        console.log("Cannot step: finished simulations");
        return;
    }
    if(gameState == 0) {
        gameFirstMove(Math.random);
    }
    else if(gameState == 1) {
        if(gameMontyMove() == true) {
            gameState = 3;
            return;
        }
    }
    else if(gameState == 2) {
        gameSecondMove();
        gameTriggerEnd(prizeDoor == secondDoor);
    }
    
    gameState++;
    if(gameState == states.length) {
        gameReset();
    }
    console.log(`gameState: ${states[gameState]} (${gameState})`);
}

window.gameNext = function () {
    console.log("just clicked next:")
    if(simsRuns >= totalSims) {
        console.log("Cannot step: finished simulations");
        return;
    }
    do {
        window.gameStep();
    } while(gameState !== states.length - 1);
}

window.gameRunAll = function () {
    console.log("just clicked run all:")
    if(simsRuns >= totalSims) {
        console.log("Cannot step: finished simulations");
        return;
    }
    while(simsRuns < totalSims) {
        console.log("current sims run:", simsRuns);
        window.gameNext();
    }
    console.log("just finished run all:")
}
