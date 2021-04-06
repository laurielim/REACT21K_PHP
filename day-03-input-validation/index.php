<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP content</title>
</head>
<body>
    
    <?php

        /**
         * Takes 1 argument, validate that it is a non empty string, and doesn’t have more than 25 characters
         *
         * @param string $name
         * @return bool
         */
        function validate_username($name) {
            // First checks that variable is a string, then that it is not an empty string and finally that it is not more that     25 char - less than 26 char
            if (is_string($name) && $name !== "" && strlen($name) < 26) {
                return 'true';
            } else {
                // Return false if not all conditions are met
                return 'false';
            }
            
        }
    
        echo '"TestUser@local" is a valid username: ' . validate_username("TestUser@local"); // true
        echo '<br>';
        echo '"b0b!" is a valid username: ' . validate_username("b0b!"); // true
        echo '<br>';
        echo 'Number 23 is a valid username: ' . validate_username(23); // false
        echo '<br>';
        echo '"asdgfdhkgssssddaafdkddaaaa", with ';
        echo strlen("asdgfdhkgssssddaafdkddaaaa");
        echo ' character  is a valid username: ' . validate_username("asdgfdhkgssssddaafdkddaaaa"); // false'
        echo '<br>';
        echo 'An empty string is a valid username: ' . validate_username(""); // false
        echo '<br>';
        echo 'A boolean is a valid username: ' . validate_username(true); // false
        echo '<br>';
        echo '<br>';
    

        function validate_weekday($day) {
            // TODO: Add solution code here
        }

        echo '0 is a valid weekday: ' . validate_weekday(0); // true
        echo '<br>';
        echo '6 is a valid weekday: ' . validate_weekday(6); // true
        echo '<br>';
        echo '100 is a valid weekday: ' . validate_weekday(100); // false
        echo '<br>';
        echo '-12 is a valid weekday: ' . validate_weekday(-12); // false
        echo '<br>';
        echo '4 is a valid weekday: ' . validate_weekday(4); // true
        echo '<br>';
        echo 'null is a valid weekday: ' . validate_weekday(null); // false
        echo '<br>';
        echo 'An empty string is a valid weekday: ' . validate_weekday(''); // false
        echo '<br>';
        echo 'An string is a valid weekday: ' . validate_weekday('5'); // false
        echo '<br>';

        function validate_widthdraw_amount($amount, $balance) {
            // TODO: Add solution code here
        }

        echo 'Able to withdraw 100 from an account of 1000 balance: ' . validate_widthdraw_amount(100, 1000); // true
        echo '<br>';
        echo 'Able to withdraw 1000 from an account of 1000 balance: ' . validate_widthdraw_amount(1000, 1000); // true
        echo '<br>';
        echo 'Able to withdraw -50 from an account of 1000 balance: ' . validate_widthdraw_amount(-50, 1000); // false
        echo '<br>';
        echo 'Able to withdraw 1500 from an account of 1000 balance: ' . validate_widthdraw_amount(1500, 1000); // false
        echo '<br>';
        echo 'Able to withdraw true from an account of true balance: ' . validate_widthdraw_amount(true, true); // false
        echo '<br>';
        echo 'Able to withdraw 0 from an account of negative 100 balance: ' . validate_widthdraw_amount(0, -100); // false
        echo '<br>';
        echo 'Able to withdraw null from an account of 0 balance: ' . validate_widthdraw_amount(null, 0); // false
        echo '<br>';

        function validate_school_email($email_addr) {
            // TODO: Add solution code here
        }

        echo 'test_student@bc.fi is a valid school email: ' . validate_school_email('test_student@bc.fi'); // true
        echo '<br>';
        echo 'test_student@bc.fi@bc.fi is a valid school email: ' . validate_school_email('test_student@bc.fi@bc.fi'); // false
        echo '<br>';
        echo 'bc.fi@bc.fi is a valid school email: ' . validate_school_email('bc.fi@bc.fi'); // true
        echo '<br>';
        echo 'test_student@gmail.com is a valid school email: ' . validate_school_email('test_student@gmail.fi'); // false
        echo '<br>';
        echo 'test_student#bc.fi is a valid school email: ' . validate_school_email('test_student#bc.fi'); // false
        echo '<br>';
        
    ?>
</body>
</html>