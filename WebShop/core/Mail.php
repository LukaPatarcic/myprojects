<?php

namespace App\Core;


use PHPMailer\PHPMailer\PHPMailer;

class Mail
{
    private $username;
    private $password;
    private $host;

    public function __construct($username = "lukaphptesting@gmail.com",$password = "nemavisepetica",$host = 'tls://smtp.gmail.com:587')
    {
        $this->username = $username;
        $this->password = $password;
        $this->host = $host;
    }

    public function sendMail($subject,$message,$fromEmail,$name)
    {
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPDebug = 2;
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        $mail->Host = $this->host;
        $mail->Port = 587;
        $mail->SMTPSecure = 'tls';
        $mail->SMTPAuth = true;
        $mail->Username = $this->username;
        $mail->Password = $this->password;
        $mail->setFrom($fromEmail, $name);
        $mail->addAddress('patarcic98@gmail.com');
        $mail->Subject = $subject;
        $mail->Body = $message;
        if (!$mail->send()) {
            return $mail->ErrorInfo;
        } else {
            return 'Email sent';
        }
    }
}