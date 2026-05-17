<?php

declare(strict_types=1);

if(session_status() === PHP_SESSION_NONE){
    require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'session.config.php';
}

function signup_view(){
    if(isset($_SESSION['errors']) && $_SESSION['errors']['num_of_errors'] > 0){
        if(isset($_SESSION['errors']['empty_fields'])){
            return $_SESSION['errors']['empty_fields'];
        }
    }
}

function userInfor(string $input){
    if($input === 'name'){
        if(isset($_SESSION['user_data']['name'])){
            return '<input class="input" name="name" type="text" autocomplete="given-name" value="'. $_SESSION['user_data']['name'] .'" placeholder="name"><br>';
        }else{
            return '<input class="input" name="name" type="text" autocomplete="given-name" placeholder="name"><br>';
        }
    }else if($input === 'surname'){
        if(isset($_SESSION['user_data']['surname'])){
            return '<input class="input" name="surname" type="text" autocomplete="family-name" value="'. $_SESSION['user_data']['surname'] .'" placeholder="surname"><br>';
        }else{
            return '<input class="input" name="surname" type="text" autocomplete="family-name" placeholder="surname"><br>';
        }
    }else{
        if(isset($_SESSION['user_data']['email'])){
            return '<input class="input" name="email" type="email" autocomplete="email" value="'. $_SESSION['user_data']['email'] .'" placeholder="user@example.com"><br>';
        }else{
            return '<input class="input" name="email" type="email" autocomplete="email" placeholder="user@example.com"><br>';
        }
    }
}

function email_error(){
    if(isset($_SESSION['errors']) && (isset($_SESSION['errors']['invalid_email']) || isset($_SESSION['errors']['email_taken']))){
        return '&Tab;Use a different/valid email';
    }
}

function pwd_error(){
    if(isset($_SESSION['errors']) && isset($_SESSION['errors']['pwd_not_match'])){
        return '&Tab;Password should be longer than 8 characters';
    }
    
    unset($_SESSION['errors']);
    unset($_SESSION['user_data']);
}

