var gameState = 0;
var states = ["firstMove", "montyMove", "secondMove", "end"];
var montyVariant;// = document.getElementById("montySelect").value;
var simsRuns = 0;
var totalSims;// = document.getElementById("simCountBox").value;
//document.getElementById("display_div_id").innerHTML = "1 / " + totalSims;
var firstDoor = -1;
var montyOpenDoor = -1;
var secondDoor = -1;
var prizeDoor = -1;
var totalWins = 0;
var totalLosses = 0;
var montyOpenedPrize = 0;
var totalWinsSwitch = 0;
var totalLossesSwitch = 0;
var playerSwitch;// = document.getElementById("switchCheck").checked;
var showPrize;// = document.getElementById("prizeCheck").checked;
var page; //true for research, false for play
var animSpeed = 0;
var changed = false;
var started = false;
var lastWinsSwitched = 0;
var lastTotalSwitches = 0;
var lastTotalLosses = 0;
var lastTotalWins = 0;
var lastTotalSimulations = 0;
// Custom Monty settings
var cmOpenProbs = [0.0, 0.0, 0.0];
var cmAllowOpenSelected;
var cmAllowOpenPrize;
// Player Settings
var pOpenProbs = [0.0, 0.0, 0.0];
var pSwitchMatrix = [[0.0, 0.0, 0.0], [0.0, 0.0, 0.0], [0.0, 0.0, 0.0]];

window.setTotalSims = function () {
    var scb = document.getElementById("simCountBox").value;
    if(scb < simsRuns) {
        document.getElementById("simCountBox").value = simsRuns;
    }
    else {
        totalSims = scb;
    }
}

//determine whether on play page or research page
window.addEventListener('load', () => {
    if (window.document.documentURI.includes("research")) {
        console.log("Research Page")
        page = true;
        montyVariant = document.getElementById("montySelect").value;
        setTotalSims();
        document.getElementById("display_div_id").innerHTML = "1 / " + totalSims;
        playerSwitch = document.getElementById("switchCheck").checked;
        showPrize = document.getElementById("prizeCheck").checked;
        gameSetPrizeDoor();
        for(var i = 0; i < 3; i++) {
            var num = parseFloat(document.getElementById("cmTableText" + (i + 1)).value);
            if(num >= 0 && num <= 1) {
                cmOpenProbs[i] = num;
            }
            num = parseFloat(document.getElementById("pTableText" + (i + 1)).value);
            if(num >= 0 && num <= 1) {
                pOpenProbs[i] = num;
            }
            for(var j = 0; j < 3; j++) {
                if(i != j){
                    num = parseFloat(document.getElementById("pTableText" + (i + 1) + (j + 1)).value);
                    if(num >= 0 && num <= 1) {
                        pSwitchMatrix[i][j] = num;
                    }
                }
            }
        }
        cmAllowOpenSelected = document.getElementById("cmAllowOpenSelected").checked;
        cmAllowOpenPrize = document.getElementById("cmAllowOpenPrize").checked;
        document.getElementById("cmTable").style.visibility = montyVariant == "Custom Monty" ? "visible" : "hidden";
    }
    else {
        console.log("Play Page")
        page = false;
        //randomize the monty type and prize door
        var randomMonty = Math.floor(Math.random() * 5);
        var montyDict = {
            0: "Standard Monty",
            1: "Ignorant Monty",
            2: "Angelic Monty",
            3: "Evil Monty",
            4: "Monty from Hell",
            5: "Custom Monty"
        }
        montyVariant = montyDict[randomMonty];
        prizeDoor = Math.floor(Math.random() * 3);
        console.log(montyVariant + " Prize Door: " + String(prizeDoor + 1));
    }
})

window.playDoor = function(doorClicked) {
    if (gameState == 0) {
        window.livewire.emit('disable-switch', "disabled");
        firstDoor = doorClicked;
        selectDoor(firstDoor, "yellow"); //#fffd6b
        setTimeout(function() {
            if (!gameMontyMove()) {
                window.livewire.emit('disable-switch', "");
            }
            gameState = 2;
        }, 700);
    }
    else if (doorClicked != montyOpenDoor) { //implies secondMove
        window.livewire.emit('disable-switch', "disabled");
        if (doorClicked == firstDoor) {
            //did not switch
            playerSwitch = false;
        }
        else {
            playerSwitch = true;
        }
        gameSecondMove();
        setTimeout(function() {
            gameTriggerEnd(doorClicked == prizeDoor);
        }, 700)
    }
}

