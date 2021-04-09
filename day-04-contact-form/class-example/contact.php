<?php
    header("Access-Control-Allow-Origin: *");
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';

    $message = 'Message from ' . $_POST['username'] . ': ' . $_POST['message']; 
    
    $sent_status = mail('s2100139@edu.bc.fi', 'Sent from test PHP app', $message);

    if ($sent_status): echo 'Your message has been sent';
    else: echo 'Oops! Something went wrong. Your message was not sent';
    endif;
?>