<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . 'token.class.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
    require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'db.config.php';
    require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . 'otp_mailer.class.php';
    require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'expired-otp.model.php';
    require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'control' . DIRECTORY_SEPARATOR . 'expired-otp.control.php';
    
    if(!Tokens::verifyCSRFToken($_POST['csrf_token'])){
        echo '<script>alert("Submission was not from this website.");</script>';
        die('Invalid Request');
    }
    
    $email = POST['new_link'];
    $token = Tokens::generateLinkToken();
    $database = new Database();
    $database->requestConnection();
    $pdo = $database->getConnection();
    
    $error = [];
    if(invalid_email($email)){
        $error['invalid_email'] = 'Enter a valid email';
    }else{
        if(status_verified($pdo, $email)){
            $error['email_active'] = 'email is already verified/does not exist';
        }
    }
    
    if($error){
        $_SESSION['email_error'] = $error;
    }
    
    OtpMail::$option = 'old';
    $otp = OtpMail::otp_generator();
    $token = Tokens::generateLinkToken();
    $link = 'email-verification?token=' . $token;
    $username = fetch_name($pdo, $email);
    OtpMail::setDetails($email, $username, $link, $otp);
    update_token($pdo, $email, $otp, $token);
    OtpMail::sendMail();
    unset($database);
    header('Refresh:1;url='. $link);
    
}else{
    header('Refresh:1;url=home');
    die();
}