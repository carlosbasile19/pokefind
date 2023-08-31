<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel All</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.9.2/tailwind.min.css">
    <script defer type="text/javascript" src={{asset('js/mobile-menu.js')}}></script>
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
</head>
<body class="overflow-x-hidden antialiased">
    
    <x-navbar /> 
    <x-hero />
    <x-features />
    <x-testimonials />
    <x-footer />
</body>
</html>
