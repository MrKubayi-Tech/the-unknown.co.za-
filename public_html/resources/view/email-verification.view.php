<?php
declare(strict_types=1);

if(session_status() === PHP_SESSION_NONE){
    require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'session.config.php';
}

function email_view(){
    $email = '';
    if(isset($_SESSION['token_email'])){
        $email = $_SESSION['token_email'];
    }
    unset($_SESSION['token_email']);
    return $email;
}

