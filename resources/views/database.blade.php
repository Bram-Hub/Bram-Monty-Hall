<!DOCTYPE HTML>
<html>
    <head>
        <title>Monty Hall - Database Page</title>
        <link href="{{ URL::asset('css/database.css') }}" rel="stylesheet"/>
    </head>
    <x-navigation/>
    <div class="pageBody">
        <h1 class="pageTitle">Results Database</h1>
        <p>Explore long term results of simulation data below:</p>
        <div>
            <div class="tabToggle">
                <span>
                    <button class="tabLinks" onclick="selectTable('play')">
                        Play Mode Data
                    </button>
                </span>
                <span>
                    <button class="tabLinks" onclick="selectTable('sim')">
                        Simulation Data
                    </button>
                </span>
                <span>
                    <button class="tabLinks" onclick="selectTable('both')">
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
    </div>
    <x-footer/>
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
