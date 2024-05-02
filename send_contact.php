<?php

include('./PHPMailer/src/PHPMailer.php');
include('./PHPMailer/src/SMTP.php');
include('./PHPMailer/src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Create a new PHPMailer instance
$mail = new PHPMailer(true);

try {
    // SMTP configuration
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'YOUR EMAIL';
    $mail->Password = 'YOUR CODE';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Sender and recipient details 
    $mail->setFrom('YOUR EMAIL', 'YOUR NAME');
    $mail->addAddress($email, $name);
    $mail->addReplyTo($email, $name);
    

    // Email subject and body
    $mail->Subject = "Contact";
    $mail->Body = $message;
    if (!empty($_FILES['attachment']['name'])) {
        $attachment = $_FILES['attachment'];
        $attachmentName = $attachment['name'];
        $attachmentPath = $attachment['tmp_name'];
      
        $mail->addAttachment($attachmentPath, $attachmentName);
    }

    // Send email
    $mail->send();
    header("location:index.php");
    exit();
} catch (Exception $e) {
    echo 'Email failed to send. Error message: ' . $mail->ErrorInfo;
}
?>
