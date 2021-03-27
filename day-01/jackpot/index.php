<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background-color: navy;
            color: gainsboro;
            font-family:Verdana, Geneva, Tahoma, sans-serif;
        }
    </style>
    <title>PHP - Task 1</title>

</head>
<body>
    <h1>Practice Exercise</h1>
    <ul>
        <li>Create a software that generate 5 random numbers of either 0 or 1</li>
        <li>Let the user knows which are the 5 random numbers that they have gotten</li>
        <li>If the user get all five 1s, congrat the user because he/she has won a jackpot prize.</li>
        <li>Also show them what has been the chance of winning the jackpot by performing a calculation of the winning probability (basically 1/2^5)</li>
        <li>If the user get all five 0s, congrat them anyway because it is as hard as winning the jackpot except he/she didn’t win anything</li>
    </ul>
    <section id="solution">
        <h2>Jackpot</h2>
        <p>Your numbers are:
            <?php
            // Generate 5 random numbers between 0 and 1
            $num1 = rand(0, 1);
            $num2 = rand(0, 1);
            $num3 = rand(0, 1);
            $num4 = rand(0, 1);
            $num5 = rand(0, 1);
            // Add numbers to html
            echo "$num1 $num2 $num3 $num4 $num5" . "\n";
            ?>
        </p>
        <?php
        // Check if all numbers are 1s
        if ($num1+$num2+$num3+$num4+$num5 == 5):
            // Congratulate user
        ?>
            <p>Congratulation! You Win the Jackpot!</p>
        <?php
        // Show user % of winning
            $pWin =  ((1/2)**5)*100;
            echo "<p>Chances of winning was $pWin%";
        // Check if all numbers are 0s
        elseif ($num1+$num2+$num3+$num4+$num5 == 0):
            // Also congratulate user
        ?>
            <p>Congrats, this was probabilistically low but you don't win anything.</p>
        <?php
        endif;
        ?>
    </section>
</body>
</html>