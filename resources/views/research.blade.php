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
                    Monty Hall Simulator
                    <div class="center">
                        <button class="doorButton">
                            <img src="img/closedDoor.png" alt="Door #1" class="door">
                        </button>
                        <button class="doorButton">
                            <img src="img/closedDoor.png" alt="Door #2" class="door">
                        </button>
                        <button class="doorButton">
                            <img src="img/closedDoor.png" alt="Door #3" class="door">
                        </button>
                        <br/>
                    </div>
                </section>
            </section>
            <section class="left">
                <div id="error"></div>
                <div id="settingsArea">
                    <div class="montySelection">
                        <label for="montySelect">Choose a variation of Monty to test: <br/> </label>
                        <select name="montySelect" id="montySelect" onchange="console.log('montyVariant', this.value)">
                            <option>Standard Monty</option>
                            <option>Ignorant Monty</option>
                            <option>Angelic Monty</option>
                            <option>Evil Monty</option>
                            <option>Monty from Hell</option>
                        </select>
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
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <x-footer/>
    </body>
</html>
