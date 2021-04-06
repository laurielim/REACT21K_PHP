<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poke Data</title>
</head>
<body>
    <?php
    // Get JSON file
    $json = file_get_contents('data.json');
    // Parse JSON
    $data = json_decode($json);
    // Retrieve Pokemons (results) from data
    $pokemons = $data -> results;

    // Count the number of elements inside the pokemons array
    $num_of_pokemons = count($pokemons);
    // Show  user how many pokemons are available
    echo 'Number of pokemons: ' . $num_of_pokemons . '<br>';

    // Split the array into chunks of 50 pokemons, set preserve_keys to true to retain index number
    $pokemon_chunks = array_chunk($pokemons, 50, true);
    // Count the number of elements inside the pokemon_chunks array
    $num_of_chunks = count($pokemon_chunks);
    // Show user how many groups of pokemon there is
    echo 'Number of groups: ' . $num_of_chunks . '<br>';
    ?>

    <form method = "GET">
    <label for="group-number">Pick a Pokemon Group</label>
    <input type="number" name="group-number" id="group-number">
    <input type = "submit" />
    </form>

    <?php

    // Loop through the list of all pokemons
    /* foreach($pokemons as $index=>$pokemon) {
        echo '<br>';
        // Display each pokemon with an index number
        echo $index;
        echo '. ';
        // Display the name
        echo $pokemon -> name;
        echo ', ';
        // Display the url
        echo $pokemon -> url;
    }; */
    
    // Check if user has submitted group-number
    if (isset($_GET['group-number'])):
        // Assign group-number to a variable
        $user_input = $_GET['group-number'];
        // If user submit a number 
        if ($user_input):
        // Loop through the list of pokemons
        foreach($pokemon_chunks[$user_input  - 1] as $index=>$pokemon) {
            echo '<br>';
            // Display each pokemon with an index number
            echo $index + 1;
            echo '. ';
            // Display the name
            echo $pokemon -> name;
            echo ', ';
            // Display the url
            echo $pokemon -> url;
        }; 
        endif;
    endif;

    // echo '<pre>';
    // print_r($pokemon_chunks);
    // echo '</pre>';

    ?>
    
</body>
</html>