<section id="game">
    <h2 id="gameText">{{ $gameText }}</h2>
    <div class="center">
        <button class="doorButton {{ $door1backgroundcolor }} {{ $door1borderColor }}" id="door1btn">
            <img src='{{ $door1imgsrc }}' alt="Door #1" class="door" id="door1img">
        </button>
        <button class="doorButton {{ $door2backgroundcolor }} {{ $door2borderColor }}" id="door2btn">
            <img src='{{ $door2imgsrc }}' alt="Door #2" class="door" id="door2img">
        </button>
        <button class="doorButton {{ $door3backgroundcolor }} {{ $door3borderColor }}" id="door3btn">
            <img src='{{ $door3imgsrc }}' alt="Door #3" class="door" id="door3img">
        </button>
        <br/>
        <br/>
        <br/>
    </div>
</section>
