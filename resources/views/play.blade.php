<!DOCTYPE HTML>
<html>
    <head>
        <title>Monty Hall - Play Page</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/play.css') }}" rel="stylesheet">
        <script src="{{ URL::asset('js/game.js') }}" type="text/javascript" defer></script>
    </head>
    <body>
        <x-navigation/>
        <div id="container">
            <h1>Let's Make a Deal!!</h1>
            <p>Behind one of the doors is a car! Behind the others are goats...</p>
            <!-- <p>Behind other doors are goats...</p> -->
            <p id="gameText">Pick a Door</p>
            <button id="door1btn" name="door1" type="button" value="bar" onclick="playDoor(0)" > <img id="door1img" src='img/closedDoor.png' width=200 height=400> </button>
            <button id="door2btn" name="door2" type="button" value="bar" onclick="playDoor(1)" > <img id="door2img" src='img/closedDoor.png' width=200 height=400> </button>
            <button id="door3btn" name="door3" type="button" value="bar" onclick="playDoor(2)" > <img id="door3img" src='img/closedDoor.png' width=200 height=400> </button>
            <!-- <img src='img/monty.jpeg' width=200 height=150>
            <p>Open a door by clicking on it</p> -->
        </div>
        <x-footer/>
    </body>
</html>
