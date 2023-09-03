const listaPokemon = document.querySelector("#listaPokemon");
const botonesHeader = document.querySelectorAll(".btn-header");
let URL = "https://pokeapi.co/api/v2/pokemon/";
var csrfToken = $('meta[name="csrf-token"]').attr('content');
 
async function init() {
    try {
        const favoritePokemons = await getFavoritePokemon();

        console.log(favoritePokemons.favoritePokemons);
        
        // Create an array of promises for each fetch request
        const fetchPromises = [];


        favoritePokemons.favoritePokemons.forEach(pokemon => {
            console.log(pokemon);

            fetchPromises.push(
                fetch(URL + parseInt(pokemon))
                    .then((response) => response.json())
            );

        });

    
        // Wait for all fetch requests to complete using Promise.all
        const pokemonDataArray = await Promise.all(fetchPromises);

        // Now, you have an array of Pokemon data in the correct order
        pokemonDataArray.forEach(data => {
            mostrarPokemon(data);
        });
    } catch (error) {
        console.error('Error:', error);
    }
}

function  mostrarPokemon(poke) {

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
            </div>
        `;
            listaPokemon.appendChild(div);

    }

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

    
init();
    
    
    
    