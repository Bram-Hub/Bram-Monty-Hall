<!DOCTYPE HTML>

<html>

<head>
        <title>Monty Hall - Admin Page</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/play.css') }}" rel="stylesheet">
        <link href="{{ asset('css/admin.css') }}" rel="stylesheet"> 
        @livewireStyles
</head>

<body>
    <x-navigation/>

    <div class="admin-wrapper">
        <h1 class="easter-egg"> Admin Page </h1>
        <livewire:admin />
    </div>

    <x-footer/>

    @livewireScripts
</body>

</html>