<?php
declare(strict_types=1);

function existing_email(object $pdo, string $email){
    $query = 'SELECT email FROM users WHERE email=:email;';
    $stmt = $pdo->prepare($query);
    $stmt->execute([
        'email' => $email
    ]);
    $results = $stmt->fetch(PDO::FETCH_COLUMN);
    $stmt = null;
    return $results;
}

function edit_status(object $pdo,string $token, string $email){
    $query = 'UPDATE users SET token = :token, email_status = :email_status WHERE email = :email;';
    $stmt = $pdo->prepare($query);
    $stmt->execute([
        'token' => $token,
        'email_status' => 'reset',
        'email' => $email
    ]);
    $stmt = null;
}

function select_user(object $pdo, string $email){
    $query = 'SELECT username FROM users WHERE email=:email;';
    $stmt = $pdo->prepare($query);
    $stmt->execute([
        'email' => $email
    ]);
    $results = $stmt->fetch(PDO::FETCH_COLUMN);
    $stmt = null;
    return $results;
}
