<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <style>
    input, textarea, button {
        display: block;
    }
    </style>

</head>
<body>
    <form method="POST" action="//public.bc.fi/s2100139/php/contact-form/contact.php">
        <input type="text" name="username" id="username" placeholder="Enter your username">
        <input type="email" name="email" id="email">
        <textarea name="message" id="message" cols="30" rows="10" placeholder="Message here"></textarea>
        <button type="submit">Send email</button>
    </form>
</body>
</html>