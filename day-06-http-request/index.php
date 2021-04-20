<?php
    /**
     * GET /recipes
     * return all recipes
     * 
     * GET /recipes/{id}
     * return recipes with the specific id if found
     * 
     * POST /recipes
     * parameters must exist
     * if we have id, name, ingredients, difficulty
     * add a new recipe to our recipes array and save the json
     * 
     * PUT /recipes
     * parameters must exist
     * if we have id, name, ingredients, difficulty
     * find if there is a recipe with such id, if found, update
     * 
     * DELETE /recipes/{id}
     * delete recipe with the matching id if found
     * 
     */

    $json_data = file_get_contents('data.json');

    // Assign request method to a variable
    $request_method = $_SERVER['REQUEST_METHOD'];
    // Assign request uri to a variable
    $uri = $_SERVER['REQUEST_URI'];
    // Breaks down the uri into the path and query
    $parts = parse_url($uri);
    // Breaks down the query into an array of parameters
    parse_str($parts['query'], $params);
    // Breaks down the path into an array
    $exploded_parts = explode('/', $parts['path']);

   switch($request_method) {
        case 'GET':
            get_recipes();
            break;
        case 'POST':
            // add_new_recipe();
            break;
        case 'PUT':
            // update_recipe();
            break;
        case 'DELETE':
            // remove_recipe();
            break;
        default: 
            echo json_encode(array('message' => 'An error has occured'));
            break;
    }

    function get_recipes(){
        if (!isset($GLOBALS['exploded_parts'][2])) {
            echo $GLOBALS['json_data'];
        } else {
            $data = json_decode($GLOBALS['json_data'], true);
            $recipes = $data['recipes'];

            // Check that a recipe has been requested by id
            if (!empty($GLOBALS['exploded_parts'][2])) {

                $recipe = search_recipe_by_id($recipes, $GLOBALS['exploded_parts'][2]);
                echo json_encode($recipe);

            // Check that a search parameter was used
            } elseif (!empty($GLOBALS['params'])) {

                $params = $GLOBALS['params'];

                if(array_key_exists('id', $params)) {

                    $recipe = search_recipe_by_id($recipes, $params['id']);
                    echo json_encode($recipe);
                } else {
                    echo "todo";
                }
            }
            else {
                echo $GLOBALS['json_data'];
            }

            
        }
    }

    function search_recipe_by_id($recipe_array, $recipe_id){
        for ($i = 0; $i <= count($recipe_array); $i++) {
            if ($recipe_array[$i]['id'] == $recipe_id) {
                return $recipe_array[$i];
            }
        }
        return array('message' => 'Recipe not found');


    }
    // echo '<pre>';
    // print_r($_SERVER);
    // echo '</pre>';
?>