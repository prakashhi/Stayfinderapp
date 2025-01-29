<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home page</title>
  <link rel="stylesheet" href="CSS/homepage.css">
</head>


<body>
  <div class="content">


    <nav>
      <div class="log">
        <img src="Images/Stay Finder-logos.jpeg" alt="" width="40px" style="border-radius: 10px;">
        <b>Stay Finder</b>
      </div>
      <div class="m">
        <ul>
          <li>Home</li>
          <?php
          session_start();
          if (isset($_SESSION['name'])) {
            echo  "<li>" . $_SESSION['name'] . "</li>";
            echo  "<a href='Process/logout.php'><li>Log out</li></a>";
          } else {
            echo "<a href='login.php'><li>Log in</li></a>";
          }
          ?>
          <li>About us</li>
        </ul>
      </div>
    </nav>

    <div class="serchnav">
      <form action="">
        <span>Location</span>
        <input type="text">
        <button>Search</button>
      </form>
    </div>

    <div class="alldata">


      <?php
      include './Process/cnn.php';


      $d = mysqli_query($cnn, "select * from room_list");
      while ($dv = mysqli_fetch_array($d)) {

        $hid = $dv['Hotel_id'];
      $id = $dv['Room_id'];

        $data = mysqli_query($cnn, "select * from m_register where Hotel_id = '$hid' ");

        while ($ho = mysqli_fetch_array($data)) {
          $imgurl = $dv['Room_img1'];

          echo "<a href='./Customer_pages/carddata.php?id=$id'>
          <div class='con'>
            <img class='imgcon' src='./Hotel_img/$imgurl'>
            <div class='datcon'>
              <span class='h_name'>" . $ho['Hotel_Name'] . "</span>
              <span class='h_address'>" . $ho['Hotel_Address'] . "</span>
              <span class='h_price'>₹ " . $dv['Price'] . "</span>
            </div>
          </div>
        </a>";
        }
      }

      ?>

    </div>
  </div>

  </div>
</body>

</html>