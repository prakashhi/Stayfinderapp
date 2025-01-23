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

    <div class='con'>
      <div class='imgcon'>
        <img src='https://r1imghtlak.mmtcdn.com/eb83a2f46f9611e78f69025f77df004f.jpg?output-quality=75&downsize=243:162&output-format=jpg'>
      </div>
      <div class='datcon'>
        <span class='h_name'>The Fern Residency, Gandhinagar</span>
        <span class='h_address'>Sargaasan, Gandhinagar</span>
        <span class='h_price'>₹ 30,535</span>


      </div>


    </div>
    <div class='con'>
      <div class='imgcon'>
        <img src='https://r1imghtlak.mmtcdn.com/eb83a2f46f9611e78f69025f77df004f.jpg?output-quality=75&downsize=243:162&output-format=jpg'>
      </div>
      <div class='datcon'>
        <span class='h_name'>The Fern Residency, Gandhinagar</span>
        <span class='h_address'>Sargaasan, Gandhinagar</span>
        <span class='h_price'>₹ 30,535</span>


      </div>


    </div>


  </div>

  </div>
</body>

</html>