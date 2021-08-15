<div id="container">
    <h1>Let's Make a Deal!!</h1>
    <p>Behind one of the doors is a car! Behind the others are goats...</p>
    <!-- <p>Behind other doors are goats...</p> -->
    <p> {{ $gameText }} </p>
    <!--<p id="gameText">Pick a Door</p>-->
    <button class="{{ $door1backgroundcolor }}" id="door1btn" name="door1" type="button" value="bar" onclick="playDoor(0)" > <img id="door1img" src='{{ $door1imgsrc }}' width=200 height=400> </button>
    <button class="{{ $door2backgroundcolor }}" id="door2btn" name="door2" type="button" value="bar" onclick="playDoor(1)" > <img id="door2img" src='{{ $door2imgsrc }}' width=200 height=400> </button>
    <button class="{{ $door3backgroundcolor }}" id="door3btn" name="door3" type="button" value="bar" onclick="playDoor(2)" > <img id="door3img" src='{{ $door3imgsrc }}' width=200 height=400> </button>
    <!-- <img src='img/monty.jpeg' width=200 height=150>
    <p>Open a door by clicking on it</p> -->
</div>
<button id="resetButton" onclick="gameReset()">Reset</button>
