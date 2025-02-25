<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $npass=$_POST['n_pass'];
    $cpass=$_POST['c_pass'];

    $lpass = strlen($npass);

    unset($_SESSION['errors']);

    if($npass !== $cpass)
    {
        // $no ="no";
        $_SESSION['errors']['password_mismatch'] = "Password and Confirm password do not match.";
    
    }
    elseif($lpass <= 6 || $lpass > 10)
    {
        $_SESSION['errors']['password_length'] = "Password must be between 6 and 10 characters.";
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
