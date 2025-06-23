<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader (created by composer, not included with PHPMailer)
require '../vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
   // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'vedantam.ayurveda.mailer@gmail.com';                     //SMTP username
    $mail->Password   = 'jpyw npiw zcyt zdkn';                               //SMTP password
    //$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`


    // $mail->Host       = 'sandbox.smtp.mailtrap.io';                     //Set the SMTP server to send through
    // $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    // $mail->Username   = '9c62938f9a0bf6';                     //SMTP username
    // $mail->Password   = '529f5b882dda69';                               //SMTP password
    // //$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    // $mail->Port       = 587;         
    
    

    
    //Recipients
    $mail->setFrom('vedantam.ayurveda.mailer@gmail.com', 'Mailer');
    $mail->addAddress('aacharya.manish7@gmail.com', 'Manish');     //Add a recipient
    //$mail->addAddress('sabhi8400@gmail.com');               //Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('sabhi8400@gmail.com');
   // $mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Contact Box query';
    $mail->Body    = '<table><tr><td>Name</td><td>'.$_POST['name'].'</td></tr>
                              <tr><td>Email</td><td>'.$_POST['email'].'</td></tr>
                              <tr><td>Message</td><td>'.$_POST['message'].'</td></tr>
                      </table>';
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>