window.setGameText = function (text) {
    window.livewire.emit('set-game-text', text);
}

window.updateMontyVariant = function (variant) {
    montyVariant = variant;
    if(started) {
        changed = true;
    }
    if(variant == "Custom Monty") {
        document.getElementById("cmTable").style.visibility = "visible";
    }
    else {
        document.getElementById("cmTable").style.visibility = "hidden";
    }
}

window.updatePrizeBorder = function () {
    for(var i = 0; i < 3; i++) {
        window.livewire.emit('set-border-color', i + 1, "white");
    }
    if(showPrize == true) {
        window.livewire.emit('set-border-color', prizeDoor + 1, "green"); //#9fff9c
    }
}

window.gameSetPrizeDoor = function () {
    prizeDoor = Math.floor(Math.random() * 3);
    if(page) {
        updatePrizeBorder();
    }
}

window.setCMAllowOpenSelected = function (value) {
    cmAllowOpenSelected = value;
}

window.setCMAllowOpenPrize = function (value) {
    cmAllowOpenPrize = value;
}

window.setValidInput = function (id) {
    document.getElementById(id).style.backgroundColor = "white";
}

window.setInvalidInput = function (id) {
    document.getElementById(id).style.backgroundColor = "#ffd4d1";
}

window.cmValidProbs = function () {
    var sum = 0.0;
    for(var i = 0; i < 3; i++) {
        sum += cmOpenProbs[i];
    }
    return sum == 1.0;
}

window.updateCMProb = function (value, index) {
    
    // make sure the text is a number
    if(isNaN(value - parseFloat(value))) {
        setInvalidInput("cmTableText" + (index + 1));
        return;
    }
    // make sure the number is in the range 0-1
    if(parseFloat(value) < 0 || parseFloat(value) > 1) {
        setInvalidInput("cmTableText" + (index + 1));
        return;
    }
    
    setValidInput("cmTableText" + (index + 1));
    cmOpenProbs[index] = parseFloat(value);
    
    // make sure the checkboxes are disabled if at least one probability value is 0
    var disableCMChecks = false;
    for(var i = 0; i < 3; i++) {
        if(cmOpenProbs[i] == 0.0) {
            disableCMChecks = true;
        }
    }
    if(disableCMChecks) {
        document.getElementById("cmAllowOpenSelected").disabled = true;
        document.getElementById("cmAllowOpenPrize").disabled = true;
        document.getElementById("cmAllowOpenSelected").checked = true;
        document.getElementById("cmAllowOpenPrize").checked = true;
        cmAllowOpenSelected = true;
        cmAllowOpenPrize = true;
    }
    else {
        document.getElementById("cmAllowOpenSelected").disabled = false;
        document.getElementById("cmAllowOpenPrize").disabled = false;
    }
}

window.updatePProb = function (value, index) {
    
    // make sure the text is a number
    if(isNaN(value - parseFloat(value))) {
        setInvalidInput("pTableText" + (index + 1));
        return;
    }
    // make sure the number is in the range 0-1
    if(parseFloat(value) < 0 || parseFloat(value) > 1) {
        setInvalidInput("pTableText" + (index + 1));
        return;
    }
    
    setValidInput("pTableText" + (index + 1));
    pOpenProbs[index] = parseFloat(value);
    console.log(pOpenProbs);
}

window.updatePMat = function (value, indexR, indexC) {
    
    // make sure the text is a number
    if(isNaN(value - parseFloat(value))) {
        setInvalidInput("pTableText" + (indexR + 1) + (indexC + 1));
        return;
    }
    // make sure the number is in the range 0-1
    if(parseFloat(value) < 0 || parseFloat(value) > 1) {
        setInvalidInput("pTableText" + (indexR + 1) + (indexC + 1));
        return;
    }
    
    setValidInput("pTableText" + (indexR + 1) + (indexC + 1));
    pSwitchMatrix[indexR][indexC] = parseFloat(value);
    console.log(pSwitchMatrix);
}

window.setShowPrize = function (value) {
    showPrize = value;
    updatePrizeBorder();
}

window.setPlayerSwitch = function (value) {
    playerSwitch = value;
    if(started) {
        changed = true;
    }
}

window.openDoor = function (door) {
    if(prizeDoor == door) {
        window.livewire.emit('set-img-src', door + 1, "img/carDoor.png");
    }
    else {
        window.livewire.emit('set-img-src', door + 1, "img/goatDoor.png");
    }
}

