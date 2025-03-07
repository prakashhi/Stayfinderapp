<?php
session_start();
if (!isset($_SESSION['name'])) {
    header("location:./index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Dashboard</title>
    <link rel="stylesheet" href="CSS/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="CSS/table.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.css" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>


<body>
    


    <div class="right">
        <div class="navbar">
            <h1 class="name" class="h-div">

                <span class="n1">My Dashboard</span>
            </h1>
            <h2 class="uname">
                <?php

                if (isset($_SESSION['name'])) {
                    echo   "<span>" . $_SESSION['name'] . "</span>";
                    echo   "<span>" . $_SESSION['ucid'] . "</span>";
                }
                ?>
            </h2>
        </div>

        <div class="search">
            <input class="stc" type="text" id="searchInput" placeholder="Search...">
        </div>
        


        





        <?php
        include './Process/cnn.php';
        


        $cname = $_SESSION['name'];

        $cdata = mysqli_query($cnn, "select * from c_register where Username = '$cname'");

        $cd = mysqli_fetch_array($cdata);
        $cid = $cd['Uc_id'];


        $dv  = mysqli_query($cnn, "Select * from booking_list where Customer_id  ='$cid'");



        echo "<div class='table-container'>
                <h1>Booking Table</h1>
                    <table id='merchantTable'>
                        <thead>
                            <tr id ='data2'>
                                <th>Payment_id</th>
                                <th>Room_id</th>
                                <th>Hotel_Name</th>
                                <th>Numberof_Memeber</th>
                                <th>Checkin_Date</th>
                                <th>Checkout_Date</th>
                                <th>Amount</th>
                                <th>Booking Status</th>
                            </tr>
                        </thead>
                        <tbody>";

        while ($d = mysqli_fetch_assoc($dv)) {
            $id = $d['Room_id'];
            $hid = $d['Hotel_id'];


            $fg = mysqli_query($cnn, "select * from m_register where Hotel_id = '$hid'");
            $f = mysqli_fetch_array($fg);


            echo "
                    <tr>
                        <td><span id='data'>Payment_id :</span>" . $d['Payment_id'] . "</td>
                        <td><span id='data'>Room_id :</span>" . $d['Room_id'] . "</td>
                        <td><span id='data'>Hotel_Name :</span>" . $f['Hotel_Name'] . "</td>
                        <td><span id='data'>Numberof_Memeber :</span>" . $d['Numberof_Memeber'] . "</td>
                        <td><span id='data'>Checkin_Date :</span>" . $d['Checkin_Date'] . "</td>
                        <td><span id='data'>Checkout_Date :</span>" . $d['Checkout_Date'] . "</td>
                        <td><span id='data'>Amount:</span>" . $d['Amount'] . " ₹ </td>";
            $i = $d['Room_id'];

            if ($d['Status'] == "Canceled") {
                echo "<td><span id='data'>Booking Status :</span>" . $d['Status'] . "</td>";
            }
            else{
                
            echo "<td><span id='data'>Booking Status: </span><a id='ver' href='./Customer_pages/cancelbook.php?id=$i'>Cancel</a></td>
                    </tr>";
            }

        }
        echo "</tbody></table></div>";

        if (isset($_GET['id'])) {
            $rid = $_GET['id'];
            mysqli_query($cnn, "DELETE FROM `room_list` WHERE Room_id = '$rid' ");
            header("location:./merchant_dash.php");
        }


        ?>


    </div>
    </div>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script>
        $(document).ready(function() {
            // Initialize DataTable
            var table = $('#merchantTable').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                "pageLength": 10
            });

            // Custom search input
            $('#searchInput').on('keyup', function() {
                table.search(this.value).draw();
            });
        });
    </script>
    <script src="../JS/merchant_dash.js"></script>
</body>

</html>