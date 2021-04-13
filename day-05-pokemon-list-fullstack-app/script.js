// Wrap script inside self calling function
(function () {
  document.addEventListener("DOMContentLoaded", executeScript);

  function executeScript() {
    // Make API call
    fetch(`formatted_pokemon.php?page=${currentPage}`)
      // Parse JSON
      .then((response) => response.json())
      .then((data) => {
        numberOfChunks = data[0];
        // Assign array of pokemonts to a variable
        let pokemons = data[1];
        // Iterate through each Pokemon to display them

        for (const [index, pokemon] of Object.entries(pokemons)) {
          addPokemonName(pokemon, index);
        }

        addPagination(currentPage, numberOfChunks);
      });

    /**
     * Given a name, it will add it to poke-list as an anchor tag.
     * @param {String} pokemon
     */
    const addPokemonName = (pokemon, index) => {
      // Create new div for pokemon
      let listedPokemon = document.createElement("div");
      // Add an anchor tag inside div with pokemon name
      listedPokemon.innerHTML = `<p>${parseInt(index) + 1}. ${
        pokemon.name
      }, url: <a href = "${pokemon.url}">${pokemon.url}</a></p>`;
      // Append anchor to poke-list section
      document.getElementById("poke-list").appendChild(listedPokemon);
    };

    const addPagination = (currentPage, PageNumber) => {
      let pagination = document.getElementById("pagination");

      if (currentPage != 1) {
        let previous = document.createElement("a");
        previous.setAttribute(`href`, `?page=${parseInt(currentPage) - 1}`);
        previous.innerHTML = "Previous Page";
        pagination.appendChild(previous);
      }

      for (let i = 1; i <= PageNumber; i++) {
        let listedPage;
        if (i == currentPage) {
          listedPage = document.createElement("span");
          listedPage.innerHTML = i;
        } else {
          listedPage = document.createElement("a");
          listedPage.setAttribute(`href`, `?page=${i}`);
          listedPage.innerHTML = i;
        }
        pagination.appendChild(listedPage);
      }

      if (currentPage != PageNumber) {
        let previous = document.createElement("a");
        previous.setAttribute(`href`, `?page=${parseInt(currentPage) + 1}`);
        previous.innerHTML = "Next Page";
        pagination.appendChild(previous);
      }
    };
  }
})();
