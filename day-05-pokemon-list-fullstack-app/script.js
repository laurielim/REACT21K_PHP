// Wrap script inside self calling function
(function () {
  document.addEventListener("DOMContentLoaded", executeScript);

  function executeScript() {
    // Make API call
    fetch(`formatted_pokemon.php?page=${currentPage}`)
      // Parse JSON
      .then((response) => response.json())
      .then((data) => {
        // Assign array of pokemonts to a variable
        let pokemons = data;
        // Iterate through each Pokemon to display them

        for (const [index, pokemon] of Object.entries(pokemons)) {
          addPokemonName(pokemon, index);
        }

        // pokemons.forEach(addPokemonName);
      });

    /**
     * Given a name, it will add it to poke-list as an anchor tag.
     * @param {String} pokemon
     */
    const addPokemonName = (pokemon, index) => {
      // Create new div for pokemon
      let listedPokemon = document.createElement("div");
      // Add an anchor tag inside div with pokemon name
      listedPokemon.innerHTML = `<p>${index}. ${pokemon.name}, url: <a href = "${pokemon.url}">${pokemon.url}</a></p>`;
      // Append anchor to poke-list section
      document.getElementById("poke-list").appendChild(listedPokemon);
    };
  }
})();
