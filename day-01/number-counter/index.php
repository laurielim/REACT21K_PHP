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

      // Create dictionary
      $one = "yksi";
      $two = "kaksi";
      $three = "kolme";
      $four = "neljä";
      $five = "viisi";
      $six = "kuusi";
      $seven = "seitsemän";
      $eight = "kahdeksan";
      $nine = "yhdeksän";

      // Split digits
      $firstDigit = $randomNum % 10;
      $secondDigit = ($randomNum - ($randomNum % 10)) / 10;

      // Assign strings to numbers
      switch ($firstDigit) {
        case 0:
            $firstDigitStr = "";
            break;
        case 1:
            $firstDigitStr = $one;
            break;
        case 2:
            $firstDigitStr = $two;
            break;
        case 3:
            $firstDigitStr = $three;
            break;
        case 4:
            $firstDigitStr = $four;
            break;
        case 5:
            $firstDigitStr = $five;
            break;
        case 6:
            $firstDigitStr = $six;
            break;
        case 7:
            $firstDigitStr = $seven;
            break;
        case 8:
            $firstDigitStr = $eight;
            break;
        case 9:
            $firstDigitStr = $nine;
            break;
      }

      if ($randomNum > 10) {
        switch ($secondDigit) {
            case 1:
                $secondDigitStr = $one;
                break;
            case 2:
                $secondDigitStr = $two;
                break;
            case 3:
                $secondDigitStr = $three;
                break;
            case 4:
                $secondDigitStr = $four;
                break;
            case 5:
                $secondDigitStr = $five;
                break;
            case 6:
                $secondDigitStr = $six;
                break;
            case 7:
                $secondDigitStr = $seven;
                break;
            case 8:
                $secondDigitStr = $eight;
                break;
            case 9:
                $secondDigitStr = $nine;
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
        echo $secondDigitStr . "kymmentä" . $firstDigitStr;
      }
      ?>
    </section>
  </body>
</html>
