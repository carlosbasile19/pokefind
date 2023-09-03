<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.9.2/tailwind.min.css">
    <script defer type="text/javascript" src={{asset('js/mobile-menu.js')}}></script>
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
    <link rel="stylesheet" href="./css/main.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script defer src="./js/random.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

</head>

<body>
    <x-nav-bar-home/>

    
        <div class="container mx-auto px-6 p-10">
            <h2 class="text-4xl font-bold text-center text-gray-800 mb-8">
                Add to favorites a <button class="text-red-600" onClick="init()">random </button> pokemon!
            </h2>
        </div>
    

    <div class="flex items-center justify-center mb-20">
        <div class="bg-white rounded-lg shadow-lg p-6 max-w-md w-full">
            <div id="listaPokemon">
                 <div class="pokemon">
                    <p id="pokemon-id-back" class="pokemon-id-back"></p>
                    <div class="pokemon-imagen">
                        <img id="pokemon-art" alt="Pikachu">
                    </div>
                    <div class="pokemon-info">
                        <div class="nombre-contenedor">
                            <p id="pokemon-id" class="pokemon-id"></p>
                            <h2 id="pokemon-nombre" class="pokemon-nombre"></h2>
                        </div>
                        <div id="contenedor-tipos" class="pokemon-tipos">
                            
                        </div>
                        <div id="stats" class="pokemon-stats">
                        </div>
                        <button id="favorite-button" class="p-2 bg-white border rounded-full favorite-button">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="white" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 21.35l-1.45-1.32C5.4 16.35 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 7.85-8.55 11.54L12 21.35z" />
                            </svg>
                       </button>
                    </div>
                    
                </div> 
                
            </div>
        </div>
    </div>



    <x-footer></x-footer>
    
</body>
</html>