// Wrap script inside self calling function
(function () {
	document.addEventListener("DOMContentLoaded", executeScript);

	function executeScript() {
		// Make API call, including global variable currentPage
		fetch(`formatted_pokemon.php?page=${currentPage}`, {
			method: "GET",
		})
			// Parse JSON
			.then((response) => response.json())
			.then((data) => {
				if (data.status > 300) {
					throw data.message;
				}

				numberOfChunks = data[0];
				// Assign array of pokemonts to a variable
				let pokemons = data[1];
				// Iterate through each Pokemon to display them
				for (const [index, pokemon] of Object.entries(pokemons)) {
					addPokemonName(pokemon, index);
				}
				// Call fn to add pagination
				addPagination(currentPage, numberOfChunks);
			})
			.catch((error) => console.log(error));

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

		/**
		 * Given current page and number of pages, adds a next/previous links and links to other pages accordingly to "pagination" div
		 * @param {*} currentPage
		 * @param {*} PageNumber
		 */
		const addPagination = (currentPage, PageNumber) => {
			// Assign div to variable
			let pagination = document.getElementById("pagination");

			// Create a previous link if it is not the first page
			if (currentPage != 1) {
				let previous = document.createElement("a");
				previous.setAttribute(`href`, `?page=${parseInt(currentPage) - 1}`);
				previous.innerHTML = "Previous Page";
				pagination.appendChild(previous);
			}

			// Create an element for each page and add it to pagination
			for (let i = 1; i <= PageNumber; i++) {
				let listedPage;
				if (i == currentPage) {
					// If it's the current page, create a span element to contain page number
					listedPage = document.createElement("span");
					listedPage.innerHTML = i;
				} else {
					// Otherwise, create a link to the page number
					listedPage = document.createElement("a");
					listedPage.setAttribute(`href`, `?page=${i}`);
					listedPage.innerHTML = i;
				}
				pagination.appendChild(listedPage);
			}

			// Create a next link if it is not the last page
			if (currentPage != PageNumber) {
				let previous = document.createElement("a");
				previous.setAttribute(`href`, `?page=${parseInt(currentPage) + 1}`);
				previous.innerHTML = "Next Page";
				pagination.appendChild(previous);
			}
		};
	}
})();
