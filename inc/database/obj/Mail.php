<?php

require_once "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class Mail extends DBTable{

    private $user;
    private $pass;

    public function __construct() {
        $config = json_decode(file_get_contents("conf/mail.json"));

        $this->user = $config->mail->user;
        $this->pass = $config->mail->pass;

    }

    function send_single_mail($destination) {

        //Create a new PHPMailer instance
        $mail = new PHPMailer;
        //Tell PHPMailer to use SMTP
        $mail->isSMTP();

        //Set the hostname of the mail server
        $mail->Host = 'smtp.gmail.com';

        //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
        $mail->Port = 587;
        //Set the encryption mechanism to use - STARTTLS or SMTPS
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        //Whether to use SMTP authentication
        $mail->SMTPAuth = true;

        //Username to use for SMTP authentication - use full email address for gmail
        $mail->Username = $this->user;
        //Password to use for SMTP authentication
        $mail->Password = $this->pass;
        //Set who the message is to be sent from
        $mail->setFrom('wah@scoutinghvg.nl', 'Waingoengahorde');
        //Set an alternative reply-to address
        $mail->addReplyTo('wah@scoutinghvg.nl', 'Waingoengahorde');
        //Set who the message is to be sent to
        $mail->addAddress($destination, $destination);
        //Set the subject line
        $mail->Subject = 'Test mail';

        $mail->Body = 'Joe joe';

        $mail->AltBody = 'Hier had een testmail moeten staan';
        //send the message, check for errors
        if (!$mail->send()) {
            echo 'Mailer Error: '. $mail->ErrorInfo;
        } else {
            echo 'Message sent!';
        }
    }
}