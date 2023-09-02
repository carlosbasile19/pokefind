// Import any necessary libraries or modules if needed

// Ensure the DOM is ready before accessing elements
document.addEventListener('DOMContentLoaded', () => {
    const listaPokemon = document.getElementById('listaPokemon'); // Get the container element

    // Select favorite buttons within the container
    const favoriteButtons = listaPokemon.querySelectorAll('.favorite-button');

    favoriteButtons.forEach((button) => {
        button.addEventListener('click', async (event) => {
            const pokemonNumber = event.target.getAttribute('data-pokemon-number');
            alert(`You clicked the favorite button for Pokemon #${pokemonNumber}`);

            // Simulate adding/removing the Pokemon from favorites
            // Replace this with your actual API call or logic
            const isFavorite = button.classList.contains('text-red-500');

            if (isFavorite) {
                // Remove from favorites
                button.classList.remove('text-red-500');
                // TODO: Make an API call to remove from favorites
                // Example: await removeFromFavorites(pokemonNumber);
            } else {
                // Add to favorites
                button.classList.add('text-red-500');
                // TODO: Make an API call to add to favorites
                // Example: await addToFavorites(pokemonNumber);
            }
        });
    });
});
