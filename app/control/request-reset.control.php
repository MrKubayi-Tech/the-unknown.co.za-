<?php
declare(strict_types=1);

function empty_fields(string $email){
    if(empty($email)){
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

function change_status(object $pdo,string $token, string $email){
    edit_status($pdo,$token, $email);
}

function fetch_username(object $pdo, string $email){
    $username = select_user($pdo, $email);
    return $username;
}