<?php
namespace App\Services;
class CaptchaService
{
    public static function VALIDATE($recaptcha){
        $secret = "6LeiY8QUAAAAABUyHJD7m_q6ufvvvsYDgNQHWtpj";
        $url = 'https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$recaptcha;
        $p = file_get_contents($url, FILE_USE_INCLUDE_PATH);
        $res = json_decode($p, true);
        return $res['success'];
    }
}