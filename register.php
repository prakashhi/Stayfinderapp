<!-- Register for customer
File name:-register.php -->

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
                    if(isset($_GET['li']))
                    {
                       echo "<h5 style='color:red;'>username already exists.</h5>";
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
                <input type="text" name="r_mobile" required>
                <label>Mobile no</label>
            </div>
            <div class="input-feild">
                <input type="password" name="r_pass" required>
                <label>Password</label>
            </div>
          
            <button type="submit">Register</button>
           
        </form>
    </div>
</body>

</html>