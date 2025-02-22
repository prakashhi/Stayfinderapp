<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Register Page</title>
    <link rel="stylesheet" href="CSS/style_m.css">
</head>

<body>
    <div class="loginwraper">
        <form action="Process/hotel_rp.php" method="POST">
            <h2>Register</h2>
            <?php
                    if(isset($_GET['li']))
                    {
                       echo "<h5 style='color:red;text-align:left;'>Username Or Email already exists.</h5>";
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
                <input type="text" required name="m_name">
                <label>Username</label>
            </div>
            <div class="input-feild">
                <input type="email" required name="m_email">
                <label>Email</label>
            </div>
            
            <div class="input-feild">
                <input type="password"  id="pass" required min="6" max="10" name="m_pass">
                <label>Password</label>
            </div>
            <h4>Hotel details:</h4>
            <div class="input-feild">
                <input type="text" required name="h_name">
                <label>Hotel Name</label>
            </div>
            <div class="input-feild">
                <textarea name="h_address"  cols="30" rows="10" placeholder="Hotel Address" required></textarea>   
            </div>
            <div class="input-feild">
                <input type="number" required name="h_mobile" >
                <label>Hotel Mobile no</label>
            </div>
            <div class="input-feild">
                <input type="text" required name="h_bank">
                <label>Hotel Bank Name</label>
            </div>
            <div class="input-feild">
                <input type="number" required name="h_bno">
                <label>Hotel Bank Account No</label>
            </div>
            <div class="input-feild">
                <input type="text" required name="h_code">
                <label>Hotel IFSC Code</label>
            </div>
          
            <button type="submit" >Register</button>
        </form>
    </div>
</body>

</html>