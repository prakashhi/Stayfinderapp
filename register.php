<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page </title>
   <link rel="stylesheet" href="CSS/style.css">
</head>

<body>
    <div class="loginwraper">
        <form action="Process\register_p.php" method="POST">
            
            <h2>Register</h2>
            <?php
            session_start(); 
                    if (isset($_SESSION['error'])) {
                        echo "<div style='color: red;text-align:left;'>" . $_SESSION['error'] . "</div>";
                        unset($_SESSION['error']); // Remove the message after displaying it
                    }
            ?>
            
            <div class="input-feild">
                <input type="text" name="r_name" required>
                <label>Username</label>
            </div>
            <div class="input-feild">
                <input type="email" name="r_email" required>
                <label>Email</label>
            </div>
            <div class="input-feild">
                <input type="number" name="r_mobile" required>
                <label>Mobile no</label>
            </div>
            <div class="input-feild">
                <input type="password" name="r_pass" required>
                <label>Password</label>
            </div>
            <div class="input-feild">
                <input type="password" name="c_pass" required>
                <label>Confirm Password</label>
            </div>
          
            <button type="submit">Register</button>
           
        </form>
    </div>
</body>

</html>