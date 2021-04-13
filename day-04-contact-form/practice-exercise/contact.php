<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <title>Message Receipt</title>
</head>
<body>
    <div class="container">
<header>
      <h1><a href="/s2100139/">Laurie Lim Sam</a></h1>
      <nav>
        <ul>
          <li><a href="//laurielim.github.io">Portfolio</a></li>
          <li><a href="/s2100139/#contact">Contact</a></li>
        </ul>
      </nav>
    </header>
    <main>
    <h2>Thank you for using the contact form!</h2>
      <?php

    if(isset($_POST['url']) && $_POST['url'] == ''){

      $emailValidation = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);

      if ($emailValidation) {
        $message = 'Message from ' . htmlspecialchars($_POST['name']) . ': ' . htmlspecialchars($_POST['message']) . ' | Reply to : ' . htmlspecialchars($_POST['email']); 
        $sent_status = mail('s2100139@edu.bc.fi', 'Sent from bc.fi server contact form', $message);
      } 
      
    }else {
          $sent_status = false;
      }
      
        if ($sent_status): echo 'Your message has been sent :)';
        else: echo 'Oops! Something went wrong. Your message was not sent :(';
        endif;
      ?>
      <p><a href="/s2100139/">Go back to the Main Page</a></p>
    </main>
    <footer><p>Copyright 2021 | Laurie Lim Sam</p></footer>
    </div>
</body>
</html>