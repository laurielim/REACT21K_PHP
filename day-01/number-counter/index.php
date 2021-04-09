<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>
      body {
        background-color: navy;
        color: blanchedalmond;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
      }
    </style>
    <title>PHP - Task 2</title>
  </head>
  <body>
    <h1>Practice Exercise</h1>
    <ul>
      <li>Create a software that generate 1 random number between 0 - 100</li>
      <li>
        Create a software that will translate that number into text in FINNISH
      </li>
      <li>
        Example:
        <ul>
          <li>10 - ten, 11 - eleven, 12 - twelve</li>
          <li>25 - twenty five</li>
        </ul>
      </li>
    </ul>
    <section id="solution">
      <h2>Number Counter</h2>
      <?php
      // Generate 1 random number between 0 - 100
      $randomNum = rand(0,100);

      // Show user the number
      echo "<p>The random number is $randomNum, which in Finnish is ";

      // Create dictionary using constants
      define('ONE', 'yksi');
      define('TWO', 'kaksi');
      define('THREE', 'kolme');
      define('FOUR', 'neljä');
      define('FIVE', 'viisi');
      define('SIX', 'kuusi');
      define('SEVEN', 'seitsemän');
      define('EIGHT', 'kahdeksan');
      define('NINE', 'yhdeksän');

      // Split digits
      $firstDigit = $randomNum % 10;
      $secondDigit = ($randomNum - ($randomNum % 10)) / 10;

      // Assign strings to numbers
      switch ($firstDigit) {
        case 0:
            $firstDigitStr = "";
            break;
        case 1:
            $firstDigitStr = ONE;
            break;
        case 2:
            $firstDigitStr = TWO;
            break;
        case 3:
            $firstDigitStr = THREE;
            break;
        case 4:
            $firstDigitStr = FOUR;
            break;
        case 5:
            $firstDigitStr = FIVE;
            break;
        case 6:
            $firstDigitStr = SIX;
            break;
        case 7:
            $firstDigitStr = SEVEN;
            break;
        case 8:
            $firstDigitStr = EIGHT;
            break;
        case 9:
            $firstDigitStr = NINE;
            break;
      }

      if ($randomNum > 10) {
        switch ($secondDigit) {
            case 1:
                $secondDigitStr = ONE;
                break;
            case 2:
                $secondDigitStr = TWO;
                break;
            case 3:
                $secondDigitStr = THREE;
                break;
            case 4:
                $secondDigitStr = FOUR;
                break;
            case 5:
                $secondDigitStr = FIVE;
                break;
            case 6:
                $secondDigitStr = SIX;
                break;
            case 7:
                $secondDigitStr = SEVEN;
                break;
            case 8:
                $secondDigitStr = EIGHT;
                break;
            case 9:
                $secondDigitStr = NINE;
                break;
        }
      }

      // Show user the text form in Finnish
      if ($randomNum == 0) {
        echo "nolla";
      } elseif ($randomNum == 10) {
        echo "kymmenen";
      } elseif ($randomNum == 100) {
        echo "sata";
      } elseif ($randomNum < 10) {
        echo $firstDigitStr;
      } elseif ($randomNum < 20) {
        echo $firstDigitStr . "toista";
      } else {
        echo $secondDigitStr . "kymmentä" . $firstDigitStr . ".";
      }
      ?>
    </section>
  </body>
</html>
