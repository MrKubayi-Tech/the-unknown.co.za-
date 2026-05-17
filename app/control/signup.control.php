<?php
declare(strict_types=1);

function empty_fields(string $name,string $surname,string $email,string $pwd,string $confirm_pwd){
    if(empty($name) || empty($surname) || empty($email) || empty($pwd) || empty($confirm_pwd)){
        return true;
    }else{
        return false;
    }
}

function invalid_email(string $email){
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        return true;
    }else{
        return false;
    }
}

function email_taken(object $pdo, string $email){
    if(existing_email($pdo,$email)){
        return true;
    }else{
        return false;
    }
}

function pwd_not_match(string $pwd, string $confirm_pwd){
    if($pwd !== $confirm_pwd){
        return true;
    }else{
        return false;
    }
}

function new_user(object $pdo, string $name, string $surname, string $email, string $pwd,string $token, string $otp){
    add_user($pdo, $name, $surname, $email, hash_pass($pwd), $token, hash_pass($otp));
}

function hash_pass(string $pwd){
    $cost = [
        'option' => 12
    ];

    $pwd_hash = password_hash($pwd, PASSWORD_BCRYPT, $cost);
    return $pwd_hash;
}