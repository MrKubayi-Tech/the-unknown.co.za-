<?php
declare(strict_types=1);

function existing_email(object $pdo, string $email){
    $query = 'SELECT email FROM users WHERE email=:email;';
    $stmt = $pdo->prepare($query);
    $stmt->execute([
        'email' => $email
    ]);
    $results = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt = null;
    return $results;
}

function add_user(object $pdo, string $name, string $surname, string $email, string $hash_pass,string $token, string $otp){
    $query = 'INSERT INTO users (username,surname,email,pwd,token,otp) VALUES(:username,:surname,:email,:pwd, :token, :otp);';
    $stmt = $pdo->prepare($query);
    $stmt->execute([
        'username' => $name,
        'surname' => $surname,
        'email' => $email,
        'pwd' => $hash_pass,
        'token' => $token,
        'otp' =>$otp
    ]);
    $stmt = null;
}