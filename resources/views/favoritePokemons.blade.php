<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PokeFind - Favorite Pokemon</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.9.2/tailwind.min.css">
    <script defer type="text/javascript" src={{asset('js/mobile-menu.js')}}></script>
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
    <link rel="stylesheet" href="./css/main.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 
    <script defer src="./js/favorites.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body>

    <x-nav-bar-home/>

    <x-hero-favorite-pokemon/>

    <x-footer/>
    
</body>
</html>