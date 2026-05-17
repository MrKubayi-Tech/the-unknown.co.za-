<?php

declare(strict_types=1);

function email_status(object $pdo, string $email){

    $query = "SELECT email_status FROM users WHERE email = :email;";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['email' => $email]);
    $status = $stmt->fetch(PDO::FETCH_COLUMN);
    $stmt = null;
    return $status;
}

function new_token(object $pdo,string $email, string $otp, string $token){
    $query = "UPDATE users SET token = :token, otp = :otp, email_status = :email_status WHERE email = :email;";
    $stmt = $pdo->prepare($query);
    $stmt->execute([
        'token' => $token,
        'otp' =>$otp,
        'email_status' => 'pending',
        'email' => $email
    ]);
    $stmt = null;
}