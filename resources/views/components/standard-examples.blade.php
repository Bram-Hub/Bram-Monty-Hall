<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/education.css') }}" rel="stylesheet"/>
</head>
<div class="standardMontyExamples">
    <div class="carousel" aria-label="Gallery">
        <ol class="carousel__viewport">
            <li id="carousel__slide1"
                tabindex="0"
                class="carousel__slide">
                <div class="carousel__snapper">
                    <img class="carouselImg" src="img/educationPhotos/standardMontyExample1.png" alt="image">
                    <a href="#carousel__slide5"
                    class="carousel__prev">Go to last slide</a>
                    <a href="#carousel__slide2"
                    class="carousel__next">Go to next slide</a>
                </div>
            </li>
            <li id="carousel__slide2"
                tabindex="0"
                class="carousel__slide">
                <div class="carousel__snapper">
                    <img class="carouselImg" src="img/educationPhotos/standardMontyExample2.png" alt="image">
                    <a href="#carousel__slide1"
                    class="carousel__prev">Go to previous slide</a>
                    <a href="#carousel__slide3"
                    class="carousel__next">Go to next slide</a>
                </div>
            </li>
            <li id="carousel__slide3"
                tabindex="0"
                class="carousel__slide">
                <div class="carousel__snapper">
                    <img class="carouselImg" src="img/educationPhotos/standardMontyExample3.png" alt="image">
                    <a href="#carousel__slide2"
                    class="carousel__prev">Go to previous slide</a>
                    <a href="#carousel__slide4"
                    class="carousel__next">Go to next slide</a>
                </div>
            </li>
            <li id="carousel__slide4"
                tabindex="0"
                class="carousel__slide">
                <div class="carousel__snapper">
                    <img class="carouselImg" src="img/educationPhotos/standardMontyExample4.png" alt="image">
                    <a href="#carousel__slide3"
                    class="carousel__prev">Go to previous slide</a>
                    <a href="#carousel__slide5"
                    class="carousel__next">Go to next slide</a>
                </div>
            </li>
            <li id="carousel__slide5"
                tabindex="0"
                class="carousel__slide">
                <div class="carousel__snapper">
                    <img class="carouselImg" src="img/educationPhotos/standardMontyExample5.png" alt="image">
                    <a href="#carousel__slide4"
                    class="carousel__prev">Go to previous slide</a>
                    <a href="#carousel__slide1"
                    class="carousel__next">Go to first slide</a>
                </div>
            </li>
        </ol>
        <aside class="carousel__navigation">
            <ol class="carousel__navigation-list">
                <li class="carousel__navigation-item">
                    <a href="#carousel__slide1"
                    class="carousel__navigation-button">Go to slide 1</a>
                </li>
                <li class="carousel__navigation-item">
                    <a href="#carousel__slide2"
                    class="carousel__navigation-button">Go to slide 2</a>
                </li>
                <li class="carousel__navigation-item">
                    <a href="#carousel__slide3"
                    class="carousel__navigation-button">Go to slide 3</a>
                </li>
                <li class="carousel__navigation-item">
                    <a href="#carousel__slide4"
                    class="carousel__navigation-button">Go to slide 4</a>
                </li>
                <li class="carousel__navigation-item">
                    <a href="#carousel__slide5"
                    class="carousel__navigation-button">Go to slide 5</a>
                </li>
            </ol>
        </aside>
    </div>
    <img class="standardGraph" src="img/educationPhotos/standardGraph.png" alt="image">
</div>