<?php
    $data = file_get_contents('data.json');

    // echo '<pre>';
    $formatted_data = json_decode($data, true);
    $results = $formatted_data['results'];
    $formatted_results = array();

    for ($i = 0; $i < count($results); $i++){
        // $results[$i]['name'] = strtoupper($results[$i]['name']); Notice that this is illegal 
        $formatted_results[$i]['name'] = strtoupper($results[$i]['name']);
        $formatted_results[$i]['url'] = $results[$i]['url'];
    }

    // print_r($formatted_data);
    // echo '</pre>';
    $page = $_GET['page'];
    $pageIndex = $page - 1;

    /* $json_formatted_results = json_encode(array($page));
    echo $page; */

    // Split the array into chunks of 50 pokemons, set preserve_keys to true to retain index number
    $pokemon_chunks = array_chunk($formatted_results, 50, true);
    // Count the number of elements inside the pokemon_chunks array
    $num_of_chunks = count($pokemon_chunks);

    $json_formatted_results = json_encode($pokemon_chunks[$pageIndex]);
    echo $json_formatted_results;

    /**
     * Create new JSON file
     */
    $write_file_result = file_put_contents('formatted_data.json', $json_formatted_results);
?>