window.openAllDoors = function () {
    for(var i = 0; i < 3; i++) {
        if(prizeDoor == i) {
            window.livewire.emit('set-img-src', i + 1, "img/carDoor.png");
        }
        else {
            window.livewire.emit('set-img-src', i + 1, "img/goatDoor.png");
        }
    }
}

window.selectDoor = function (door, color) {
    window.livewire.emit('set-background-color', door + 1, color);
}

window.closeAllDoors = function () {
    window.livewire.emit('set-img-src', 1, "img/closedDoor.png");
    window.livewire.emit('set-img-src', 2, "img/closedDoor.png");
    window.livewire.emit('set-img-src', 3, "img/closedDoor.png");
}

window.deselectDoors = function () {
    window.livewire.emit('set-background-color', 1, "white");
    window.livewire.emit('set-background-color', 2, "white");
    window.livewire.emit('set-background-color', 3, "white");
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
    selectDoor(firstDoor, "yellow"); //#fffd6b
    setGameText(`You chose door ${firstDoor + 1}. Monty will open a door.`);
}

// DONE
window.gameStandardMonty = function () {
    do {
        montyOpenDoor = Math.floor(Math.random() * 3);
    } while ((montyOpenDoor == firstDoor) || (montyOpenDoor == prizeDoor));
    return true;
}

// DONE
window.gameIgnorantMonty = function () {
    do {
        montyOpenDoor = Math.floor(Math.random() * 3);
    } while (montyOpenDoor == firstDoor);
    return true;
}

// DONE
window.gameAngelicMonty = function () {
    if(firstDoor == prizeDoor) {
        montyOpenDoor = firstDoor;
        return false;
    }
    do {
        montyOpenDoor = Math.floor(Math.random() * 3);
    } while (montyOpenDoor == firstDoor || montyOpenDoor == prizeDoor);
    return true;
}

// DONE
window.gameEvilMonty = function () {
    if(firstDoor != prizeDoor) {
        montyOpenDoor = prizeDoor;
        return true;
    }
    do {
        montyOpenDoor = Math.floor(Math.random() * 3);
    } while (montyOpenDoor == firstDoor);
    return true;
}

// DONE
window.gameMontyFromHell = function () {
    if(firstDoor != prizeDoor) {
        montyOpenDoor = firstDoor;
        return false;
    }
    do {
        montyOpenDoor = Math.floor(Math.random() * 3);
    } while (montyOpenDoor == firstDoor);
    return true;
}

// DONE
window.gameCustomMonty = function () {
    do {
        console.log("custom looooooop");
        var randDoor = Math.random();
        if(randDoor < cmOpenProbs[0]) {
            montyOpenDoor = 0;
        }
        else if(randDoor < cmOpenProbs[0] + cmOpenProbs[1]) {
            montyOpenDoor = 1;
        }
        else {
            montyOpenDoor = 2;
        }
    } while ((montyOpenDoor == firstDoor && !cmAllowOpenSelected) || (montyOpenDoor == prizeDoor && !cmAllowOpenPrize));
    return !(montyOpenDoor == firstDoor || montyOpenDoor == prizeDoor);
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
    else if(montyVariant == "Monty from Hell") {
        return gameMontyFromHell();
    }
    else {
        return gameCustomMonty();
    }
}

