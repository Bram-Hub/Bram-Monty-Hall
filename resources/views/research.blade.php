<!DOCTYPE HTML>
<html>
    <head>
        <title>Monty Hall - Research Page</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/research.css') }}" rel="stylesheet">
        <script src="{{ URL::asset('js/game.js') }}" type="text/javascript" defer></script>
    </head>
    <body>
        <x-navigation/>
        <div class="page">
            <section class="right">
                <section id="game">
                    <h2 id="gameText">Pick a door.</h2>
                    <div class="center">
                        <button class="doorButton" id="door1btn">
                            <img src="img/closedDoor.png" alt="Door #1" class="door" id="door1img">
                        </button>
                        <button class="doorButton" id="door2btn">
                            <img src="img/closedDoor.png" alt="Door #2" class="door" id="door2img">
                        </button>
                        <button class="doorButton" id="door3btn">
                            <img src="img/closedDoor.png" alt="Door #3" class="door" id="door3img">
                        </button>
                        <br/>
                        <br/>
                        <br/>
                    </div>
                </section>
            </section>
            <section class="left">
                <div id="error"></div>
                <div id="settingsArea">
                    <div class="montySelection">
                        <label for="montySelect">Choose a variation of Monty to test: <br/> </label>
                        <select name="montySelect" id="montySelect" onchange="updateMontyVariant(this.value)">
                            <option>Standard Monty</option>
                            <option>Ignorant Monty</option>
                            <option>Angelic Monty</option>
                            <option>Evil Monty</option>
                            <option>Monty from Hell</option>
                        </select>
                    </div>
                    <div class="box">
                        <label for="switchCheck">Player should switch:</label>
                        <input type="checkbox" id="switchCheck" onchange="setPlayerSwitch(this.checked)">
                    </div>
                    <div class="box">
                        <label for="simCount"> Choose how many simulations to run: <br/> </label>
                        <input type="number" id="simCountBox" value="10" placeholder="#" min="0" max="10000"
                            onchange="updateTotalSims(this.value)">
                    </div>
                    <div class="box">
                        <button id="stepBtn" onclick="gameStep()">Step</button>
                        <button id="nextBtn" onclick="gameNext()">Next</button>
                        <button id="runAllBtn" onclick="gameRunAll()">Run All</button>
                    </div>
                    <div class="box">
                        <label for="prizeCheck">Show prize:</label>
                        <input type="checkbox" id="prizeCheck" onchange="setShowPrize(this.checked)">
                    </div>
                    <div class="box">
                        <label for="animSpeedBox">Animation speed: <br/></label>
                        <input type="number" id="animSpeedBox" value="1" placeholder="#" min="0" max="5"
                            onchange="updateAnimSpeed(this.value)">
                    </div>
                </div>
                <div id="dataArea">
                    <div class="box">
                        <div id="currSimInfo">
                            <label for="id_main_container">Current Simulation: </label>
                            <div class="main_container" id="id_main_container">
                                <div class="container_inner" id="display_div_id"></div>
                            </div>
                        </div>
                        <button id="graphBtn">Display graphs</button>
                        <div class="progBar">
                            <span id="progBarSpan" style="width: 0%"></span>
                        </div>
                        <div id="wlNums">
                            <span>Wins: <span id="wins">0</span></span>
                            <span>Losses: <span id="losses">0</span></span>
                            <span>W/L: <span id="wl">-</span></span>
                            <span>Win %: <span id="winPercent">-</span> </span>
                            <span>Monty Opened Prize: <span id="montyOpenedPrize">0</span> </span>
                        </div>
                        <p id="switchTitleText">Stats when player DID get a chance to switch:</p>
                        <div id="wlNumsSwitch">
                            <span>Wins: <span id="winsWithSwitch">0</span> </span>
                            <span>Losses: <span id="lossesWithSwitch">0</span> </span>
                            <span>Total: <span id="totalWithSwitch">10</span> </span>
                            <span>Win %: <span id="winPercentWithSwitch">-</span> </span>
                        </div>
                        <br/>
                        <button id="resetBtn" onclick="simReset()">Reset</button>
                    </div>
                </div>
            </section>
        </div>
        <x-footer/>
    </body>
</html>
