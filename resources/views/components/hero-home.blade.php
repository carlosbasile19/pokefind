<script src="https://kit.fontawesome.com/f6dcf461c1.js" crossorigin="anonymous"></script>

<main class="flex flex-col space-y-10">
    <section>
        @php
            $user = Auth::user();
            echo "<h1 class='text-xl'>Welcome back, $user->name!</h1>";
        @endphp
    </section>
    <section>
        <ul class="nav-list">
            <li class="nav-item"><button class="btn btn-header" id="ver-todos">Ver todos</button></li> 
            <li class="nav-item"><button class="btn btn-header normal" id="normal">Normal</button></li>
            <li class="nav-item"><button class="btn btn-header fire" id="fire">Fire</button></li>
            <li class="nav-item"><button class="btn btn-header water" id="water">Water</button></li>
            <li class="nav-item"><button class="btn btn-header grass" id="grass">Grass</button></li>
            <li class="nav-item"><button class="btn btn-header electric" id="electric">Electric</button></li>
            <li class="nav-item"><button class="btn btn-header ice" id="ice">Ice</button></li>
            <li class="nav-item"><button class="btn btn-header fighting" id="fighting">Fighting</button></li>
            <li class="nav-item"><button class="btn btn-header poison" id="poison">Poison</button></li>
            <li class="nav-item"><button class="btn btn-header ground" id="ground">Ground</button></li>
            <li class="nav-item"><button class="btn btn-header flying" id="flying">Flying</button></li>
            <li class="nav-item"><button class="btn btn-header psychic" id="psychic">Psychic</button></li>
            <li class="nav-item"><button class="btn btn-header bug" id="bug">Bug</button></li>
            <li class="nav-item"><button class="btn btn-header rock" id="rock">Rock</button></li>
            <li class="nav-item"><button class="btn btn-header ghost" id="ghost">Ghost</button></li>
            <li class="nav-item"><button class="btn btn-header dark" id="dark">Dark</button></li>
            <li class="nav-item"><button class="btn btn-header dragon" id="dragon">Dragon</button></li>
            <li class="nav-item"><button class="btn btn-header steel" id="steel">Steel</button></li>
            <li class="nav-item"><button class="btn btn-header fairy" id="fairy">Fairy</button></li>
        </ul>
    </section>
    <section>
        <div id="todos">
            <div class="pokemon-todos" id="listaPokemon">
            </div>
        </div>
    </section>
</main>
