<?php

namespace App\Controllers;
use App\Core\ApiController;
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


        //Create a new PHPMailer instance
                $mail = new PHPMailer();
        //Tell PHPMailer to use SMTP
                $mail->isSMTP();
        //Enable SMTP debugging
        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
                $mail->SMTPDebug = 2;
        //Set the hostname of the mail server
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

                $mail->Host = 'tls://smtp.gmail.com:587';
        // use
        // $mail->Host = gethostbyname('smtp.gmail.com');
        // if your network does not support SMTP over IPv6
        //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
                $mail->Port = 587;
        //Set the encryption system to use - ssl (deprecated) or tls
                $mail->SMTPSecure = 'tls';
        //Whether to use SMTP authentication
                $mail->SMTPAuth = true;
        //Username to use for SMTP authentication - use full email address for gmail
                $mail->Username = "lukaphptesting@gmail.com";
        //Password to use for SMTP authentication
                $mail->Password = "nemavisepetica";
        //Set who the message is to be sent from
                $mail->setFrom($email, $name);
        //Set who the message is to be sent to
                $mail->addAddress('patarcic98@gmail.com');
        //Set the subject line
                $mail->Subject = $subject;
        //Read an HTML message body from an external file, convert referenced images to embedded,
                $mail->Body = $message;
        //send the message, check for errors
                if (!$mail->send()) {
                   $this->set('message',$mail->ErrorInfo);
                } else {
                    $this->set('message','sent');
                    //Section 2: IMAP
                    //Uncomment these to save your message in the 'Sent Mail' folder.
                    #if (save_mail($mail)) {
                    #    echo "Message saved!";
                    #}
                }




    }

}