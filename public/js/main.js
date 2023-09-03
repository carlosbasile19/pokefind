const listaPokemon = document.querySelector("#listaPokemon");
const botonesHeader = document.querySelectorAll(".btn-header");
let URL = "https://pokeapi.co/api/v2/pokemon/";
var csrfToken = $('meta[name="csrf-token"]').attr('content');
 
async function init() {
    try {
        // Wait for the getFavoritePokemon function to complete and get the favorite Pokémon
        const favoritePokemons = await getFavoritePokemon();
        
        // Create an array to store all the fetch promises
        const fetchPromises = [];

        for (let i = 1; i <= 151; i++) {
            // Push each fetch promise into the array
            fetchPromises.push(
                fetch(URL + i)
                    .then((response) => response.json())
            );
        }

        // Wait for all fetch requests to complete using Promise.all
        const pokemonDataArray = await Promise.all(fetchPromises);

        // Now, you have an array of Pokemon data in the correct order
        pokemonDataArray.forEach(data => {
            mostrarPokemon(data, favoritePokemons.favoritePokemons);
        });
    } catch (error) {
        console.error('Error:', error);
    }
}

function  mostrarPokemon(poke, favoritePokemons) {

        let tipos = poke.types.map((type) => `<p class="${type.type.name} tipo">${type.type.name}</p>`);
        tipos = tipos.join('');

        let pokeId = poke.id.toString();
        if (pokeId.length === 1) {
            pokeId = "00" + pokeId;
        } else if (pokeId.length === 2) {
            pokeId = "0" + pokeId;
        }

        const div = document.createElement("div");
        div.classList.add("pokemon");
        div.innerHTML = `
            <p class="pokemon-id-back">#${pokeId}</p>
            <div class="pokemon-imagen">
                <img src="${poke.sprites.other["official-artwork"].front_default}" alt="${poke.name}">
            </div>
            <div class="pokemon-info">
                <div class="nombre-contenedor">
                    <p class="pokemon-id">#${pokeId}</p>
                    <h2 class="pokemon-nombre">${poke.name}</h2>
                </div>
                <div class="pokemon-tipos">
                    ${tipos}
                </div>
                <div class="pokemon-stats">
                    <p class="stat">${poke.height}m</p>
                    <p class="stat">${poke.weight}kg</p>
                </div>
                <button data-pokemon-number="${pokeId}" class="p-2 bg-white border rounded-full favorite-button">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="white" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 21.35l-1.45-1.32C5.4 16.35 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 7.85-8.55 11.54L12 21.35z" />
                                </svg>
                </button>
            </div>
        `;

            const isAlreadyFavorite = favoritePokemons.includes(pokeId);

            if (isAlreadyFavorite) {
                div.querySelector('.favorite-button').firstElementChild.style.fill = "red";
            }

        
            const favoriteButton = div.querySelector('.favorite-button');
            favoriteButton.addEventListener('click', async (event) => {
                // Use currentTarget to ensure you're getting the button element
                const button = event.currentTarget;

                console.log(event.currentTarget.getAttribute('data-pokemon-number'));
            
                // Simulate adding/removing the Pokemon from favorites
                // Replace this with your actual API call or logic
                const isFavorite = event.currentTarget.firstElementChild.style.fill === "red";

                if (isFavorite) {
                    event.currentTarget.firstElementChild.style.fill = "white";
                } else {
                    event.currentTarget.firstElementChild.style.fill = "red";
                }

                addRemoveFavorites(event.currentTarget.getAttribute('data-pokemon-number'));
            });

            listaPokemon.appendChild(div);
    }

    botonesHeader.forEach(boton => boton.addEventListener("click", async (event) => {
        const botonId = event.currentTarget.id;
        listaPokemon.innerHTML = "";
    
        try {
            // Wait for the getFavoritePokemon function to complete and get the favorite Pokémon
            const favoritePokemons = await getFavoritePokemon();
            
            // Create an array to store all the fetch promises
            const fetchPromises = [];
    
            for (let i = 1; i <= 151; i++) {
                // Push each fetch promise into the array
                fetchPromises.push(
                    fetch(URL + i)
                        .then((response) => response.json())
                );
            }
    
            // Wait for all fetch requests to complete using Promise.all
            const pokemonDataArray = await Promise.all(fetchPromises);
    
            // Process and display Pokemon data based on the button category
            if (botonId === "ver-todos") {
                pokemonDataArray.forEach(data => {
                    mostrarPokemon(data, favoritePokemons.favoritePokemons);
                });
            } else {
                pokemonDataArray.forEach(data => {
                    const tipos = data.types.map(type => type.type.name);
                    if (tipos.some(tipo => tipo.includes(botonId))) {
                        mostrarPokemon(data, favoritePokemons.favoritePokemons);
                    }
                });
            }
        } catch (error) {
            console.error('Error:', error);
        }   
    
    }));
    
     async function getFavoritePokemon() {
        // Return the promise returned by $.ajax
        return await $.ajax({
            url: "/getFavoritePokemons",
            method: "GET"
        })
        .then(function (response) {
            // This function logs the response to the console
            console.log(response);
            // The promise returned by $.ajax still resolves with the response
            return response;
        })
        .fail(function (error) {
            // Handle any errors that occur during the AJAX request
            console.error("Error fetching favorite Pokémon:", error);
            throw error;
        });
    }

    function addRemoveFavorites(pokemon) {
        return $.ajax({
            url: "/addRemoveFavoritePokemon",
            method: "POST",
            data: { pokemon: pokemon },
            headers: {
                "X-CSRF-TOKEN": csrfToken // Remove "Content-Type" header or set it to "application/x-www-form-urlencoded"
            }
        });
    }
    
init();
    
    
    
    