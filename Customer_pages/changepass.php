<?php
session_start();
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
        header("location:newpass.php");
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
            if (isset($no)) {
                echo "<h5 style='color:red;text-align:left;'>Email is Not exits.</h5>";
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