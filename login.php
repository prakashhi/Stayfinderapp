<!-- Customer Login page
File name:-login.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Login Page</title>
    <link rel="stylesheet" href="CSS/style.css">

</head>

<body>
    <div class="loginwraper">
        <form action="Process\login_p.php" method="POST">
            <h2>Login</h2>
            <?php
            if (isset($_GET['login'])) {
                echo "<h5 style='color:red;'>Invalid username or password.</h5>";
            }

            ?>

            <div class="option">
                <span>Consumer</span>
                <input type="radio" name="op" id="con">
                <span>Merchant</span>
                <input type="radio" name="op" id="mer">
            </div>

            <div class="input-feild">

                <input type="text" name="l_name" required>
                <label>Username</label>
            </div>
            <div class="input-feild">
                <input type="password" name="l_pass" required>
                <label>Password</label>
            </div>

            <button type="submit">Log In</button>
            <div class="acc-opc">
                <p>Don't have an account ?<a href="register.php">Register</a></p>
            </div>
        </form>
    </div>
    <script src="JS/script.js"></script>
</body>

</html>