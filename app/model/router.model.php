<?php
declare (strict_types =1);

function email_status(object $pdo, string $token){

    $query = "SELECT email_status FROM users WHERE token = :token;";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['token' => $token]);
    $status = $stmt->fetch(PDO::FETCH_COLUMN);
    $stmt = null;
    return $status;
}

function fetch_email(object $pdo, string $token){
    $query = "SELECT email FROM users WHERE token = :token;";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['token' => $token]);
    $email = $stmt->fetch(PDO::FETCH_COLUMN);
    $stmt = null;
    return $email;
}