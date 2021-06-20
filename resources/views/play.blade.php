<!DOCTYPE HTML>
<html>
    <head>
        <title>Monty Hall - Play Page</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/play.css') }}" rel="stylesheet">
    </head>
    <x-navigation/>
    <h1>Let's Make a Deal!!</h1>
    <body>
        <p>Behind one of the door is a car!</p>
        <p>Behind other doors are goats...</p>
        <button name="door1" type="button" value="bar" onclick="" > <img src='img/door1.png' width=200 height=400> </button>
        <button name="door2" type="button" value="bar" onclick="" > <img src='img/door2.png' width=200 height=400> </button>
        <button name="door3" type="button" value="bar" onclick="" > <img src='img/door3.png' width=200 height=400> </button>
        <img src='img/monty.jpeg' width=200 height=150>
        <p>Open a door by clicking on it</p>
    </body>
    <x-footer/>
</html>