window.gameMontyMove = function () {
    // if Monty opened a door and is allowing a switch
    if(gameDetermineMontyMove() == true) {
        // console.log(`monty picked ${montyOpenDoor} - you picked ${firstDoor}`);
        openDoor(montyOpenDoor);
        selectDoor(montyOpenDoor, "blue"); //#bffaff
        if(montyOpenDoor == prizeDoor) {
            // console.log("You lost -mmmmmmmmmmmmmmm");
            montyOpenedPrize++;
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
    if(playerSwitch == true) {
        switchDoors();
        setGameText(`You switched from door ${firstDoor + 1} to door ${secondDoor + 1}.`);
    }
    else {
        secondDoor = firstDoor;
        setGameText(`You chose to stick with door ${firstDoor + 1}.`);
    }
    selectDoor(firstDoor, "white");
    selectDoor(secondDoor, "yellow"); //#fffd6b
}

window.gameTriggerEnd = function (win) {
    // console.log("The prize door was", prizeDoor);
    openAllDoors();
    simsRuns++;
    document.getElementById("simCountBox").min = simsRuns;
    if(win) {
        setGameText("+won");
        if (page) {
            totalWins++;
            document.getElementById("wins").innerHTML = totalWins;
        }
    }
    else {
        setGameText("+lost");
        if (page) {
            totalLosses++;
            document.getElementById("losses").innerHTML = totalLosses;
        }
    }
    if(page) {
        updateCurrentSim();
        if(totalLosses !== 0) {
            document.getElementById("wl").innerHTML = (totalWins / totalLosses).toFixed(6);
        }
        updateProgBar();
        document.getElementById("winPercent").innerHTML = String(((totalWins / (totalWins + totalLosses)) * 100).toFixed(2)) + "%";
        document.getElementById("montyOpenedPrize").innerHTML = montyOpenedPrize;
        document.getElementById("winsWithSwitch").innerHTML = totalWinsSwitch;
        document.getElementById("lossesWithSwitch").innerHTML = totalLossesSwitch;
        document.getElementById("totalWithSwitch").innerHTML = totalWinsSwitch + totalLossesSwitch;
        document.getElementById("winPercentWithSwitch").innerHTML = (totalWinsSwitch + totalLossesSwitch !== 0) ?
        String(((totalWinsSwitch / (totalWinsSwitch + totalLossesSwitch)) * 100).toFixed(2)) + "%" : "-";
    }
    else {
        document.getElementById("resetButton").style.visibility = "visible";
    }
    var montyDict = {
        "Standard Monty": 1,
        "Ignorant Monty": 2,
        "Angelic Monty": 3,
        "Evil Monty": 4,
        "Monty from Hell": 5
    }
    if (!page) {
        // if a second door was picked
        if(secondDoor != -1 && firstDoor != secondDoor) {
            window.livewire.emit('add-to-database', { monty_id: montyDict[montyVariant], door_picked: firstDoor + 1, door_opened: montyOpenDoor + 1, door_car: prizeDoor + 1, door_switched: secondDoor + 1 });
        }
        // if a second door wasn't picked
        else {
            window.livewire.emit('add-to-database', { monty_id: montyDict[montyVariant], door_picked: firstDoor + 1, door_opened: montyOpenDoor + 1, door_car: prizeDoor + 1 });
        }
    }
}

window.gameReset = function () {
    gameState = 0;
    gameSetPrizeDoor();
    deselectDoors();
    closeAllDoors();
    setGameText("Pick a door.");
    if(!page) {
        document.getElementById("resetButton").style.visibility = "hidden";
        firstDoor = -1;
        montyOpenDoor = -1;
        secondDoor = -1;
        window.livewire.emit('disable-switch', "");
        console.log(montyVariant + " Prize Door: " + String(prizeDoor + 1));
    }
}

window.simReset = function () {
    console.log("totalSims =", totalSims);
    gameState = 0;
    changed = false;
    started = false;
    deselectDoors();
    closeAllDoors();
    setGameText("Pick a door.");
    simsRuns = 0;
    document.getElementById("simCountBox").min = 0;
    document.getElementById("display_div_id").innerHTML = "1 / " + totalSims;
    firstDoor = -1;
    montyOpenDoor = -1;
    secondDoor = -1;
    gameSetPrizeDoor();
    totalWins = 0;
    totalLosses = 0;
    montyOpenedPrize = 0;
    totalWinsSwitch = 0;
    totalLossesSwitch = 0;
    lastWinsSwitched = 0;
    lastTotalSwitches = 0;
    lastTotalLosses = 0;
    lastTotalWins = 0;
    lastTotalSimulations = 0;
    document.getElementById("wins").innerHTML = "0";
    document.getElementById("losses").innerHTML = "0";
    document.getElementById("winPercent").innerHTML = "-";
    document.getElementById("montyOpenedPrize").innerHTML = "0";
    document.getElementById("winsWithSwitch").innerHTML = "0";
    document.getElementById("lossesWithSwitch").innerHTML = "0";
    document.getElementById("totalWithSwitch").innerHTML = "0";
    document.getElementById("winPercentWithSwitch").innerHTML = "-";
    updateTotalSims(totalSims);
}

window.updateCurrentSim = function () {
    if(simsRuns < totalSims) {
        document.getElementById("display_div_id").innerHTML = simsRuns + 1 + " / " + totalSims;
    }
    else if (!changed && totalSims > lastTotalSimulations && montyVariant != "Custom Monty") {
        document.getElementById("display_div_id").innerHTML ="Finished simulations";
        var montyDict = {
            "Standard Monty": 1,
            "Ignorant Monty": 2,
            "Angelic Monty": 3,
            "Evil Monty": 4,
            "Monty from Hell": 5
        }
        window.livewire.emit('add-to-database', {monty_id: montyDict[montyVariant],
        behavior: playerSwitch,
        wins_switched: (playerSwitch ? totalWinsSwitch : 0) - lastWinsSwitched,
        total_switches: (playerSwitch ? (totalWinsSwitch + totalLossesSwitch) : 0) - lastTotalSwitches,
        total_losses: totalLosses - lastTotalLosses,
        total_wins: totalWins - lastTotalWins,
        total_simulations: totalSims - lastTotalSimulations});
        
        lastWinsSwitched = playerSwitch ? totalWinsSwitch : 0;
        lastTotalSwitches = playerSwitch ? (totalWinsSwitch + totalLossesSwitch) : 0;
        lastTotalLosses = totalLosses;
        lastTotalWins = totalWins;
        lastTotalSimulations = totalSims;
        
        console.log(totalLosses + " " + totalWins + " " + totalSims);
    }
}

window.updateTotalSims = function (newTotal) {
    totalSims = newTotal;
    document.getElementById("wins").innerHTML = totalWins;
    document.getElementById("losses").innerHTML = totalLosses;
    document.getElementById("wl").innerHTML = isNaN(totalWins / totalLosses) ? "-" : (totalWins / totalLosses).toFixed(6);
    updateCurrentSim();
    updateProgBar();
}

window.updateAnimSpeed = function (newSpeed) {
    animSpeed = newSpeed;
}

window.updateProgBar = function () {
    document.getElementById("progBarSpan").style.width = Math.min((100 * simsRuns / totalSims), 100) + "%";
    if(simsRuns >= totalSims) {
        document.getElementById("progBarSpan").style.borderTopRightRadius = "20px";
        document.getElementById("progBarSpan").style.borderBottomRightRadius = "20px";
    }
    else {
        document.getElementById("progBarSpan").style.borderTopRightRadius = "8px";
        document.getElementById("progBarSpan").style.borderBottomRightRadius = "8px";
    }
}

window.gameStep = function () {
    // if Custom Monty is set and it's probabilities don't add up to 1.0
    if(montyVariant == "Custom Monty" && !cmValidProbs()) {
        alert("Custom Monty door probabilities must be 0-1 and add up to exactly 1.");
        return;
    }
    
    started = true;
    if(simsRuns >= totalSims) {
        // console.log("Cannot step: finished simulations");
        return;
    }
    if(gameState == 0) {
        gameFirstMove(Math.random);
    }
    else if(gameState == 1) {
        if(gameMontyMove() == true) {
            // player did NOT get a chance to switch
            gameState = 3;
            return;
        }
    }
    else if(gameState == 2) {
        // player DID get a chance to switch
        gameSecondMove();
        if (prizeDoor == secondDoor) {
            totalWinsSwitch++;
        }
        else {
            totalLossesSwitch++;
        }
        gameTriggerEnd(prizeDoor == secondDoor);
    }

    gameState++;
    if(gameState == states.length) {
        gameReset();
    }
    // console.log(`gameState: ${states[gameState]} (${gameState})`);
}

window.gameNext = function () {
    // if Custom Monty is set and it's probabilities don't add up to 1.0
    if(montyVariant == "Custom Monty" && !cmValidProbs()) {
        alert("Custom Monty door probabilities must add up to exactly 1.");
        return;
    }
    
    // console.log("just clicked next:")
    if(simsRuns >= totalSims) {
        // console.log("Cannot step: finished simulations");
        return;
    }
    do {
        window.gameStep();
    } while(gameState !== states.length - 1);
}

window.sleep = function(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

window.gameRunAll = async function () {
    // if Custom Monty is set and it's probabilities don't add up to 1.0
    if(montyVariant == "Custom Monty" && !cmValidProbs()) {
        alert("Custom Monty door probabilities must add up to exactly 1.");
        return;
    }
    
    if(simsRuns >= totalSims) {
        // console.log("Cannot step: finished simulations");
        return;
    }
    while(simsRuns < totalSims) {
        // console.log("current sims run:", simsRuns);
        window.gameNext();
        await sleep(animSpeed !== 0 ? 200 / animSpeed : animSpeed);
    }
}
