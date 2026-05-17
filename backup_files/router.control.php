<?php
declare (strict_types =1);

function token_invalid(object $pdo, string $token){
    if(email_status($pdo, $token) === false || email_status($pdo, $token) != 'pending'){
        return true;
    }else{
        return false;
    }
}

function email(object $pdo, string $token){
    $email = fetch_email($pdo, $token);
    return $email;
}