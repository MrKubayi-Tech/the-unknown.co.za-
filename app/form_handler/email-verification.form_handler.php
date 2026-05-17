<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . 'token.class.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
    require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'db.config.php';
    require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'email_verification.model.php';
    require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'control' . DIRECTORY_SEPARATOR . 'email-verification.control.php';
    
    if(!Tokens::verifyCSRFToken($_POST['csrf_token'])){
        echo '<script>alert("Submission was not from this website.");</script>';
        die('Invalid Request');
    }
    
    if(session_status()=== PHP_SESSION_NONE){
        require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR .'session.config.php';
    }
    
    $token = $_SESSION['token'];
    $otp = $_POST['email_verification'];
    
    $errors = [];
    if(not_six_chars($otp)){
        $errors['not_six_chars'] = 'otp should be 6 chracters long';
    }

    if(not_nums($otp)){
        $errors['not_nums'] = 'otp should contain numbers only';
    }
            
    $database = new Database();
    $database->requestConnection();
    $pdo = $database->getConnection();
    
    if(incorrect_otp($pdo, $otp, $token)){
        $errors['incorrect_otp'] = 'enter the otp sent to your email';
    }

    if($errors){
        $_SESSION['otp_errors'] = $errors;
        header("Refresh:1;url=email-verification?token=$token");
        die();
    }

    verify_email($pdo, $otp);
    unset($database);
    unset($_SESSION['token']);
    header('Refresh:1;url=login');
}else{
    header('Refresh:1;url=home');
    die();
}