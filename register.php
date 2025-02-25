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
                       echo "<h5 style='color:red;text-align:left;'>Username already exists.</h5>";
                    }
                    if(isset($_GET['cpss']))
                    {
                       echo "<h5 style='color:red;text-align:left;'>Password and Confirm password do not match.</h5>";
                    }
                    if(isset($_GET['mo']))
                    {
                       echo "<h5 style='color:red;text-align:left;'>Mobile number must be exactly 10 digits.</h5>";
                    }
                    if(isset($_GET['po']))
                    {
                       echo "<h5 style='color:red;text-align:left;'>Password must be between 6 and 10 characters.</h5>";
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