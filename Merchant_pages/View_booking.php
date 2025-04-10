<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merchnat dashboard</title>
    <link rel="stylesheet" href="../CSS/index.css">
    <link rel="stylesheet" href="../CSS/table.css">
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

                <a href="../Merchant_pages/Addroom.php">
                    <li>
                        Add Room
                    </li>
                </a>
                <a href="../Merchant_pages/discount_room.php">
                    <li>
                        Discount_Room
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
                    session_start();
                    if (isset($_SESSION['mname'])) {
                        echo   "<a href='../Merchant_pages/editprofile.php'><span>" . $_SESSION['mname'] . "</span></a>";
                        $u = uniqid("Exp_M", true);
                        $_SESSION['expire_m'] = $u;
                        echo  "<a href='../Process/logout.php?merchant=$u'>Log out</a>";
                    }
                    ?>
                </h2>
            </div>

            <form method="POST">
                <div class="search">

                    <input class="stc" type="text" name="serch" placeholder="Search...">
                    <button class="scbtn" name="serchbtn">Search</button>

                </div>
            </form>


            <?php
            include '../Process/cnn.php';

            function serchdata()
            {

                include '../Process/cnn.php';

                $i = $_POST['serch'];

                $dv = mysqli_query($cnn, "Select * from booking_list where Payment_id LIKE '%$i%' OR Room_id LIKE '%$i%' OR Customer_id LIKE '%$i%' ");


                if (mysqli_num_rows($dv) ==  0) {
                    echo "<div class='table-container'>
                    <h1>Booking Table</h1>
                        <table>
                            <thead>
                                <tr>
                                    <th>Payment_id</th>
                                    <th>Room_id</th>
                                    <th>Customer_id</th>
                                    <th>Numberof_Memeber</th>
                                    <th>Checkin_Date</th>
                                    <th>Checkout_Date</th>
                                    <th></th>
                                </tr>
                                
                            </thead>
                            <tbody>
                                    <tr>
                                    <td>Not found</td>
                                    </tr>
                            </tbody>
                        </table>";
                } else {

                    echo "<div class='table-container'>
                    <h1>Booking Table</h1>
                        <table>
                            <thead>
                                <tr id ='data2'>
                                <th>Payment_id</th>
                                <th>Room_id</th>
                                <th>Customer_id</th>
                                <th>Customer_Name</th>
                                <th>Numberof_Memeber</th>
                                <th>Checkin_Date</th>
                                <th>Checkout_Date</th>
                                    <th></th>
                                </tr>
                            </thead>";

                    while ($d = mysqli_fetch_assoc($dv)) {
                        $id = $d['Room_id'];
                        echo "<tbody>
                        <tr>
                        <td><span id='data'>Payment_id :</span>" . $d['Payment_id'] . "</td>
                        <td><span id='data'>Room_id :</span>" . $d['Room_id'] . "</td>
                        <td><span id='data'>Customer_id :</span>" . $d['Customer_id'] . "</td>
                        <td><span id='data'>Customer_name :</span>" . $d['Customer_name'] . "</td>
                        <td><span id='data'>Numberof_Memeber :</span>" . $d['Numberof_Memeber'] . "</td>
                        <td><span id='data'>Checkin_Date :</span>" . $d['Checkin_Date'] . "</td>
                        <td><span id='data'>Checkout_Date :</span>" . $d['Checkout_Date'] . "</td>
                            <td><a href='Delete_book.php?id=$id' ><button class='delete-btn'>Delete</button></a></td>
                        </tr>
                    </tbody>";
                    }
                    echo "</table></div>";

                    if (isset($_GET['id'])) {
                        $rid = $_GET['id'];
                        mysqli_query($cnn, "DELETE FROM `room_list` WHERE Room_id = '$rid' ");
                        header("location:./merchant_dash.php");
                    }
                }
            }


            if (array_key_exists('serchbtn', $_POST)) {
                serchdata();
            } else {

                $h = $_SESSION['h_id'];

                $dv  = mysqli_query($cnn, "Select * from  booking_list where Hotel_id ='$h'");

                echo "<div class='table-container'>
                <h1>Booking Table</h1>
                    <table>
                        <thead>
                            <tr id ='data2'>
                                <th>Payment_id</th>
                                <th>Room_id</th>
                                <th>Customer_id</th>
                                <th>Customer_Name</th>
                                <th>Numberof_Memeber</th>
                                <th>Checkin_Date</th>
                                <th>Checkout_Date</th>
                                <th></th>
                            </tr>
                        </thead>";

                while ($d = mysqli_fetch_assoc($dv)) {
                    $id = $d['Room_id'];
                    echo "<tbody>
                    <tr>
                        <td><span id='data'>Payment_id :</span>" . $d['Payment_id'] . "</td>
                        <td><span id='data'>Room_id :</span>" . $d['Room_id'] . "</td>
                        <td><span id='data'>Customer_id :</span>" . $d['Customer_id'] . "</td>
                        <td><span id='data'>Customer_name :</span>" . $d['Customer_name'] . "</td>
                        <td><span id='data'>Numberof_Memeber :</span>" . $d['Numberof_Memeber'] . "</td>
                        <td><span id='data'>Checkin_Date :</span>" . $d['Checkin_Date'] . "</td>
                        <td><span id='data'>Checkout_Date :</span>" . $d['Checkout_Date'] . "</td>
                        <td><a href='Delete_book.php?id=$id' ><button class='delete-btn'>Delete</button></a></td>
                    </tr>
                </tbody>";
                }
                echo "</table></div>";

                if (isset($_GET['id'])) {
                    $rid = $_GET['id'];
                    mysqli_query($cnn, "DELETE FROM `room_list` WHERE Room_id = '$rid' ");
                    header("location:./merchant_dash.php");
                }
            }















            ?>






        </div>
    </div>
    <script src="../JS/merchant_dash.js"></script>
</body>

</html>