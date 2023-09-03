<header class="relative z-50 w-full h-24">
    <div class="container flex items-center justify-center h-full max-w-6xl px-8 mx-auto sm:justify-between xl:px-0">
        <a href="/home" class="relative flex items-center h-5 font-black leading-none">
            <img class="w-auto h-6 text-indigo-600 fill-current" src="https://cdn-icons-png.flaticon.com/512/188/188987.png" alt="">
            <span class="ml-3 text-xl text-gray-800">PokeFind<span class="text-pink-500">.</span></span>
        </a>

        <nav id="nav"
            class="absolute top-0 left-0 z-50 flex flex-col items-center justify-between hidden w-full h-32 pt-5 mt-24 text-sm text-gray-800 bg-white border-t border-gray-200 md:w-auto md:flex-row md:h-24 lg:text-base md:bg-transparent md:mt-0 md:border-none md:py-0 md:flex md:relative">
            <div class="flex flex-col block w-full font-medium border-t border-gray-200 md:hidden">
                <a href="#_" class="w-full py-2 font-bold text-center text-pink-500">Favorite Pokemon</a>
                <a href="#_" class="w-full py-2 font-bold text-center text-pink-500">Catch em' all!</a>
                <a href="/logout"
                    class="relative inline-block w-full px-5 py-3 text-sm leading-none text-center text-white bg-indigo-700 fold-bold">logout
                </a>
            </div>

            <div class="absolute left-0 flex-col items-center justify-center hidden w-full pb-8 mt-48 border-b border-gray-200 md:relative md:w-auto md:bg-transparent md:border-none md:mt-0 md:flex-row md:p-0 md:items-end md:flex md:justify-between">
                <a href="/favoritePokemons"
                    class="relative z-40 px-3 py-2 mr-0 text-sm font-bold text-pink-500 md:px-5 lg:text-red sm:mr-3 md:mt-0">Fav Pokemon</a>
                <a href="/randomPokemon"
                    class="relative z-40 px-3 py-2 mr-0 text-sm font-bold text-pink-500 md:px-5 lg:text-red sm:mr-3 md:mt-0">Catch em all</a>
                <form action="/logout" method="GET">
                    <button
                        class="relative z-40 inline-block w-auto h-full px-5 py-3 text-sm font-bold leading-none text-white transition-all transition duration-100 duration-300 bg-indigo-700 rounded shadow-md fold-bold lg:bg-white lg:text-indigo-700 sm:w-full lg:shadow-none hover:shadow-xl">Logout</button>
                </form>
            </div>
        </nav>

        <div id="nav-mobile-btn"
            class="absolute top-0 right-0 z-50 block w-6 mt-8 mr-10 cursor-pointer select-none md:hidden sm:mt-10">
            <span class="block w-full h-1 mt-2 duration-200 transform bg-gray-800 rounded-full sm:mt-1"></span>
            <span class="block w-full h-1 mt-1 duration-200 transform bg-gray-800 rounded-full"></span>
        </div>
    </div>
</header>
