const listaPokemon = document.querySelector("#listaPokemon");
const botonesHeader = document.querySelectorAll(".btn-header");
let URL = "https://pokeapi.co/api/v2/pokemon/";
var csrfToken = $('meta[name="csrf-token"]').attr('content');

function getRandomInt(max) {
    return Math.floor(Math.random() * max);
  }


    async function init() {
        try {
           
            // Create an array to store all the fetch promises
            const fetchPromises = [];
    
            pokemonNumber = getRandomInt(1000);

            let pokeId = pokemonNumber.toString();

            if (pokeId.length === 1) {
                pokeId = "00" + pokeId;
            } else if (pokeId.length === 2) {
                pokeId = "0" + pokeId;
            }
        
                fetchPromises.push(
                    fetch(URL + pokemonNumber)
                        .then((response) => response.json())
                );
            
            const isFavorite = await getSingleFavoritePokemon(pokeId);

            // Wait for all fetch requests to complete using Promise.all
            const pokemonDataArray = await Promise.all(fetchPromises);
    
            // Now, you have an array of Pokemon data in the correct order
            pokemonDataArray.forEach(data => {
                mostrarPokemonRandom(data, isFavorite);
            });

            

        } catch (error) {
            console.error('Error:', error);
        }
    }
    
    function  mostrarPokemonRandom(poke, isFavorite) {

            let tipos = poke.types.map((type) => `<p class="${type.type.name} tipo">${type.type.name}</p>`);
            tipos = tipos.join('');
    
            let pokeId = poke.id.toString();
            if (pokeId.length === 1) {
                pokeId = "00" + pokeId;
            } else if (pokeId.length === 2) {
                pokeId = "0" + pokeId;
            }
    
            let pokemonArt = document.getElementById("pokemon-art");
            pokemonArt.src = poke.sprites.other["official-artwork"].front_default;
    
            let PokemonIdBack = document.getElementById("pokemon-id-back");
            PokemonIdBack.innerHTML = `#${pokeId}`;
    
            let pokemonId = document.getElementById("pokemon-id");
            pokemonId.innerHTML = `#${pokeId}`;
    
            let pokemonNombre = document.getElementById("pokemon-nombre");
            pokemonNombre.innerHTML = poke.name;
    
            let pokemonTipos = document.getElementById("contenedor-tipos");
            pokemonTipos.innerHTML = tipos;
    
            let pokemonStats = document.getElementById("stats");
            pokemonStats.innerHTML = `
                <p class="stat">${poke.height}m</p>
                <p class="stat">${poke.weight}kg</p>
            `;

            let favoriteButton = document.getElementById("favorite-button");
            favoriteButton.setAttribute('data-pokemon-number', pokeId);
    
                if (isFavorite) {
                    favoriteButton.firstElementChild.style.fill = "red";
                }else{
                    favoriteButton.firstElementChild.style.fill = "white";
                }
    
                favoriteButton.addEventListener('click', async (event) => {

                    const button = event.currentTarget;
                    isAlreadyFavorite = await getSingleFavoritePokemon(button.getAttribute('data-pokemon-number'));

                    if (isAlreadyFavorite) {
                        console.log("isAlreadyFavorite");
                        button.firstElementChild.style.fill = "white";
                        
                    } else {
                        console.log("isNotAlreadyFavorite");
                        button.firstElementChild.style.fill = "red";
                        
                    }
                    addRemoveFavorites(button.getAttribute('data-pokemon-number'));
                    
                });
                
    
        }
    
        async function getSingleFavoritePokemon(pokemonNumber) {
            try {
                const response = await $.ajax({
                    url: `/getSingleFavoritePokemon/${pokemonNumber}`, // Assuming you use a route parameter to send the Pokémon number
                    method: "GET"
                });

                return response;
            } catch (error) {
                console.error("Error fetching favorite Pokémon:", error);
                throw error;
            }
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
    

   

    
    
    
    