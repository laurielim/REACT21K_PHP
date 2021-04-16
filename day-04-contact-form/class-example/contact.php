<?php
    header("Access-Control-Allow-Origin: *");
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';

    if (isset($_POST['name']) && isset($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {

    $to = 's2100139@edu.bc.fi';
    $subject = htmlspecialchars($_POST['username']) . 'with email' . htmlspecialchars($_POST['email']) . ' has sent an email';
    $message = 'Message from ' . $_POST['username'] . ': ' . $_POST['message']; 
    
    $sent_status = mail($to, $subject, $message);

    if ($sent_status): echo 'Your message has been sent';
    else: echo 'Oops! Something went wrong. Your message was not sent';
    endif;
}
?>