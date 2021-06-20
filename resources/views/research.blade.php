<!DOCTYPE HTML>
<html>
<head>
    <title>Monty Hall - Research Page</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/research.css') }}" rel="stylesheet">
</head>
<body>
    <x-navigation/>
    <section id="game" class="h0 float-right bg-green-300 m-10 text-3xl flex items-center justify-center"
        style="width: 48rem; height: 36rem">
        <!-- Game content here -->
        The actual Monty-Hall Simulation will go here.
    </section>
    
    <section id="settingsArea" class="w-72 relative m-4 p-3 relative z-10">
        <select class="w-full h-10 mb-2 pl-3 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none
            focus:shadow-outline">
            <option>Standard Monty</option>
            <option>Ignorant Monty</option>
            <option>Angelic Monty</option>
            <option>Evil Monty</option>
            <option>Monty from Hell</option>
        </select>
        
        <div class="mb-2">
            <span class="text-xl">Simulations:</span>
            <input type="number" id="simCountBox" placeholder="#" min="0" max="10000"
                class="appearance-none float-right h-8 w-20 bg-white-200 text-gray-700 border border-gray-500 rounded
                    px-1 text-center">
        </div>
        <div class="w-full mb-2">
            <button id="stepBtn" class="w-32 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Step</button>
            <button id="nextBtn" class="w-32 float-right bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Next</button>
            <button id="runAllBtn" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold mt-2 py-2 px-4 rounded">Run All</button>
        </div>
        
        <div class="text-xl mb-2">
            Show prize:
            <input type="checkbox" id="prizeCheck">
        </div>
        
        <div class="mb-2">
            <span class="text-xl">Animation speed:</span>
            <input type="number" id="animSpeedBox" placeholder="#" min="0" max="10000"
                class="appearance-none float-right h-8 w-20 bg-white-200 text-gray-700 border border-gray-500 rounded px-1 text-center">
        </div>
    </section>
    
    <div id="dataArea" class="m-4 p-3">
        <div id="currSimInfo" class="text-xl mb-4">
            Current Simulation: <span id="currSimBox"></span> / <span id="totalSimsBox"></span>
        </div>
        <button id="graphBtn" class="w-48 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Display graphs</button>
        <div id="progBar" class="overflow-hidden h-8 mt-4 text-xs flex rounded bg-gray-200 border border-gray-400">
            <div style="width:30%" class="shadow-none flex flex-col border-right border-gray-400 text-center whitespace-nowrap
                text-white justify-center bg-green-600"></div>
        </div>
        <div id="wlNums" class="text-xl mt-4 p-4 flex justify-evenly border border-gray-500">
            <span class="flex-col">Wins: </span><span id="wins"></span>
            <span class="flex-col">Losses: </span><span id="losses"></span>
            <span class="flex-col">W/L: </span><span id="wl"></span>
        </div>
    </div>
</body>
<x-footer/>
</html>
