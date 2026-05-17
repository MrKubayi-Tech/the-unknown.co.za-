<?php

declare(strict_types=1);

function invalid_email(string $email){
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        return true;
    }else{
        return false;
    }
}
function status_verified(object $pdo,string $email){
    $status = email_status($pdo, $email);
    if($status === 'verified' || $status === false){
        return true;
    }else{
        return false;
    }
}

function fetch_name(object $pdo, string $email){
    $query = 'SELECT username FROM users WHERE email = :email;';
    $stmt = $pdo->prepare($query);
    $stmt->execute(['email' => $email]);
    $results = $stmt->fetch(PDO::FETCH_COLUMN);
    return $results;
}

function update_token(object $pdo,string $email, string $otp, string $token){
    new_token($pdo, $email, hash_otp($otp), $token);
}

function hash_otp($otp){
    $cost = ['option' => 12];
    $otp_hash = password_hash($otp, PASSWORD_BCRYPT,$cost);
    return $otp_hash;
}