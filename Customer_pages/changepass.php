<?php
session_start();

unset($_SESSION['errors']);

if (!isset($_SESSION['code']) || time() > $_SESSION['code_expiry']) {
    // Reset the session code and expiry, and redirect to login page
    unset($_SESSION['code']);
    unset($_SESSION['code_expiry']);
    header("Location:../login.php"); // Redirect to login page
    exit();
}

if(!isset($_SESSION['code']))
{
    header("location:./forgot.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $coder = $_SESSION['code'];
    $code = $_POST['code'];

    if($coder == $code)
    {
        header("location:./newpass.php");
    }
    else
    {
        $_SESSION['errors']['password_mismatch'] = "OTP is invalid";
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
        <form action="./changepass.php" method="POST">

        <h3>Reset Password</h3>
        <?php
            if (isset($_SESSION['errors'])) {
                foreach ($_SESSION['errors'] as $error) {
                    echo "<h5 style='color:red;text-align:left;'>$error</h5>";
                }
            }
            ?>
            <div class="input-feild">
                <input type="text" name="code" required>
                <label>Enter Code</label>
            </div>

            <button type="submit">Verify</button>
        </form>
    </div>
    <script src="JS/script.js"></script>
</body>

</html>