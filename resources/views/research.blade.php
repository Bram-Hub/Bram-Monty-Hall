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
                    Monty Hall Simulator
                    <center>
                        <button onclick="clickDoor1()" class="doorButton">
                            <img src="img/closedDoor.png" alt="Door #1" id="door1" class="door">
                        </button>
                        <button onclick="clickDoor2()" class="doorButton">
                            <img src="img/closedDoor.png" alt="Door #2" id="door2" class="door">
                        </button>
                        <button onclick="clickDoor3()" class="doorButton">
                            <img src="img/closedDoor.png" alt="Door #3" id="door3" class="door">
                        </button>
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
    <script src="{{ URL::asset('js/research.js') }}"></script>
</html>