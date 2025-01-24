<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer List</title>
    <link rel="stylesheet" href="./CSS/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./CSS/table.css">
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
                        echo   "<span>" . $_SESSION['adminname'] . "</span>";
                        echo  "<a href='Process/logout.php'>Log out</a>";
                    } else {
                        header("location:Admin.php");
                    }
                    ?>
                </h2>
            </div>


            <form method="POST">
                <div class="search">

                    <input class="stc" type="text" name="serch" placeholder="Search...">
                    <select name="type" id="opt">
                        <option value="Uc_id">Id</option>
                        <option value="Username">Username</option>
                        <option value="Email">Email</option>
                    </select>
                    <button class="scbtn" name="serchbtn">Search</button>

                </div>
            </form>


            <?php
            include './Process/cnn.php';

            function serchdata()
            {

                include './Process/cnn.php';

                $name = $_POST['type'];

                $i = $_POST['serch'];

                $dv = mysqli_query($cnn, "Select * from c_register where $name ='$i'");

                if (mysqli_num_rows($dv) ==  0) {
                    echo "<div class='table-container'>
                <h1>Merchnat Table</h1>
                    <table>
                        <thead>
                            <tr>
                                <th>U_id</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Mobile_no</th>
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
                <h1>Merchnat Table</h1>
                    <table>
                        <thead>
                            <tr>
                                <th>U_id</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Mobile_no</th>
                            </tr>
                        </thead>";

                    while ($d = mysqli_fetch_assoc($dv)) {
                        echo "<tbody>
                    <tr>
                        <td>" . $d['Uc_id'] . "</td>
                        <td>" . $d['Username'] . "</td>
                        <td>" . $d['Email'] . "</td>
                        <td>" . $d['Mobile_no'] . "</td>
                    </tr>
                </tbody>";
                    }
                    echo "</table></div>";
                }
            }

            if (array_key_exists('serchbtn', $_POST)) {

                serchdata();
            } else {


                $data  = mysqli_query($cnn, "Select * from  c_register");


                echo "<div class='table-container'>
                <h1>Customer Table</h1>
                    <table>
                        <thead>
                            <tr>
                                <th>U_id</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Mobile_no</th>
                            </tr>
                        </thead>";

                while ($d = mysqli_fetch_assoc($data)) {
                    echo "<tbody>
                    <tr>
                        <td>" . $d['Uc_id'] . "</td>
                        <td>" . $d['Username'] . "</td>
                        <td>" . $d['Email'] . "</td>
                        <td>" . $d['Mobile_no'] . "</td>
                    </tr>
                </tbody>";
                }
                echo "</table></div>";
            }







            ?>





        </div>

    </div>
    <script src="./JS/merchant_dash.js"></script>
</body>

</html>