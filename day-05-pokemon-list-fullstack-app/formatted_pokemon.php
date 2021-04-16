<?php
// Helper function from https://gist.github.com/james2doyle/33794328675a6c88edd6
function json_response($code = 200, $message = null)
{
    // clear the old headers
    header_remove();
    // set the actual code
    http_response_code($code);
    // set the header to make sure cache is forced
    header("Cache-Control: no-transform,public,max-age=300,s-maxage=900");
    // treat this as json
    header('Content-Type: application/json');
    $status = array(
        200 => '200 OK',
        400 => '400 Bad Request',
        404 => 'Page Not Found',
        500 => '500 Internal Server Error',
    );
    // ok, validation error, or failure
    header('Status: ' . $status[$code]);
    // return the encoded json
    return json_encode(array(
        'status' => $code,
        'message' => $message,
    ));
}

$data = file_get_contents('data.json');

$formatted_data = json_decode($data, true);
$results = $formatted_data['results'];

// Initiate page from GET variable
$page = $_GET['page'];

if (isset($page) && $page > 0 && $page <= (ceil(count($results) / 50))) :
    // Creates a new array
    $formatted_results = array();

    // For each pokemon

    foreach ($results as $i => $value )
     {
        // $results[$i]['name'] = strtoupper($results[$i]['name']); Notice that this is illegal
        // Copy pokemon name set to uppercase to formatted results
        $formatted_results[$i]['name'] = strtoupper($value['name']);
        // Copy pokemon url to formatted results
        $formatted_results[$i]['url'] = $value['url'];
    }
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

elseif ($_SERVER['REQUEST_METHOD'] == 'POST') :

    if (!empty($_POST['pokeName']) && !empty($_POST['pokeId'])) {
        $pokeId = $_POST['pokeId'];
        $pokeName = strtolower($_POST['pokeName']);
        $pokeType = $_POST['pokeType'];
        
        $pokemonNames = array();
        foreach ($results as $i => $value ) {
            // Make an array of with all pokemon names
            $pokemonNames[$i] = ($value['name']);
        }

        // Check if pokeId and pokemonNames are unique
        if (!array_key_exists($pokeId, $results) && !in_array($pokeName, $pokemonNames)) {
            // Make a copy of results
            $new_data = $formatted_data;
            // Add new pokemon
            $new_data['results'][$pokeId]['name'] = $pokeName;
            // Instead of adding a new key/value pair I am adding type inside of url as the new pokemon will not have a url for this exercise
            $new_data['results'][$pokeId]['url'] = $pokeType;
            // Convert array to json format
            $json_new_data = json_encode($new_data); 

            echo json_response(200, 'Pokemon Added');
            
            // Create new JSON file
            $write_file_result = file_put_contents('data.json', $json_new_data);

        } else {
            // Inform user that it already exists
            echo json_response(500, 'Error saving new pokemon. Duplication found.');
        }
    } else {
        // Inform user that they aremissing some info
        echo json_response(400, 'Missing Info');
    };

// echo '<pre>';
// print_r($results);
// echo '</pre>';

else :
    echo json_response(404, 'Page not found!');
endif;

/******* Add new pokemon ********/
