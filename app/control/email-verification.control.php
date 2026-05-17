<?php

declare(strict_types=1);

function not_six_chars(string $otp){
    if(strlen($otp) != 6){
        return true;
    }else{
        return false;
    }
}

function not_nums(string $otp){
    if(!ctype_digit($otp)){
        return true;
    }else{
        return false;
    }
}

function incorrect_otp(object $pdo, string $otp, string $token){
    
    if(!verify($otp, fetch_otp($pdo, $token))){
        return true;
    }else {
        return false;
    }
}

function verify_email(object $pdo, $otp ){
    inset_otp($pdo ,$otp, $token);
}

function verify(string $otp, string $hash_otp){
    return password_verify($otp, $hash_otp);
}