<head>
    <link href="{{ URL::asset('css/standardExCarousel.css') }}" rel="stylesheet"/>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="{{ URL::asset('js/standardMontyEx.js') }}" type="text/javascript"></script>
</head>
<div class="standardMontyExamples">
    <div class="standardMontyExContent" onload="showDivs(1)">
        <div class="mySlides default">
            <img src="img/educationPhotos/standardMontyExample1.png" alt="image">
            <div class="slideCounterLabel">1/7</div>
        </div>
        <div class="mySlides">
            <img src="img/educationPhotos/standardMontyExample2.png" alt="image">
            <div class="slideCounterLabel">2/7</div>
        </div>
        <div class="mySlides">
            <img src="img/educationPhotos/standardMontyExample3.png" alt="image">
            <div class="slideCounterLabel">3/7</div>
        </div>
        <div class="mySlides">
            <img src="img/educationPhotos/standardMontyExample4.png" alt="image">
            <div class="slideCounterLabel">4/7</div>
        </div>
        <div class="mySlides">
            <img src="img/educationPhotos/standardMontyExample5.png" alt="image">
            <div class="slideCounterLabel">5/7</div>
        </div>
        <div class="mySlides">
            <img src="img/educationPhotos/standardGraph.png" alt="image">
            <div class="slideCounterLabel">6/7</div>
        </div>
        <div class="mySlides">
            <img src="img/educationPhotos/standardMonteCarloSim.png" alt="image">
            <div class="slideCounterLabel">7/7</div>
        </div>
        <button class="prevSlideButton" onclick="plusDivs(-1)">&#10094;</button>
        <button class="nextSlideButton" onclick="plusDivs(1)">&#10095;</button>
    </div>
</div>