<!DOCTYPE HTML>
<html>
    <head>
        <title>Monty Hall - Play Page</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/play.css') }}" rel="stylesheet">
        <script src="{{ URL::asset('js/game.js') }}" type="text/javascript" defer></script>
        @livewireStyles
        @livewireScripts
    </head>
    <body>
        <x-navigation/>
        @livewire('play')
        <x-footer/>
    </body>
</html>
