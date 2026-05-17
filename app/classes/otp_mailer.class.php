<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . DIRECTORY_SEPARATOR .'..'. DIRECTORY_SEPARATOR. '..' . DIRECTORY_SEPARATOR . 'phpmailer' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Exception.php';
require __DIR__ . DIRECTORY_SEPARATOR .'..'. DIRECTORY_SEPARATOR. '..' . DIRECTORY_SEPARATOR . 'phpmailer' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'PHPMailer.php';
require __DIR__ . DIRECTORY_SEPARATOR .'..'. DIRECTORY_SEPARATOR. '..' . DIRECTORY_SEPARATOR . 'phpmailer' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'SMTP.php';

class OtpMail{
    
    private static $userMail;
    private static $username;
    private static $link;
    private static $otp;
    public static $option;
    
    private static function prepareMail($xmlFile = __DIR__ . DIRECTORY_SEPARATOR .'..'. DIRECTORY_SEPARATOR. '..' . DIRECTORY_SEPARATOR . '.env'. DIRECTORY_SEPERATOR. 'mail.env.xml'){
        
        if(!file_exists($xmlFile)){
            die('Internal_error');
        }
        
        $xml = simplexml_load_file($xmlFile);
        $webMail = (string) $xml->webMail;
        $webPass = (string) $xml->webPass;
        $webName = (string) $xml->webName;
        
        $mail = new PHPMailer(true);
        try{
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = $webMail;
            $mail->Password = $webPass;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
            
            $mail->setFrom($webMail, $webName);
            $mail->addAddress(self::$userMail, self::$username);
            
            $mail->isHTML(true);
            $mail->Subject = 'Email-verification';
            if(self::$option === 'new'){
                $mail->Body = '<p>Hello' . self::$username . ', thank you for signing up in The <strong>Unknown Music</strong>, welcome to our society. Use OPT:' . self::$otp . ' to <a href='. self::$link .'>verify your email</a>.</p>';
                $mail->AltBody = 'Hello' . self::$username . ', thank you for signing up in The Unknown Music, welcome to our society. Use OPT:' . self::$otp . 'to verify your email. Use this link ('. self::$link . ') to go to the verification page.';
            }else if(self::$option === 'old'){
                $mail->Body = '<p>Hello' . self::$username . ', here is your new OPT:' . self::$otp . ' to <a href='. self::$link .'>verify your email</a>. This OTP expires in 24hrs.</p>';
                $mail->AltBody = 'Hello' . self::$username . ', here is your new OPT:' . self::$otp . 'to verify your email. Use this link ('. self::$link . ') to go to the verification page. This OTP expires in 24hrs.';
            }else{
                $mail->Body = '<p>Hello' . self::$username . ', use this link <a href='. self::$link .'>Password Reset</a>, to reset your password. This link expires in 24hrs.</p>';
                $mail->AltBody = 'Hello' . self::$username . ', Use this link ('. self::$link . ') to reset your password. This link expires in 24hrs.';
            }
            $mail->send();
        } catch (Exception $ex) {
            echo "mail not sent";
        }
    }
    
    public static function setDetails(string $userMail, string $username, string $link, string $otp){
        self::$userMail = $userMail;
        self::$username = $username;
        self::$link = $link;
        self::$otp = $otp;
    }
    
    public static function otp_generator(){
        $num = '01234567890123456789012345678901234567890123456789';
        $num = str_shuffle($num);
        $otp = substr($num, random_int(0, 40), 6);
        return $otp;
    }
    
    public static function sendMail(){
        self::prepareMail();
    }
}
