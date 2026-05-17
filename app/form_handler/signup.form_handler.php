<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . 'token.class.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
    require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'db.config.php';
    require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'signup.model.php';
    require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'control' . DIRECTORY_SEPARATOR . 'signup.control.php';
    require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . 'otp_mailer.class.php';

    
    if(!Tokens::verifyCSRFToken($_POST['csrf_token'])){
        echo '<script>alert("Submission was not from this website.");</script>';
        die('Invalid form');
    }
    
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $confirm_pwd = $_POST['confirm_pwd'];
    
    $errors = [];
    if(empty_fields($name, $surname, $email, $pwd, $confirm_pwd)){
        $errors['empty_fields'] = '** Please fill in all fields **';
        $errors['num_of_errors'] = 1;
    }
    
    if(invalid_email($email)){
        $errors['invalid_email'] = '<h4>enter a valid email';
        $errors['num_of_errors']++;
    }
    
    //verification required from the database.
    $database = new Database();
    $database->requestConnection();
    $pdo = $database->getConnection();
    
    if(email_taken($pdo, $email)){
        $errors['email_taken'] = 'Email already taken, use a different one or try loging in.';
        $errors['num_of_errors']++;
    }
    
    
    if(pwd_not_match($pwd, $confirm_pwd)){
        $errors['pwd_not_match'] = '<h4>Password do not match';
        $errors['num_of_errors']++;
    }
    
    if($errors){
        $user_data = [
            'name' => $name,
            'surname' => $surname,
            'email' => $email
        ];
        
        $_SESSION['user_data'] = $user_data;
        $_SESSION['errors'] = $errors;
        header('Refresh:1;url=signup-login');
        die();
    }
    $_SESSION['email']=[
        'user'=>$email
    ];
    
    OtpMail::$option = 'new';
    $otp = OtpMail::otp_generator();
    $token = Tokens::generateLinkToken();
    $link = 'email-verification?token=' . $token;
    OtpMail::setDetails($email, $username, $link, $otp);
    new_user($pdo, $name, $surname, $email, $pwd, $token, $otp);
    OtpMail::sendMail();
    unset($database);
    header('Refresh:1;url='. $link);
    
    
}else{
    header('Refresh:1;url=signup-login');
    die();
}


