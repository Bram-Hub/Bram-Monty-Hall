<!DOCTYPE HTML>
<html>
    <head>
        <title>Monty Hall - Database Page</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/database.css') }}" rel="stylesheet"/>

        @livewireStyles
        @livewireScripts
    </head>
    <body>
        <x-navigation/>
        
        @livewire('database')
        <div class="h-24"> </div>
        <x-footer/>
    </body>
    <script src="{{ URL::asset('js/app.js') }}"></script>
</html>
