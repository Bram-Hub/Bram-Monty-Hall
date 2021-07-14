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

window.gameSetPrizeDoor = function () {
    prizeDoor = Math.floor(Math.random() * 3);
}

gameSetPrizeDoor();

window.gameFirstMove = function () {
    firstDoor = Math.floor(Math.random() * 3);
}

window.gameMontyMove = function () {
    do {
        montyOpenDoor = Math.floor(Math.random() * 3);
    } while (montyOpenDoor !== firstDoor);
    if(montyOpenDoor == prizeDoor) {
        console.log("You lost -mmmmmmmmmmmmmmm");
        gameTriggerEnd(false);
    }
}

window.gameSecondMove = function () {
    secondDoor = Math.floor(Math.random() * 3);
}

window.gameTriggerEnd = function (win) {
    
    console.log("The prize door was", prizeDoor);
    
    gameState = 0;
    gameSetPrizeDoor();
    simsRuns++;
    if(win) {
        console.log("You won");
        totalWins++;
        document.getElementById("wins").innerHTML = totalWins;
    }
    else {
        console.log("You lost");
        totalLosses++;
        document.getElementById("losses").innerHTML = totalLosses;
    }
    updateCurrentSim();
    if(totalLosses !== 0) {
        document.getElementById("wl").innerHTML = totalWins / totalLosses;
    }
    updateProgBar();
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
        gameMontyMove();
        if(gameState == 0) {
            return;
        }
    }
    else if(gameState == 2) {
        gameSecondMove();
    }
    
    gameState++;
    if(gameState == states.length) {
        gameTriggerEnd(true);
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
    } while(gameState !== 0);
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
