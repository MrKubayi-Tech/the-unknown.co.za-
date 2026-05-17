<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . 'token.class.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
    require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'db.config.php';
    require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'request-reset.model.php';
    require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'control' . DIRECTORY_SEPARATOR . 'request-reset.control.php';
    require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . 'otp_mailer.class.php';

    
    if(!Tokens::verifyCSRFToken($_POST['csrf_token'])){
        echo '<script>alert("Submission was not from this website.");</script>';
        die('Invalid form');
    }
    
    $error = [];
    $email = $_POST['email'];
    if(empty_fields($email)){
        $error['empty_email'] = 'Email field is empty';
    }
    
    if(invalid_email($email)){
        $error['invalid_email'] = 'Email is invalid';
    }
    
    $database = new Database();
    $database->requestConnection();
    $pdo = $database->getConnection();
    
    if(!email_taken($pdo, $email)){
        $errors['email_not_found'] = 'Use email you registered with.';
    }
    
    if($error){
        $_SESSION['error'] = $error;
        die();
    }
    $token = Tokens::generateLinkToken();
    OtpMail::$option = 'reset';
    $username = fetch_username($pdo, $email);
    $link = 'password-reset?token=' . $token;
    OtpMail::setDetails($email, $username, $link, null);
    change_status($pdo,$token, $email);
    OtpMail::sendMail();
    unset($database);
    header('Refresh:1;url='. $link);
    
}else{
    
}
