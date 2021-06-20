<head>
    <title>Monty Hall - Research Page</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/simulator.css') }}" rel="stylesheet">
</head>
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
<script src="{{ URL::asset('js/simulator.js') }}"></script>