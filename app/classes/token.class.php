<?php
declare(strict_types=1);

class Tokens{
    
    private static function generate(int $length = 32){
        return bin2hex(random_bytes($length));
    }
    
    public static function generateLinkToken(){
        return self::generate(32);
    }
    
    public static function generateCSRFToken(){
        if(session_status() === PHP_SESSION_NONE){
            require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'session.config.php';
        }
        
        $csrf_token = self::generate(32);
        $_SESSION['csrf_token'] = $csrf_token;
        return $csrf_token;
    }
    
    public static function verifyCSRFToken(string $csrf_token){
        if(session_status() === PHP_SESSION_NONE){
            require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'session.config.php';
        }
        
        if(hash_equals($_SESSION['csrf_token'], $csrf_token)){
            return true;
        }else{
            return false;
        }
    }
}