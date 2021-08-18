<!DOCTYPE HTML>
<html>
    <head>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ URL::asset('css/education.css') }}">
        <link rel="img" href="{{ asset('img') }}">
        <script src="{{ URL::asset('js/education.js') }}" type="text/javascript" ></script>
        <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
        <script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
    </head>
    <body>

        <x-navigation/>
        <div class="scrollPage">
            <div class="letsDeal">
                <p class="title"> Let's Make A Deal </p>
                <img class="dealImage" src="img/851-300x200.jpg" alt="image">
                <img class="dealImage2" src="img/946-200x300.jpg" alt="image">
                <p class="text"> In the standard Monty Hall problem, a car is equally likely to be behind any one of three doors. You select one of the three doors (say, Door #1). The host then reveals one <span class="bold">non-selected</span> door, which does <span class="bold">NOT</span> contain the car. At this point, you choose whether to stick with your original choice or switch to the other door. What are the probabilities that you will win the car if you stick, versus if you switch? </p>
            </div>

            <div class="misconceptions">
                <p class="space"></p>
                <p class="title"> Misconceptions </p>
                <p class="text"> One would think that the odds are 50/50: there are two doors left after Monty opened a door and revealed a goat. That means that one of the two remaining doors has a car behind it and you have an even chance of winning it. So it seems that it does not matter if you switch or if you stick to your original choice. You might just as well stick with your initial pick. This seems reasonable. <br/>
                However, it is actually better to switch rather than stick. The odds are two out of three that if you switch your pick, you will win the car. <br/>
                The fact that by merely switching your pick increases the odds of winning seems counterintuitive. </p>
            </div>

            <div class="standardMonty">
                <p class="title"> Standard Monty Examples </p>
                <p class="standardMontyExContainer"> 
                    <x-standard-examples/>
                </p>
            </div>

            <div class="variants">
                <script src="{{ URL::asset('js/app.js') }}" type="text/javascript"></script>
                <p class="space"></p>
                <p class="title"> Variant Monty's </p>
                <div class="tabs">
                    <ul class="tabNav">
                        <div class="slider" id="slider"></div>
                        <li class="tabItem">
                            <button id="defaultOpen" class="variantsButton" onclick="openVariants(event, 'hell')">Hell</button>
                        </li>
                        <li class="tabItem">
                            <button class="variantsButton" onclick="openVariants(event, 'ignorant')">Ignorant</button>
                        </li>
                        <li class="tabItem">
                            <button class="variantsButton" onclick="openVariants(event, 'angelic')">Angelic</button>
                        </li>
                        <li class="tabItem">
                            <button class="variantsButton" onclick="openVariants(event, 'crawl')">Crawl</button>
                        </li>
                    </ul>
                </div>
                <div id="hell" class="monty">
                    <p class="variantTitle">Monty From Hell</p>
                    <p class="variantText">The host offers the option to switch only when theplayer’s initial choice is the winning door.
                    </p>
                    <p class="variantText">
                        <span class="bold">The Proportionality Principle:</span> If various alternatives are equally likely, and then some event is observed, the updated probabilities for the alternatives are proportional to the probabilities that the observed event would have occurred under those alternatives.<br/>
                        In mathematical terms, if \(P(A_1) = P(A_2) = \cdots = P(A_n) > 0\), and \(P(B) > 0\), then \(P(A_i | B) = \textcolor{purple}{K}P(B | A_i)\), where \(\textcolor{purple}{K} > 0\) does not depend on \(i\).<br/>
                        <span class="bold">Recall the Bayes’ Theorem we derived in the beginning:</span>
                        \[P(A_i | B) = \frac{P(A_i \cap B)}{P(B)} = \frac{P(A_i)P(B | A_i)}{P(B)} = \textcolor{purple}{K}P(B | A_i),\]
                        where \(\textcolor{purple}{K} = P(A_i)/P(B)\), which does not depend on \(i\) since \(P(A_1) = P(A_2) = \cdots = P(A_n)\).
                    </p>
                </div>
                <div id="ignorant" class="monty">
                    <p class="variantTitle">Ignorant Monty</p>
                    <p class="variantText">In this variant, once you have selected one of the three doors, the hostslips on a banana peel and accidentally pushes open another door, whichjust happens not to contain the car.  Now what are the probabilities thatyou will win the car if you stick with your original selection, versus if youswitch to the remaining door?</p>
                    <p class="variantText">
                        Now we assume that you selected door number one.  The host then revealed door number three, which did NOT contain the car.
                    </p>
                    <img class="variantImg" src="img/educationPhotos/ignorantMontyTree.jpg" alt="image">
                    <p class="variantText">What’s the probability of the car being behind door #1 (stick with your original choice) given that door #3 was opened? <br/>
                    \[\begin{equation*}
                        \begin{aligned}
                        P(B1|O3) &= \frac{P(B1)P(O3|B1)}{P(B1)P(O3|B1) + P(B2)P(O3|B2) + P(B3)P(O3|B3)}\\
                        &= \frac{\frac{1}{3} \cdot \frac{1}{2}}{\frac{1}{3} \cdot \frac{1}{2} + \frac{1}{3} \cdot \frac{1}{2} + \frac{1}{3} \cdot 0} = \frac{\frac{1}{6}}{\frac{1}{6} + \frac{1}{6}} \\
                        &= \boxed{\frac{1}{2}}.\\
                        \end{aligned}
                    \end{equation*}\]
                    </p>
                    <p class="variantText">What’s the probability of the car being behind door #2 (switched) given that door #3 was opened?
                    \[\begin{equation*}
                        \begin{aligned}
                        P(B2|O3) &= \frac{P(B2)P(O3|B2)}{P(B1)P(O3|B1) + P(B2)P(O3|B2) + P(B3)P(O3|B3)}\\
                        &= \frac{\frac{1}{3} \cdot \frac{1}{2}}{\frac{1}{3} \cdot \frac{1}{2} + \frac{1}{3} \cdot \frac{1}{2} + \frac{1}{3} \cdot 0} = \frac{\frac{1}{6}}{\frac{1}{6} + \frac{1}{6}} \\
                        &= \boxed{\frac{1}{2}}.\\
                        \end{aligned}
                    \end{equation*}\] 
                    </p>
                    <p class="variantText">
                        In this case, it is still true that originally there was just a \(\frac{1}{3}\) chance that your original selection was correct. And yet, in the Monty Fall problem, the probabilities of winning if you stick or switch are both \(\frac{1}{2}\), not \(\frac{1}{3}\) and \(\frac{2}{3}\).<br/>
                        <span class="bold">
                            Therefore, your probability of winning is the same!
                        </span>
                    </p>
                </div>
                <div id="angelic" class="monty">
                    <p class="variantTitle">Angelic Monty</p>
                    <p class="variantText">
                        Recall that in the original Monty Hall Problem, Monty only chooses at random when the contestant has chosen the door that conceals the car. That is the only instance in which the contestant benefits from sticking, but that scenario only happens with probability \(\frac{1}{3}\) in comparison to the other scenarios where switching is beneficial, which happen with probability \(\frac{2}{3}\).<br/>
                        In the case where the contestant has initially selected a door that conceals a goat, Monty is forced to open the remaining door that conceals the goat. Monty is able to make this decision because he knows the location of the car.<br/>
                        What if Monty does not know the location of the car? He would have to choose randomly from the doors different from the contestant’s selection.
                    </p>
                    <p class="variantText">
                        Now we assumed that you selected door number one. The host then revealed one <span class="bold">non-selected</span> door <span class="bold">randomly</span> since Monty does NOT know the location of the car.
                    </p>
                    <img class="variantImg" src="img/educationPhotos/angelicMontyTree.jpg" alt="image">
                    <p class="variantText">
                        What’s the probability of the car being behind door #1 (<span class="bold">switching loses</span>) given that door #3 was opened?
                        \[\begin{equation*}
                            \begin{aligned}
                            P(B1|O3) &= \frac{P(B1)P(O3|B1)}{P(B1)P(O3|B1) + P(B2)P(O3|B2) + P(B3)P(O3|B3)}\\
                            &= \frac{\frac{1}{3} \cdot \frac{1}{2}}{\frac{1}{3} \cdot \frac{1}{2} + \frac{1}{3} \cdot \frac{1}{2} + \frac{1}{3} \cdot \frac{1}{2}} = \frac{\frac{1}{6}}{\frac{1}{6} + \frac{1}{6} + \frac{1}{6}}\\
                            &= \boxed{\frac{1}{3}}.\\
                            \end{aligned}
                        \end{equation*}\]
                        What’s the probability of the car being behind door #2 (<span class="bold">switching wins</span>) given that door #3 was opened?
                        \[\begin{equation*}
                            \begin{aligned}
                            P(B2|O3) &= \frac{P(B2)P(O3|B2)}{P(B1)P(O3|B1) + P(B2)P(O3|B2) + P(B3)P(O3|B3)}\\
                            &= \frac{\frac{1}{3} \cdot \frac{1}{2}}{\frac{1}{3} \cdot \frac{1}{2} + \frac{1}{3} \cdot \frac{1}{2} + \frac{1}{3} \cdot \frac{1}{2}} = \frac{\frac{1}{6}}{\frac{1}{6} + \frac{1}{6} + \frac{1}{6}}\\
                            &= \boxed{\frac{1}{3}}.\\
                            \end{aligned}
                        \end{equation*}\]
                        What’s the probability of the car being behind door #3 (<span class="bold">game ends</span>) given that door #3 was opened?
                        \[\begin{equation*}
                            \begin{aligned}
                            P(B3|O3) &= \frac{P(B3)P(O3|B3)}{P(B1)P(O3|B1) + P(B2)P(O3|B2) + P(B3)P(O3|B3)}\\
                            &= \frac{\frac{1}{3} \cdot \frac{1}{2}}{\frac{1}{3} \cdot \frac{1}{2} + \frac{1}{3} \cdot \frac{1}{2} + \frac{1}{3} \cdot \frac{1}{2}} = \frac{\frac{1}{6}}{\frac{1}{6} + \frac{1}{6} + \frac{1}{6}}\\
                            &= \boxed{\frac{1}{3}}.\\
                            \end{aligned}
                        \end{equation*}\]
                        In the case that the car is not behind door # 1, meaning that the contestant has selected a goat-concealing door, the game will end if Monty opens a car concealing door. This happens \(\frac{1}{3}\) of the time.<br/>
                        So putting everything together, we conclude that there is a probability of \(\frac{1}{3}\) that the contestant will loose by switching, a probability of \(\frac{1}{3}\) that the contestant will win by switching, and a probability of \(\frac{1}{3}\) that the game will end, in other words, the contestant loses.<br/>
                        Still, even for this version of the Monty Hall Problem we see that the contestant will loose \(\frac{2}{3}\) of the time and will win only \(\frac{1}{3}\) of the time, which only happens if they switch.
                    </p>
                </div>
                <div id="crawl" class="monty">
                    <p class="variantTitle">Monty Crawl</p>
                    <p class="variantText">
                        As in the original problem, once you have selected one of the three doors, the host then reveals one non-selected door which does not contain the car. However, the host is very tired, and crawls from his position (near Door # 1) to the door he is to open. In particular, if he has a choice of doors to open (i.e., if your original selection happened to be correct), then he opens the smallest number available door. (For example, if you selected Door # 1 and the car was indeed behind Door # 1, then the host would always open Door # 2, never Door # 3.) What are the probabilities that you will win the car if you stick versus if you switch?<br/>
                        <span class="bold">Small Door Assumption:</span> Monty always crawls to and opens the smallest numbered available non-prize door.<br/>
                        The Monty Crawl problem seems very similar to the original Monty Hall problem; the only difference is the host’s actions when he has a choice of which door to open.<br/>
                        However, the answer now is that if you see the host open the higher-numbered non-selected door, then your probability of winning is 0% if you stick, and 100% if you switch.<br/>
                        On the other hand, if the host opens the lower-numbered non-selected door, then your probability of winning is 50% whether you stick or switch.<br/>
                        In the Monty Crawl problem, suppose that you select Door # 1. The probabilities that the host would choose to open Door # 3, if the car were behind Door # 1, # 2, and # 3, are respectively 0, 1, and 0. Hence, if the host opens Door # 3, then it is certain that the car is behind Door # 2.<br/>
                        On the other hand, the probabilities that the host would choose to open Door # 2 are respectively 1, 0, 1. Hence, if the host opens Door # 2, then probabilities are now \(\frac{1}{2}\) each that the car is behind Door # 1 and Door # 3.<br/>
                        <span class="bold">If the contestant's initial choice is the prize door:</span>
                        <img class="variantImg" src="img/educationPhotos/crawlTable1.png" alt="image">
                        When the contestant initially picks the prize door, the contestant always wins if he/she stays and always loses if he/she switches. This happens \(\frac{1}{3}\) of the time because he/she had a \(\frac{1}{3}\) chance of being right with the initial choice of doors.<br/>
                        <span class="bold">If the contestant's initial choice is not the prize door:</span>
                        <img class="variantImg" src="img/educationPhotos/crawlTable2.png" alt="image">
                        Notice that the contestant always wins when he/he switches, which happens in \(frac{2}{3}\) of the cases. Therefore, if you employ the always switch strategy in Monty Crawl cases, you will win \(\frac{2}{3}\) of the time. If you employ the always stay method in Monty Crawl cases, you will win \(\frac{1}{3}\) of the time just as in the Monty Hall cases.
                    </p>
                </div>
            </div>

            <div class="resources">
                <p class="title"> Resources </p>
                <p class="text"> Vestibulum euismod lectus nunc, sit amet ornare augue suscipit sit amet. Integer pulvinar, quam vel ultricies blandit, mi enim luctus libero, vel porta augue augue id orci. Integer tellus nisl, luctus non vulputate eu, imperdiet et justo. Phasellus congue a nisl nec fringilla. Sed tempus leo nec nibh tincidunt, sed congue urna faucibus. Fusce scelerisque congue orci a vestibulum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sed dignissim neque. Praesent eu hendrerit dui, et condimentum diam. Praesent gravida erat vitae mauris pharetra, at viverra tortor cursus. Mauris lobortis nisl ut nibh luctus luctus. Phasellus ultricies mauris enim, a eleifend mauris fermentum ac. Donec leo mauris, dapibus in rutrum eget, fringilla id eros. </p>
            </div>
        </div>
        <x-footer/>
    </body>
<!-- <script type="text/javascript">
    //Education Page Standard Monty Examples Slides
var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}
</script> -->
</html>
