<?php
function sendSMTPMail($to, $subject, $message) {

    require_once  '../PHPMailer-master/src/Exception.php';
    require_once  '../PHPMailer-master/src/PHPMailer.php';
    require_once  '../PHPMailer-master/src/SMTP.php';
    
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    
    try {
        // Set PHPMailer to use SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // Gmail SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'ecommerce3112003@gmail.com';  // Gmail email address (your email)
        $mail->Password = 'svut kclu snrd rqdb';  // Gmail email password or App password
        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;  // Gmail SMTP port

        // Sender information
        $mail->setFrom('your-email@gmail.com', 'StayFinderTeam');
        $mail->addReplyTo('noreply@gmail.com', 'StayFinderTeam');
        
        // Recipient
        $mail->addAddress($to);

        // Email content
        $mail->isHTML(false);  // Use plain text email format
        $mail->Subject = $subject;
        $mail->Body    = $message;

        // Send email
        if (!$mail->send()) {
            error_log("Mailer Error: " . $mail->ErrorInfo);
            return false;
        } else {
            return true;
        }
    } catch (Exception $e) {
        error_log("Mailer Error: " . $mail->ErrorInfo);
        return false;
    }
}
?>