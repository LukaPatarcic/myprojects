<?php

namespace App\Controllers;
use App\Core\ApiController;
use App\Core\Mail;
use PHPMailer\PHPMailer\PHPMailer;

class ApiContactController extends ApiController
{
    public function postContact()
    {
        $name = filter_input(INPUT_POST,'name',FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
        $subject = filter_input(INPUT_POST,'subject',FILTER_SANITIZE_STRING);
        $message = filter_input(INPUT_POST,'message',FILTER_SANITIZE_STRING);

        if(empty($name) or empty($email) or empty($subject) or empty($message)){
            return $this->set('message','Please fill in all the fields');
        }

        if(!$email){
            return $this->set('message','Email is not valid');
        }

        $mail = new Mail();
        $response = $mail->sendMail($subject,$message,$email,$name);
        $this->set('message',$response);




    }

}