<?php
session_start();

if (!isset($_SESSION['mname'])) {
    header("location:../merchant_l.php");
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merchnat Add Room</title>
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
                    </i> Merchant dashboard
                </h1>
                <h2 class="uname">
                    <?php

                    if (isset($_SESSION['mname'])) {
                        echo   "<span>" . $_SESSION['mname'] . "</span>";
                        echo  "<a href='../Process/logout.php'>Log out</a>";
                    } else {
                        header("location:merchant_l.php");
                    }
                    ?>
                </h2>
            </div>
            <div class='hj'>
                <div class="card">
                    <h1>Add Room</h1>
                    <form method='POST' action='./add_process.php' enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="roomType">Room Type</label>
                            <select id="roomType" required name='type'>
                                <option value="" disabled selected>Select room type</option>
                                <option value="Standard Room">Standard Room</option>
                                <option value="Deluxe Room">Deluxe Room</option>
                                <option value="Suite">Suite</option>
                                <option value="Family Room">Family Room</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="acType">AC / Non AC</label>
                            <select id="acType" required name='ac/noac'>
                                <option value="" disabled selected>Select AC type</option>
                                <option value="AC">AC</option>
                                <option value="Non-Ac">Non AC</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="rent">Rent</label>
                            <input type="number" id="rent" placeholder="Enter rent amount" required name='rent'>
                        </div>

                        <div class="form-group">
                            <label for="capacity">Room Capacity</label>
                            <select id="capacity" required name='capacity'>
                                <option value="" disabled selected>Select capacity</option>
                                <option value="Single Room">Single Room(1 Guests)</option>
                                <option value="Twin Room">Twin Room(2 Guests)</option>
                                <option value="Triple Room">Triple Room(3 Guests)</option>
                                <option value="Quard Room">Quard Room(4 Guests)</option>
                                <option value="Family Room">Family Room(4-6 Guests)</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="roomImg">Main Img</label>
                            <input type="file" id="roomImg" accept="image/*" required name='img1'>
                            <label for="roomImg">Room Img1</label>
                            <input type="file" id="roomImg" accept="image/*" required name='img2'>
                            <label for="roomImg">Room Img2</label>
                            <input type="file" id="roomImg" accept="image/*" required name='img3'>
                        </div>


                        <button type="submit">Update Room</button>
                    </form>
                </div>
            </div>





        </div>
    </div>
    <script src="../JS/merchant_dash.js"></script>
</body>

</html>