<?php
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require('Exception.php');
require('PHPMailer.php');
require('SMTP.php');
 

 
$mail = new PHPMailer(true);

try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                       
    $mail->isSMTP();                                             
    $mail->Host       = 'smtp.gmail.com';                     
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'youremail@gmail.com';                     
    $mail->Password   = 'password';                                
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;             
    $mail->Port       = 465;                                    

    //Recipients
    $mail->setFrom('youremail@gmail.com', 'PHP Mailer Test');
    $mail->addAddress('youremail@gmail.com');      
   
    /*
    //Attachments
    $mail->addAttachment('/var/tmp/file.tar.gz');          
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');   
    */ 

    //Content
    $mail->isHTML(true);                                   
    $mail->Subject = 'PHP Mailer Test';
    $mail->Body    = 'This is simple mailer <b>in PHP!</b>';
    
    $mail->send();

    echo 'Message has been sent';

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
