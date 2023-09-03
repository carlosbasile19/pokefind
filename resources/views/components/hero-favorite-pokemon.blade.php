<main class="flex flex-col space-y-10">
    <section>
        @php
            $user = Auth::user();
            echo "<h1 class='text-xl'>Welcome back, $user->name!</h1>";
        @endphp
      </section>
    <section>
        <p>Welcome to your very own Pokémon Collection! Here, you can proudly display and manage all the incredible Pokémon you've captured on your journey. We understand the thrill of encountering and capturing these amazing creatures, and this page is your personal sanctuary to showcase your achievements as a Pokémon Trainer.</h2>
    </section>
    <section>
        <div id="todos">
            <div class="pokemon-todos" id="listaPokemon">
           </div>
        </div>
    </section>
</main>