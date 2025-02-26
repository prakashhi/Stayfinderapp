<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="./CSS/admin.css">

</head>

<body>
    <div class="loginwraper">
        <form action="./Process/Admin_p.php" method="POST">
            <h2>Admin Login</h2>
            <?php
            if (isset($_GET['login'])) {
                echo "<h5 style='color:red;'>Invalid username or password.</h5>";
            }

            ?>


            <div class="input-feild">

                <input type="text" name="l_name" required>
                <label>Username</label>
            </div>
            <div class="input-feild">
                <input type="password" name="l_pass" required>
                <label>Password</label>
            </div>

            <button type="submit">Log In</button>
           
        </form>
    </div>
</body>

</html>