<?php
require '../Process/cnn.php';
include '../Customer_pages/email.php';

unset($_SESSION['errors']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    $dat = mysqli_query($cnn, "select * from m_register where Email = '$email' ");
    $li = mysqli_num_rows($dat);


    if ($li > 1) {
        $reset_code = rand(100000, 999999);
        session_start();
        $_SESSION['codem'] = $reset_code;
        $_SESSION['email'] = $email;

        // Store the current timestamp as expiration time (2 minutes from now)
        $_SESSION['code_expiry'] = time() + 120; // 120 seconds = 2 minutes

        $df = sendSMTPMail($email, "Reset Password", "Hello Merchant,\nThis OTP for changing your password: $reset_code");

        if ($df) {
            header("location:./changepass_m.php");
        }
    } else {
        $_SESSION['errors']['password_mismatch'] = "Email does not exist.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="../CSS/style_m.css">

</head>

<body>
    <div class="loginwraper">
        <form action="./forgot_m.php" method="POST">

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