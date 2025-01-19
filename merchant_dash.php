<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merchnat dashboard</title>
    <link rel="stylesheet" href="CSS/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container">
        <div class="left">
            <div class="close">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="closebtn"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                    <path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                </svg>
            </div>

            <div class="logo">

                <img src="Images/Stay Finder-logos.jpeg" alt="">
                <p><b>Stay finder</b>
                </p>
            </div>

            <div class="menu">
                <a href="#">
                    <li>
                        <i class="fa-solid fa-house"></i>
                    Merchant 
                </a>
                </li>
                <li>
                    <i class="fa-solid fa-circle-info"></i>
                   Customer
                </li>
              

            </div>
        </div>
        

        <div class="right">
            <div class="navbar">
                <h1 class="name" class="h-div">
                    <i class="fa-solid fa-bars" id="hambtn">
                    </i> Merchant dashboard
                </h1>
                <h2 class="uname">
                    <?php
                    session_start();
                    if (isset($_SESSION['mname'])) {
                        echo   "<span>" . $_SESSION['mname'] . "</span>";
                        echo  "<a href='Process/logout.php'>Log out</a>";
                    } else {
                        header("location:merchant_l.php");
                    }
                    ?>
                </h2>
            </div>


        </div>
    </div>
    <script src="JS/merchant_dash.js"></script>
</body>

</html>