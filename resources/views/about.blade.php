<!DOCTYPE HTML>
<html>
    <head>
        <title>Monty Hall - About Page</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('css/about.css') }}" rel="stylesheet"/>
    </head>
    <body>
        <x-navigation/>
        <div class="pageBody">
            <h1 class="pageTitle">About Monty Hall Simulator</h1>
            <h2>
                Purpose
            </h2>
            <p>
                Our Monty Hall Simulator is an interactive website where you can play around with different versions of the Monty Hall Problem.
                The Monty Hall problem is brain teaser, probability puzzle, based off of the game show "Let's Make a Deal" and the host Monty Hall.
            </p>
            <p>
                In the original game, we have three doors, two of which have goats behind them and one of which has a car behind it. The player first chooses one of the three doors. Monty then opens one of the remaining two that has a goat behind it and gives the player the choice to either stick with their choice or switch to the third unopened door before he opens the door the player chooses. In this original variation, though it seems counterintuitive, the statistically smartest course of action is to switch.
            </p>
            <p>
                With our Monty Hall Simulator, we consider several other versions of Monty Hall where the assumptions we make in the original version, such as Monty knowing where the goat is, Monty only able to open doors with goats behind them and Monty only able to open doors that the player hasn't chosen, might not hold.
            </p>
            <p>
                You can find out more about the statistics behind the original version and all of the other versions we simulate on the <a href="/education">Education page </a>. Also checkout the <a href="/play">Play page</a> to try out random Montys and checkout the <a href="/simulation">Simulation page</a> to test specific Montys. As you test out these different Montys you can head to the <a href="/database">Database page</a> to checkout the data from several runs of the game.
            </p>
            <h2>Meet our Team</h2>
            <h3>Our Wonderful Advisor</h3>
            <div class="advisor">
                <img class="teamPhoto" src="img/teamPhotos/bram.jpg" alt="Professor Bram">
                <figcaption>Professor Bram van Heuveln</figcaption>
            </div>
            <h3>This Project was started in Summer 2021 with these wonderful people:</h3>
            <div>
                <div class="teamMember">
                    <img class="teamPhoto" src="img/MontyHallProjectLogo.png" alt="Andrew L'Italien">
                    <figcaption>Andrew L'Italien</figcaption>
                </div>
                <div class="teamMember">
                    <img class="teamPhoto" src="img/teamPhotos/AlexandraHsueh.jpg" alt="Alexandra Hsueh">
                    <figcaption>Alexandra Hsueh</figcaption>
                </div>
                <div class="teamMember">
                    <img class="teamPhoto" src="img/MontyHallProjectLogo.png" alt="Clay Bell">
                    <figcaption>Clay Bell</figcaption>
                </div>
                <div class="teamMember">
                    <img class="teamPhoto" src="img/MontyHallProjectLogo.png" alt="Almog Cohen">
                    <figcaption>Almog Cohen</figcaption>
                </div>
                <div class="teamMember">
                    <img class="teamPhoto" src="img/MontyHallProjectLogo.png" alt="Haowen He">
                    <figcaption>Haowen He</figcaption>
                </div>
                <div class="teamMember">
                    <img class="teamPhoto" src="img/MontyHallProjectLogo.png" alt="Alex Liu">
                    <figcaption>Alex Liu</figcaption>
                </div>
                <div class="teamMember">
                    <img class="teamPhoto" src="img/MontyHallProjectLogo.png" alt="Michael Meng">
                    <figcaption>Michael Meng</figcaption>
                </div>
                <div class="teamMember">
                    <img class="teamPhoto" src="img/MontyHallProjectLogo.png" alt="Ziwei Peng">
                    <figcaption>Ziwei Peng</figcaption>
                </div>
                <div class="teamMember">
                    <img class="teamPhoto" src="img/MontyHallProjectLogo.png" alt="Yihang Wang">
                    <figcaption>Yihang Wang</figcaption>
                </div>
            </div>
            <h3>As years pass more people join the project:</h3>
            <div>
                <div class="teamMember">
                    <img class="teamPhoto" src="img/MontyHallProjectLogo.png" alt="TBD">
                    <figcaption>TBD</figcaption>
                </div>
            </div>
            <h2 id="contact">Contact us</h2>
            <ul>
                <li>
                    Advisor contact: <a href="mailto:bram@rpi.edu">Professor Bram</a>
                </li>
                <li>
                    Find us here on Github: <a href="https://github.com/Bram-Hub/Monty-Hall">https://github.com/Bram-Hub/Monty-Hall</a>
                </li>
            </ul>
            <h4 id="faq">Frequently Asked Questions</h4>
            <ul>
                <li>
                    Q:
                    <ul>
                        <li>
                            A:
                        </li>
                    </ul>
                </li>
                <li>
                    Q:
                    <ul>
                        <li>
                            A:
                        </li>
                    </ul>
                </li>
                <li>
                    Q:
                    <ul>
                        <li>
                            A:
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <x-footer/>
    </body>
</html>
