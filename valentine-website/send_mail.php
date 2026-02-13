<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';                       //gmail SMTP server set to send through
    $mail->SMTPAuth   = true;
    $mail->Username   = 'prospersomto67@gmail.com';                     //SMTP username
    $mail->Password   = 'Amaechi233';                               //SMTP password (your gmail password or app password)
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;

    //Recipients
    $mail->setFrom('prospersomto67@gmail.com', 'Mailer');         //Set the sender of the message
    
    if (isset($_POST['email']) && isset($_POST['name'])) {
        $email = $_POST['email'];
        $name = $_POST['name'];
        $mail->addAddress($email, $name);     //Add a recipient
    } else {
        // Fallback or error if accessed directly without POST data
        // For now, let's just use a placeholder or return error
        echo 'No recipient specified';
        exit;
    }

    //Content
    $mail->isHTML(true);
    $mail->Subject = 'I Love You';
    $mail->Body    = 'Happy Valentine Day My Love. I love you so much. You are the best thing that has ever happened to me ❤';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
