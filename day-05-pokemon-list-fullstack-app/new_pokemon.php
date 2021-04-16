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
    <label for="pokeId">Pokemon Number:</label>
<input type="number" name="pokeId" id="pokeId" required>
<label for="pokeName">Pokemon Name:</label>
<input type="text" name="pokeName" id="pokeName" required>
<label for="pokeType">Pokemon Type:</label>
<select name="pokeType" id="pokeType">
    <option value="">None</option>
<?php 

$pokeTypes = array('Normal', 'Fire', 'Water', 'Grass', 'Electric', 'Ice', 'Fighting', 'Poison', 'Ground', 'Flying', 'Psychic', 'Bug', 'Rock', 'Ghost', 'Dark', 'Dragon', 'Steel', 'Fairy');

foreach ($pokeTypes as $value) {
    echo '<option value=' . strtolower($value) . '>' . $value . '</option>';
}

?>

</select>
<button type="submit">Create</button>
</form>
<a href="/">Go back</a>
</body>
</html>