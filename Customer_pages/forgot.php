<?php
include '../Process/cnn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    $dat = mysqli_query($cnn, "select * from c_register where Email = '$email' ");
    $li = mysqli_num_rows($dat);

    if ($li == 1) {
        $reset_code = rand(100000, 999999);
        session_start();
        $_SESSION['code'] = $reset_code;

        $df = sendSMTPMail($email,"Reset Passwod","Heloo User,\n This OTP for change Password:$reset_code");

        header("location:changepass.php");
    } else {
        $_SESSION['errors']['password_mismatch'] = "Email is not exits.";
    }
}






?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="../CSS/style.css">

</head>

<body>
    <div class="loginwraper">
        <form action="./forgot.php" method="POST">

        <h3>Reset Password</h3>

            <?php
            if (isset($_SESSION['errors'])) {
                foreach ($_SESSION['errors'] as $error) {
                    echo "<h5 style='color:red;text-align:left;'>$error</h5>";
                }
            }
            ?>

            <div class="input-feild">
                <input type="text" name="email" required>
                <label>Email</label>
            </div>


            <button type="submit">Send OTP</button>
        </form>
    </div>
    <script src="JS/script.js"></script>
</body>

</html>
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