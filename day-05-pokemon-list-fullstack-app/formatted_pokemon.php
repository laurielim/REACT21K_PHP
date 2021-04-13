<?php
    $data = file_get_contents('data.json');

    $formatted_data = json_decode($data, true);
    $results = $formatted_data['results'];
    // Creates a new array
    $formatted_results = array();
   
    // For each pokemon
    for ($i = 0; $i < count($results); $i++){
        // $results[$i]['name'] = strtoupper($results[$i]['name']); Notice that this is illegal 
        // Copy pokemon name set to uppercase to formatted results
        $formatted_results[$i]['name'] = strtoupper($results[$i]['name']);
        // Copy pokemon url to formatted results
        $formatted_results[$i]['url'] = $results[$i]['url'];
    }

    // Initiate page from GET variable
    $page = $_GET['page'];
    // Set pageIndex as index starts from 0 while page starts from 1;
    $pageIndex = $page - 1;

    // Split the array into chunks of 50 pokemons, set preserve_keys to true to retain index number
    $pokemon_chunks = array_chunk($formatted_results, 50, true);
    // Count the number of elements inside the pokemon_chunks array
    $num_of_chunks = count($pokemon_chunks);
    
    // Create array which includes number of pokemon chunks and the requested chunk
    $json = array($num_of_chunks, $pokemon_chunks[$pageIndex]);
    // Convert array to json format
    $json_formatted_results = json_encode($json);
    // Send out formatted json
    echo $json_formatted_results;

    /**
     * Create new JSON file
     */
    $write_file_result = file_put_contents('formatted_data.json', $json_formatted_results);
?>