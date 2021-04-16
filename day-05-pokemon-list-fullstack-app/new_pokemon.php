<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a Pokemon</title>
</head>
<body>
<h1>Create a Pokemon</h1>
<form action="formatted_pokemon.php" method="POST">
<input type="text" name="pokeId" id="pokeId">
<input type="text" name="pokeName" id="pokeName">
<select name="pokeType" id="pokeType">
<?php 

$pokeTypes = array('Normal', 'Fire', 'Water', 'Grass', 'Electric', 'Ice', 'Fighting', 'Poison', 'Ground', 'Flying', 'Psychic', 'Bug', 'Rock', 'Ghost', 'Dark', 'Dragon', 'Steel', 'Fairy');

foreach ($pokeTypes as $value) {
    echo '<option value=' . strtolower($value) . '>' . $value . '</option>';
}

?>
<button type="submit">Create</button>

</select>
</form>
    
</body>
</html>