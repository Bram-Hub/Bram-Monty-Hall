<!DOCTYPE HTML>
<html>
    <head>
        <title>Monty Hall - Database Page</title>
        <link href="{{ URL::asset('css/database.css') }}" rel="stylesheet"/>
    </head>
    <body>
        <x-navigation/>
        <h1 class="pagetitle">Monty Hall - Database Page</h1>
        <p>Explore long term results of simulation data below:</p>
        <div>
            <div class="tabtoggle">
                <span>
                    <button class="tablinks" onclick="selectTable('play')">
                        Play Mode Data
                    </button>
                </span>
                <span>
                    <button class="tablinks" onclick="selectTable('sim')">
                        Simulation Data
                    </button>
                </span>
                <span>
                    <button class="tablinks" onclick="selectTable('both')">
                        Both
                    </button>
                </span>
            </div>
            <div id="play" class="dataCategory" style="display: block">
                <h1>Play Data</h1>
                <p>Display Play Data</p>
            </div>
            <div id="sim" class="dataCategory" style="display:none">
                <h1>Sim Data</h1>
                <p>Display Sim Data</p>
            </div>
            <div id="both" class="dataCategory" style="display:none">
                <h1>Both Play and Sim Data</h1>
                <p>Display all data</p>
            </div>
        </div>
    </body>
    <script>
    function selectTable(dataCategory) {
        var i;
        var x = document.getElementsByClassName("dataCategory");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        document.getElementById(dataCategory).style.display = "block";
    }
    </script>
</html>
