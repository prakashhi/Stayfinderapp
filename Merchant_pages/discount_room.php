<?php
session_start();

if (!isset($_SESSION['mname'])) {
    header("location:../merchant_l.php");
}
if ($_SERVER['REQUEST_METHOD']  == 'POST')
{
    require '../Process/cnn.php';
    $dis =  $_POST['dis'];
    $rid = $_POST['ID'];

    $rdata = mysqli_query($cnn,"select * from discount_list where Room_id = '$rid'");
    $li = mysqli_num_rows($rdata);

    if($li == 0)
    {
        $u = uniqid("D", true);
        mysqli_query($cnn,"INSERT INTO `discount_list` VALUES ('$u','$rid','$dis')");
        header("location:./discount_room.php");
    }
    else{
        mysqli_query($cnn,"UPDATE `discount_list` SET `Percentage`='$dis' WHERE Room_id = '$rid' ");
        header("location:./discount_room.php");
    }
    

    



}



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Discount</title>
    <link rel="stylesheet" href="../CSS/index.css">
    <link rel="stylesheet" href="../CSS/table.css">
    <link rel="stylesheet" href="../CSS/merchant.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>


<body>
    <div class="container">
        <div class="left">
            <div class="close">
                <img src="../Images/close.svg" alt="" class="closebtn">
            </div>

            <div class="logo">

                <img src="../Images/Stay Finder-logos.jpeg" alt="">
                <p><b>Stay finder</b>
                </p>
            </div>

            <div class="menu">

                <a href="../merchant_dash.php">
                    <li>
                        Room List
                    </li>
                </a>
                <a href="./View_booking.php">
                    <li>
                        Booking List
                    </li>
                </a>
            </div>
        </div>


        <div class="right">
            <div class="navbar">
                <h1 class="name" class="h-div">
                    <img src="../Images/ham.svg" id="hambtn">
                    <span class="n1">Merchant Dashboard</span>
                </h1>
                <h2 class="uname">
                    <?php

                    if (isset($_SESSION['mname'])) {
                        echo   "<a href='../Merchant_pages/editprofile.php'><span>" . $_SESSION['mname'] . "</span></a>";
                        $u = uniqid("Exp_M", true);
                        $_SESSION['expire_m'] = $u;
                        echo  "<a href='../Process/logout.php?merchant=$u'>Log out</a>";
                    } else {
                        header("location:merchant_l.php");
                    }
                    ?>
                </h2>
            </div>
           
            <div class='hj'>
                <div class="card">
                    <h1>Room Discount</h1>
                    <form method='POST' action='./discount_room.php'>
                        <div class="form-group">
                            <label for="roomType">Room ID</label>
                            <select id="roomType" required name='ID'>
                                <option value="" disabled selected>Select Room ID</option>
                            <?php
                                require '../Process/cnn.php';

                                echo $hid= $_SESSION['h_id'];
                                $rdata = mysqli_query($cnn,"Select * from room_list where Hotel_id = '$hid'");
                                
                                while($rdatafetch  = mysqli_fetch_array($rdata))
                                {
                                    echo '<option value="'.$rdatafetch['Room_id'].'">'.$rdatafetch['Room_id'].'   Price: '. $rdatafetch['Price'] .' ₹</option>';
                                }

                                ?>
                                
                               
                            </select>
                        </div>

                        

                        <div class="form-group">
                            <label for="rent">Discount (%)</label>
                            <input type="number" id="rent" max = "100" required name='dis'>
                        </div>

                       


                        <button type="submit">Add</button>
                    </form>
                </div>
            </div>
          





        </div>
    </div>
    <script src="../JS/merchant_dash.js"></script>
</body>

</html>