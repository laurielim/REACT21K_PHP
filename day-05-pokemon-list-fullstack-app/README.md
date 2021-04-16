# Practice Exercise - Pokemon List

## Instructions

1. Download the code provided in Gist and store it as formatted_pokemon.php
   - https://gist.github.com/bch-fullstack/ddebce87fdca00206ca97ec63f2c1000
2. Within another PHP file in the same folder, make a fetch call in Javascript to formatted_pokemon.php to retrieve the formatted pokemon array
3. Improve your formatted_pokemon.php logic so that it allows page parameter
4. Chunk the array into chunks of 50 elements
5. Take the page parameter into consideration and only return the corresponding array upon
6. Update your front-end application so that it will be an application that lists 50 pokemons at a time, there should be a next and previous buttons that allow you to fetch the previous or next 50 pokemons, and also buttons with page numbers in order to fetch a specific group of 50 pokemons according to their index value.
7. Previous button should be disabled on the first page,and Next button should be disabledon the last page

# Practice Exercise - Create Pokemons

1. Create a new php file within your previous exercise folder, name it new_pokemon.php
2. Have a form with the following input fields: id, name, and type of pokemon as a dropdown
   selector with the following choices: https://bulbapedia.bulbagarden.net/wiki/Type
3. Upon submission of the form, a POST request with the form parameters is sent to the same
   previous PHP file that you developed during the previous exercise. Which will decide whether
   or not to add this new Pokemon to the list. A valid pokemon to the list should have a unique
   name and a unique id that don’t exist in the current array of pokemon.
4. In case the code decides not to save the pokemon, the JSON response should communicate
   about the reason for failing. Ex: { status: 500, message: ‘Error saving new pokemon. Duplication
   found’ } In case the code decides to save the pokemon, also communicate that with a status
   code of 200, and also overwrite the existing data.json with new content that contains the new
   pokemon.
5. Of course you are only replying with a JSON object with property of status of either 200 or 500
   but they aren’t HTTP Response Status code. If you wish to implement proper status code
   response, use the following code as reference
   https://gist.github.com/james2doyle/33794328675a6c88edd6
