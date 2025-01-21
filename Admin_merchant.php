
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
                        <i class="fa-solid fa-house"></i>
                        Merchant list
                    </li>
                </a>
                <a href="#">
                    <li>
                        <i class="fa-solid fa-house"></i>
                        Customer list
                    </li>
                </a>


            </div>
        </div>

        <div class="right">
            <div class="navbar">
                <h1 class="name">
                     <img src="./Images/ham.svg" alt="" srcset="" id="hambtn">Admin dashboard
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

            <div class="hed">
                <h2>Customer list</h2>
            </div>
            
            <form method="POST">
                <div class="search">

                    <input class="stc" type="text" name="serch">
                    <select name="type" id="opt" >
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

                $name=$_POST['type'];

                $i= $_POST['serch'];

                $dv = mysqli_query($cnn,"Select * from c_register where $name ='$i'");

                if(mysqli_num_rows($dv) ==  0)
                {
                    echo "<div class='container23'>";
                    echo  "<div class='card'>";
                    echo "<p><strong></strong><span class='email'>Not Found</span></p>";
                    echo "</div>";
                }

                while ($d = mysqli_fetch_assoc($dv)) {

                    echo "<div class='container23'>";
                    echo  "<div class='card'>";
                    echo "<p><strong>U_id :</strong><span class='email'>" . $d['Uc_id'] . "</span></p>";
                    echo "<p><strong>Username :</strong>" . $d['Username'] . "</p>";
                    echo "<p><strong>Email :</strong><span class='address'>" . $d['Email'] . "</span></p>";
                    echo "<p><strong>Mobile_no :</strong><span>" . $d['Mobile_no'] . "</span></p>";
                    echo "</div>";
                }
               

            }
            if (array_key_exists('serchbtn', $_POST)) {

                serchdata();
            }
          
            else{
                  $data  = mysqli_query($cnn, "Select * from  c_register");

            while ($d = mysqli_fetch_assoc($data)) {

                echo "<div class='container23'>";
                echo  "<div class='card'>";
                echo "<p><strong>U_id :</strong><span class='email'>" . $d['Uc_id'] . "</span></p>";
                echo "<p><strong>Username :</strong>" . $d['Username'] . "</p>";
                echo "<p><strong>Email :</strong><span class='address'>" . $d['Email'] . "</span></p>";
                echo "<p><strong>Mobile_no  :</strong><span>" . $d['Mobile_no'] . "</span></p>";
                echo "</div>";
            }
            }







            ?>





        </div>

    </div>
    <script src="./JS/merchant_dash.js"></script>
</body>

</html>