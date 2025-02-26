<?php
require '../Process/cnn.php';

session_start();

if (!isset($_SESSION['code']) || time() > $_SESSION['code_expiry']) {
    // Reset the session code and expiry, and redirect to login page
    unset($_SESSION['code']);
    unset($_SESSION['code_expiry']);
    header("Location:../login.php"); // Redirect to login page
    exit();
}

unset($_SESSION['errors']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $npass = $_POST['n_pass'];
    $cpass = $_POST['c_pass'];

    $lpass = strlen($npass);

    if ($npass !== $cpass) {
        $_SESSION['errors']['password_mismatch'] = "Password and Confirm password do not match.";
    } elseif ($lpass <= 6 || $lpass > 10) {
        $_SESSION['errors']['password_length'] = "Password must be between 6 and 10 characters.";
    } else {

        $email = $_SESSION['email'];
        $pass2 = password_hash($npass, PASSWORD_BCRYPT);
        $d = mysqli_query($cnn, "UPDATE c_register SET Password = '$pass2' WHERE Email ='$email' ");
        if($d)
        {
            header("location:../login.php");
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Password Set</title>
    <link rel="stylesheet" href="../CSS/style.css">

</head>

<body>
    <div class="loginwraper">
        <form action="./newpass.php" method="POST">

            <h3>Reset Password</h3>

            <?php
            if (isset($_SESSION['errors'])) {
                foreach ($_SESSION['errors'] as $error) {
                    echo "<h5 style='color:red;text-align:left;'>$error</h5>";
                }
            }

            ?>

            <div class="input-feild">
                <input type="password" name="n_pass" required>
                <label>New Password</label>
            </div>

            <div class="input-feild">
                <input type="password" name="c_pass" required>
                <label>Confirm Password</label>
            </div>


            <button type="submit">Reset</button>
        </form>
    </div>
    <script src="JS/script.js"></script>
</body>

</html>