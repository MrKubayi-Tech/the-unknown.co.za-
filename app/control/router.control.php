<?php
declare (strict_types =1);

function token_invalid(object $pdo, string $token){
    $status = email_status($pdo, $token);
    return $status;
}

function email(object $pdo, string $token){
    $email = fetch_email($pdo, $token);
    return $email;
}