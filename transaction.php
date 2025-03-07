<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer List</title>
    <link rel="stylesheet" href="CSS/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="CSS/table.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.css" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="left">
            <div class="close">
                <img src="./Images/close.svg" alt="" srcset="" class="closebtn">
            </div>

            <div class="logo">

                <img src="./Images/Stay Finder-logos.jpeg" alt="">
                <p><b>Stay finder</b>
                </p>
            </div>

            <div class="menu">

                <a href="./Admin_dash.php">
                    <li>
                        Merchant List
                    </li>
                </a>
                <a href="./Admin_merchant.php">
                    <li>
                        Customer List
                    </li>
                </a>


            </div>
        </div>

        <div class="right">
            <div class="navbar">
                <h1 class="name">
                    <img src="./Images/ham.svg" alt="" srcset="" id="hambtn">
                    <span>Dashboard</span>

                </h1>
                <h2 class="uname">
                    <?php
                    session_start();
                    if (isset($_SESSION['adminname'])) {
                        echo "<span>" . $_SESSION['adminname'] . "</span>";
                        $u = uniqid("Exp", true);
                        $_SESSION['expire'] = $u;
                        echo "<a href='Process/logout.php?admin=$u'>Log out</a>";
                    } else {
                        header("location:Admin.php");
                    }
                    ?>
                </h2>
            </div>


            <div class="search">
                <input class="stc" type="text" id="searchInput" placeholder="Search...">
            </div>


            <?php
            include './Process/cnn.php';

                $data  = mysqli_query($cnn, "Select * from booking_list");


                echo "<div class='table-container'>
                <h1>Transaction Table</h1>
                    <table id='merchantTable'>
                        <thead>
                            <tr id='data2'>
                            <th>Payment_id </th>
                            <th>Hotel_id</th>
                            <th>Customer_id</th>
                            <th>Customer_name</th>
                            <th>Hotel_id</th>
                            <th>Numberof_Memeber</th>
                            <th>Checkin_Date</th>
                            <th>Checkout_Date</th>
                            <th>Amount</th>
                            <th>Transaction_Date</th>
                            </tr>
                        </thead><tbody>";

                while ($d = mysqli_fetch_assoc($data)) {
                    echo "
                    <tr>
                    <td><span id='data'>Payment_id :</span>" . $d['Payment_id'] . "</td>
                    <td><span id='data'>Hotel_id :</span>" . $d['Hotel_id'] . "</td>
                    <td><span id='data'>Customer_id :</span>" . $d['Customer_id'] . "</td>
                    <td><span id='data'>Customer_name :</span>" . $d['Customer_name'] . "</td>
                    <td><span id='data'>Hotel_id :</span>" . $d['Hotel_id'] . "</td>
                    <td><span id='data'>Numberof_Memeber :</span>" . $d['Numberof_Memeber'] . "</td>
                    <td><span id='data'>Checkin_Date :</span>" . $d['Checkin_Date'] . "</td>
                    <td><span id='data'>Checkout_Date :</span>" . $d['Checkout_Date'] . "</td>
                    <td><span id='data'>Amount :</span>" . $d['Amount'] . " ₹ </td>
                    <td><span id='data'>Transaction_Date :</span>" . $d['Transaction_Date'] . "</td>
                    </tr>";
                }
                echo " </tbody></table></div>";

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
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "pageLength": 10
            });

            // Custom search input
            $('#searchInput').on('keyup', function() {
                table.search(this.value).draw();
            });
        });
    </script>
    <script src="./JS/merchant_dash.js"></script>
</body>

</html>