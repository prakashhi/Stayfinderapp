<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin dashboard</title>
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
                <img src="./Images/close.svg" alt="" class="closebtn">
            </div>
            <div class="logo">
                <img src="Images/Stay Finder-logos.jpeg" alt="">
                <p><b>Stay finder</b></p>
            </div>
            <div class="menu">
                <a href="./Admin_merchant.php"><li>Customer List</li></a>
                <a href="./transaction.php"><li>Trasaction Data</li></a>
            </div>
        </div>

        <div class="right">
            <div class="navbar">
                <h1 class="name">
                    <img src="./Images/ham.svg" id="hambtn">
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
            
            $data = mysqli_query($cnn, "Select * from m_register");
            echo "<div class='table-container'>
                <h1>Merchant Table</h1>
                <table id='merchantTable'>
                    <thead>
                        <tr id='data2'>
                            <th>U_id</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Hotel_id</th>
                            <th>Hotel_Name</th>
                            <th>Hotel_Address</th>
                            <th>Hotel_Mobileno</th>
                            <th>Verify Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>";
            while ($d = mysqli_fetch_assoc($data)) {
                echo "<tr>
                    <td><span id='data'>U_id : </span>" . $d['Um_id'] . "</td>
                    <td><span id='data'>Username : </span>" . $d['Username'] . "</td>
                    <td><span id='data'>Email : </span>" . $d['Email'] . "</td>
                    <td><span id='data'>Hotel_id : </span>" . $d['Hotel_id'] . "</td>
                    <td><span id='data'>Hotel_Name : </span>" . $d['Hotel_Name'] . "</td>
                    <td><span id='data'>Hotel_Address : </span>" . $d['Hotel_Address'] . "</td>
                    <td><span id='data'>Hotel_Mobileno : </span>" . $d['Hotel_Mobileno'] . "</td>";
                $s = $d['Verify_status'];
                $i = $d['Um_id'];
                if ($s == "Not Verify") {
                    echo "<td><span id='data'>Verify_status: </span><a id='ver' href='./Process/verify.php?id=$i'>V-Now</a></td>";
                } else {
                    echo "<td><span id='data'>Verify_status: </span><a id='ver' href=''>Verified</a></td>";
                }
                echo"<td><span id='data'></span><a id='ver' href='./admin_p/delete_merchant.php?idm=$i'>Delete</a></td>";
                echo "</tr>";
            }
            echo "</tbody></table></div>";
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
    <script src="JS/merchant_dash.js"></script>
</body>

</html>