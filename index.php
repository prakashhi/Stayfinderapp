<?php
   error_reporting(E_ALL);
   ini_set("display_errors", 1);
?>
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
        <img src="Images/Stay Finder-logos.webp" alt="" width="40px" style="border-radius: 5px;">
        <b id='sty'>Stay Finder</b>
      </div>
      <div class="m">
        <ul>
          <?php
          session_start();
          if (isset($_SESSION['name'])) {
            echo  "<a href='./Mybooking.php'><li>" . $_SESSION['name'] . "</li></a>";
            $u = uniqid("Exp_c", true);
            $_SESSION['expire_c'] = $u;
            echo "<a href='Process/logout.php?customer=$u'>Log out</a>";
          } else {
            echo "<a href='login.php'><li>Log in</li></a>";
          }
          ?>

        </ul>
      </div>
    </nav>
    <div class="serchnav">
      <form action="./index.php" method="POST">
        <input type="text" placeholder="Search here...." name="location" required>
        <button name="serchbtn">Search</button>
      </form>
    </div>

    <div class="alldata">


      <?php


      include './Process/cnn.php';


      $d = mysqli_query($cnn, "select * from room_list where Booking_status = 'Open' ");
      while ($dv = mysqli_fetch_array($d)) {

        $hid = $dv['Hotel_id'];
        $id = $dv['Room_id'];

        if (!array_key_exists('serchbtn', $_POST)) {
          $data = mysqli_query($cnn, "select * from m_register where Hotel_id = '$hid' AND Verify_status ='Verified' ");

          while ($ho = mysqli_fetch_array($data)) {
            $imgurl = $dv['Room_img1'];


            $rdata = mysqli_query($cnn,"select * from discount_list where Room_id = '$id'");
            $li = mysqli_num_rows($rdata);
            if($li >=1)
            {
               $disdata = mysqli_fetch_array($rdata);
               $per = $dv['Price'] - ($dv['Price'] * $disdata['Percentage'])/100;
               echo "<a href='./Customer_pages/carddata.php?id=$id'>
               <div class='con'>
               <div class='image-container'>
             <img src='./Hotel_img/$imgurl' alt='Room Image'>
           </div>
                 <div class='datcon'>
                   <span class='h_name'>" . $ho['Hotel_Name'] . "</span>
                   <span class='h_address'>" . $ho['Hotel_Address'] . "</span>
                   <span class='Room_type'>" . $dv['Room_type'] . "</span>
                   <span class='h_price'>" . $dv['Room_capacity'] . "</span>
                   <span class='h_price' style='text-decoration:line-through;color:#757575;font-size:14px;'>₹ " . $dv['Price'] . "</span>
                   <span class='h_price' style='color:#757575;font-size:18px;'> " . $disdata['Percentage'] . " % Off</span>
                   <span class='h_price'>₹ " . $per . "</span>
                   
                   
                 </div>
               </div>
             </a>";


            }
            else{
              $per = " ";
              echo "<a href='./Customer_pages/carddata.php?id=$id'>
              <div class='con'>
              <div class='image-container'>
            <img src='./Hotel_img/$imgurl' alt='Room Image'>
          </div>
                <div class='datcon'>
                  <span class='h_name'>" . $ho['Hotel_Name'] . "</span>
                  <span class='h_address'>" . $ho['Hotel_Address'] . "</span>
                  <span class='Room_type'>" . $dv['Room_type'] . "</span>
                  <span class='h_price'>" . $dv['Room_capacity'] . "</span>
                  <span class='h_price' >₹ " . $dv['Price'] . "</span>
                  <span class='h_price' > " . $per . "</span>
                  
                </div>
              </div>
            </a>";

            }

            
           
          }
        }
      }




      if (array_key_exists('serchbtn', $_POST)) {

        $i = $_POST['location'];
        $new = mysqli_query($cnn, "SELECT * FROM  m_register WHERE Hotel_Name LIKE '%$i%' OR Hotel_Address LIKE '%$i%'");
        if (mysqli_num_rows($new) == 0) {

          echo "<h1>Not found</h1>";
        }
        while ($ho = mysqli_fetch_array($new)) {

          $hid = $ho['Hotel_id'];

          $d = mysqli_query($cnn, "select * from room_list where Hotel_id = '$hid' AND Booking_status = 'Open' ");


          while ($dv = mysqli_fetch_array($d)) {
            $imgurl = $dv['Room_img1'];
            $id = $dv['Room_id'];


            $rdata = mysqli_query($cnn,"select * from discount_list where Room_id = '$id'");
            $li = mysqli_num_rows($rdata);
            if($li >=1)
            {
               $disdata = mysqli_fetch_array($rdata);
               $per = $dv['Price'] - ($dv['Price'] * $disdata['Percentage'])/100;
               
               echo "<a href='./Customer_pages/carddata.php?id=$id'>
               <div class='con'>
               <div class='image-container'>
             <img src='./Hotel_img/$imgurl' alt='Room Image'>
           </div>
                 <div class='datcon'>
                   <span class='h_name'>" . $ho['Hotel_Name'] . "</span>
                   <span class='h_address'>" . $ho['Hotel_Address'] . "</span>
                   <span class='Room_type'>" . $dv['Room_type'] . "</span>
                   <span class='h_price'>" . $dv['Room_capacity'] . "</span>
                   <span class='h_price' style='text-decoration:line-through;color:#757575;font-size:14px;'>₹ " . $dv['Price'] . "</span>
                   <span class='h_price'>₹ " . $per . "</span>
                   
                 </div>
               </div>
             </a>";


            }
            else{
              $per = " ";
              echo "<a href='./Customer_pages/carddata.php?id=$id'>
              <div class='con'>
              <div class='image-container'>
            <img src='./Hotel_img/$imgurl' alt='Room Image'>
          </div>
                <div class='datcon'>
                  <span class='h_name'>" . $ho['Hotel_Name'] . "</span>
                  <span class='h_address'>" . $ho['Hotel_Address'] . "</span>
                  <span class='Room_type'>" . $dv['Room_type'] . "</span>
                  <span class='h_price'>" . $dv['Room_capacity'] . "</span>
                  <span class='h_price' >₹ " . $dv['Price'] . "</span>
                  <span class='h_price' > " . $per . "</span>
                  
                </div>
              </div>
            </a>";

            }
          }
        }
      }









      ?>

    </div>
  </div>
  
  


</body>

</html>