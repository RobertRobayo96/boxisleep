<?php
namespace App\Services;
use Illuminate\Support\Facades\Mail;
use App\Services\EmailService;
class EmailService
{

    public static function SEND_ADVICE(){
        $from = "robertsamuel.robayo@gmail.com";
        $html = "robertsamuel.robayo@gmail.com" . " <h1>Ha habido una nueva compra</h1>";
        $to = "robertsamuel.robayo@gmail.com";
        $subject = "Nueva Venta realizada";
        $file = null;
        EmailService::SEND_MAIL($from, $to, $html, $subject, $file);
    }

   

    public static function SEND_MAIL($from, $to, $html, $subject, $file = null){

        if($file == null){
            Mail::html($html, function($msg) use ($from, $to, $html, $subject) { 
                $msg->to([$to])->subject($subject); 
                $msg->from($from); 
            });
        }else{
            Mail::html($html, function($msg) use ($from, $to, $html, $subject, $file) { 
                $msg->to([$to])->subject($subject); 
                $msg->from($from);
                $msg->attachData(base64_decode($file['base64']), $file['filename'] /*, ['mime' => $file['filetype']]*/ );
            });
        }
        
    }
}