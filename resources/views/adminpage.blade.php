<!DOCTYPE HTML>

<html>

<head>
        <title>Monty Hall - Admin Page</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/play.css') }}" rel="stylesheet">
        @livewireStyles
</head>

<body>
    <x-navigation/>

    <h1 style="text-align: center"> Admin Page </h1>
    <livewire:admin />

    <x-footer/>

    @livewireScripts
</body>

</html>