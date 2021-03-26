<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello, World!</title>
</head>
<body>
    <?php 

    // strings
    $php = "Luigi"; // string
    echo "<h1>Hello from $php"; // use variables directly in strings
    echo "<br>";
    echo $php . " is Mario's brother"; // Concat strings

    // numbers
    echo "<br>";
    $value = 1000; // integer
    $bigValue = 1_000_000; // as of php 7.4 numbers can be written with underscores for readability
    $dec_value = 1000.10; // float/doubles
    echo "$value is of type " . gettype($value);
    echo "<br>";
    echo "$bigValue is of type " . gettype($bigValue);
    echo "<br>";
    echo "$dec_value is of type " . gettype($dec_value);
    echo "<br>";
    $value = "Good morning"; // don't do this, be consistent
    echo "Now $value is of type " . gettype($value);
    echo "<br>";
    echo "$value is of type integer (true/false) " . ((gettype($value) == "integer") ? "true" : "false"); // using terneary operator
    echo "<br>";

    // if statements
    $a = 10;
    $b = 20;
    if ($a > $b):
        echo $a." is greater than ".$b;
    elseif ($a == $b): // note the combination of the words.
        echo $a." equals ".$b;
    else:
        echo $a." is neither greater than or equal to ".$b;
    endif;

    echo "<br>";
    
    
    
    
    ?>
</body>
</html>