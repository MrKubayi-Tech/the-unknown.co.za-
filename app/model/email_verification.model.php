<?php

declare(strict_types=1);

function fetch_otp(object $pdo, string $token){
    $query = "SELECT otp FROM users WHERE token = :token;";
    $stmt = $pdo->prepare($query);
    $stmt->execute([
        'token' => $token
    ]);
    
    $otp = $stmt->fetch(PDO::FETCH_COLUMN);
    $stmt = null;
    return $otp;
}

function inset_otp(object $pdo , string $otp, string $token){
    $query = "UPDATE users SET otp = :otp WHERE token = :token;";
    $stmt = $pdo->prepare($query);
    $stmt->execute([
        'otp' => $otp,
        'token' => $token
    ]);
    $stmt = null;
}
