<!DOCTYPE HTML>
<html>
    <head>
        <title>Monty Hall - Research Page</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/research.css') }}" rel="stylesheet">
    </head>
    <x-navigation/>
    <body>
        <div class="page">
            <section class="right">
                <section id="game">
                <!-- Game content here -->
                The actual Monty-Hall Simulation will go here.
                    <center>
                        <a href="#">
                            <img src="img/closedDoor.png" alt="Door #1" class="door">
                        </a>
                        <a href="#">
                            <img src="img/closedDoor.png" alt="Door #2" class="door">
                        </a>
                        <a href="#">
                            <img src="img/closedDoor.png" alt="Door #3" class="door">
                        </a>
                        <br/>
                    </center>
                </section>
            </section>
            <section class="left">
                <div id="error"></div>
                <div id="settingsArea">
                    <div class="montySelection">
                        <label for="montySelect">Choose a variation of Monty to test: <br/> </label>
                        <select  name="montySelect" id="montySelect">
                            <option>Standard Monty</option>
                            <option>Ignorant Monty</option>
                            <option>Angelic Monty</option>
                            <option>Evil Monty</option>
                            <option>Monty from Hell</option>
                        </select>
                    </div>
                    <div class="box">
                        <label for="simCount"> Choose how many simulations to run: <br/> </label>
                        <input type="number" id="simCountBox" placeholder="#" min="0" max="10000">
                    </div>
                    <div class="box">
                        <span><button id="stepBtn" onclick="step()">Step</button></span>
                        <span><button id="nextBtn" onclick="next()">Next</button> </span>
                        <span><button id="runAllBtn" onclick="runAll()">Run All</button></span>
                    </div>
                    <div class="box">
                        <label for="prizeCheck">Show prize:</label>
                        <input type="checkbox" id="prizeCheck">
                    </div>
                    <div class="box">
                        <label for="animSpeedBox">Animation speed: <br/></label>
                        <input type="number" id="animSpeedBox" placeholder="#" min="0" max="10000">
                    </div>
                </div>
                <div id="dataArea">
                    <div class="box">
                        <div id="currSimInfo">
                            <label for="id_main_container">Current Simulation: </label>
                            <div class="main_container" id="id_main_container">
                                <div class="container_inner" id="display_div_id">
                                </div>
                            </div>
                        </div>
                        <button id="graphBtn">Display graphs</button>
                        <div class="progBar">
                            <span style="width: 25%"></span>
                        </div>
                        <div id="wlNums">
                            <span>Wins: </span><span id="wins"></span>
                            <span>Losses: </span><span id="losses"></span>
                            <span>W/L: </span><span id="wl"></span>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </body>
    <x-footer/>
    <script>
        var counter = 0;
        var display_str = "";
        var display_div = document.getElementById("display_div_id");
        var simulationCount = document.getElementById("simCountBox");
        var wins = 0;
        var losses = 0;
        var winCount = document.getElementById("wins");
        var lossCount = document.getElementById("losses");
        var wl = document.getElementById("wl");

        function step(){
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
        function next(){
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
        function runAll(){
        clearCount();
        if(simulationCount.value == "#" || simulationCount.value == counter || simulationCount.value > simulationCount.max){
        counter = 0;
        errorMessage("Invalid input");
        return;
        }
        maxCount();
        displayCount();
        }
        function incrementCount(amountIncrease){
        counter+=amountIncrease;
        }
        function displayCount(){
        display_str = counter.toString() + "/" + simulationCount.value;
        for (var i = 0; i < display_str.length; i++) {
        var new_span = document.createElement('span');
        new_span.className = 'num_tiles';
        new_span.innerText = display_str[i];
        display_div.appendChild(new_span);
        }
        }
        function clearCount(){
        while (display_div.hasChildNodes()) {
        display_div.removeChild(display_div.lastChild);
        }
        }
        function maxCount(){
        counter = simulationCount.value;
        }

        function errorMessage(errorText) {
        var error = document.getElementById("error")
        error.textContent = errorText;
        }

        function incrementWins(){
        wins++;
        winCount.innerHTML = wins.toString();
        wl.innerHTML = (wins/losses).toString();
        }
        function incrementLosses(){
        losses++;
        lossCount.innerHTML = losses.toString();
        wl.innerHTML = (wins/losses).toString();
        }
        function resetWL(){
        wins = 0;
        losses = 0;
        winCount.innerHTML = "";
        lossCOunt.innerHTML = "";
        wl.innerHTML = "";
        }
    </script>
</html>