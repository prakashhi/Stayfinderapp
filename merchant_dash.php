<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merchnat Dashboard</title>
    <link rel="stylesheet" href="./CSS/index.css">
    <link rel="stylesheet" href="./CSS/table.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>


<body>
    <div class="container">
        <div class="left">
            <div class="close">
                <img src="./Images/close.svg" alt="" class="closebtn">
            </div>

            <div class="logo">

                <img src="Images/Stay Finder-logos.jpeg" alt="">
                <p><b>Stay finder</b>
                </p>
            </div>

            <div class="menu">

                <a href="./Merchant_pages/Addroom.php">
                    <li>
                        Add Room
                    </li>
                </a>
                <a href="./Merchant_pages/View_booking.php">
                    <li>
                        Booking List
                    </li>
                </a>
                <a href="./Merchant_pages/discount_room.php">
                    <li>
                        Discount_Room
                    </li>
                </a>
            </div>
        </div>


        <div class="right">
            <div class="navbar">
                <h1 class="name" class="h-div">
                    <img src="./Images/ham.svg" id="hambtn">
                   <span class="n1">Merchant Dashboard</span>
                </h1>
                <h2 class="uname">
                    <?php
                    session_start();
                    if (isset($_SESSION['mname'])) {
                        echo   "<a href='./Merchant_pages/editprofile.php'><span>" . $_SESSION['mname'] . "</span></a>";
                        $u = uniqid("Exp_M", true);
                        $_SESSION['expire_m'] = $u;
                        echo "<a href='Process/logout.php?merchant=$u'>Log out</a>";
    
                    } else {
                        header("location:merchant_l.php");
                    }
                    ?>
                </h2>
            </div>
           

            <?php
            include './Process/cnn.php';
         
            $h = $_SESSION['h_id'];

            $dv  = mysqli_query($cnn, "Select * from room_list where Hotel_id ='$h'");

            echo "<div class='table-container'>
            <h1>Room Table</h1>
                <table>
                    <thead>
                        <tr id ='data2'>
                            <th>Room_id</th>
                            <th>Room_type</th>
                            <th>AC / NO-AC</th>
                            <th>Price</th>
                            <th>Room_capacity</th>
                            <th>Booking_status</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>";

            while ($d = mysqli_fetch_assoc($dv)) {
                $id = $d['Room_id']; 

                $ddata = mysqli_query($cnn,"select * from  discount_list where Room_id = '$id' ");
                $li = mysqli_num_rows($ddata);
                if($li >=1)
                {
                    $discount = mysqli_fetch_array($ddata);

                }
                


                echo "<tbody>
                <tr>
                    <td><span id='data'>Room_id :</span>" . $d['Room_id'] . "</td>
                    <td><span id='data'>Room_type :</span>" . $d['Room_type'] . "</td>
                    <td><span id='data'>AC / NOAC :</span>" . $d['AC / NOAC'] . "</td>
                    <td><span id='data'>Price :</span>" . $d['Price'] . " ₹</td>
                    <td><span id='data'>Room_capacity :</span>" . $d['Room_capacity'] . "</td>
                    <td><span id='data'>Booking_status :</span>" . $d['Booking_status'] . "</td>";
                    $st = $d['Booking_status'];
                    if($st == "Booked" || $st == "Canceled")
                    {
                        echo "<td></td>";
                    }
                    else{
                        echo "<td><a href='./Merchant_pages/room_de.php?id=$id' ><button class='delete-btn'>Delete</button></a></td>";
                    }
                    
                    if($li>=1)
                    {
                        echo "<td><span id='data'>Room_Discount :</span>" . $discount['Percentage'] . " % Off</td>";
                    }
                    
                    
                "</tr>
            </tbody>";

            }
            echo "</table></div>";
            
                    if(isset($_GET['id']))
                    {
                        $rid = $_GET['id'];
                        mysqli_query($cnn,"DELETE FROM `room_list` WHERE Room_id = '$rid' ");
                        header("location:./merchant_dash.php");
                    }

            ?>
           


        


        </div>
    </div>
    <script src="JS/merchant_dash.js"></script>
</body>

</html>