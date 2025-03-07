<?php
session_start();
require("../Process/cnn.php");

if (!isset($_SESSION['mname'])) {
    header("location:../merchant_l.php");
}

if ($_SERVER['REQUEST_METHOD']  == 'POST') {
    $hanme = $_POST['h_name'];
    $hemail = $_POST['hemail'];
    $h_address = $_POST['h_address'];
    $hmobile = $_POST['hmobile'];

    $len = strlen($hmobile);

    if ($len !== 10) {
        $_SESSION['error'] = "Mobile number must be exactly 10 digits.";
        header("location:./editprofile.php");
        exit();
    }
    else
    {
        $mname = $_SESSION['mname'];
        $f = mysqli_query($cnn,"UPDATE m_register SET `Email`='$hemail',`Hotel_Name`='$hanme',`Hotel_Address`='$h_address',`Hotel_Mobileno`='$hmobile' WHERE Username ='$mname' ");

        if($f)
        {
            header("location:../merchant_dash.php");
        }
        

    }



}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/payment.css">
    <script src="https://js.stripe.com/v3/"></script>
    <title>Edit Profile</title>
</head>

<body>

    <div class="form-container">
        <h2>Profile Details</h2>
        <form id="payment-form" action="../Merchant_pages/editprofile.php" method="POST">
            <?php

                if (isset($_SESSION['error'])) {
                    echo "<div style='color: red;text-align:left;'>" . $_SESSION['error'] . "</div>";
                    unset($_SESSION['error']); // Remove the message after displaying it
                }
            ?>

            <?php
            require("../Process/cnn.php");


            $uname = $_SESSION['mname'];

            $ud = mysqli_query($cnn, "select * from m_register where Username = '$uname'");
            $udata = mysqli_fetch_array($ud);


            echo '<div class="form-group">
            <label for="full-name">Merchant_ID : '.$udata['Um_id'].'</label>
            <label for="full-name">Hotel_Name</label>
            <input type="text" id="full-name" name="h_name" value="' . $udata['Hotel_Name'] . '" >
            </div>';
            echo '<div class="form-group">
            <label for="full-name">Email</label>
            <input type="email" id="full-name" name="hemail" value="' . $udata['Email'] . '" >
            </div>';
            echo '<div class="form-group">
            <label for="full-name">Hotel_Address</label>
            <textarea name="h_address"  cols="40" rows="5" placeholder="Hotel Address" value="" required>' . $udata['Hotel_Address'] . '</textarea>
            </div>';
            echo '<div class="form-group">
            <label for="full-name">Hotel_Mobileno</label>
            <input type="number" id="full-name" name="hmobile" value="' . $udata['Hotel_Mobileno'] . '" >
            </div>';




            ?>

            <input id="btns" type="submit" value="Update Now">


        </form>
    </div>



</body>

</html>