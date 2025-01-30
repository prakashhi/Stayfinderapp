<?php
 session_start();
 if (!isset($_SESSION['name'])) {
 header("location:../login.php");

 }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../CSS/carddata.css">
    <title>Hotel information</title>
</head>
<body>
<?php
include '../Process/cnn.php';

$id = $_GET['id'];


$dv = mysqli_query($cnn, "Select * from room_list where Room_id = '$id' ");

$d = mysqli_fetch_array($dv);

$hid = $d['Hotel_id'];

$hdata = mysqli_query($cnn,"Select * from  m_register where Hotel_id = '$hid' ");

$hd = mysqli_fetch_array($hdata);

echo "<div class='hotel-container'>
<div class='hotel-card'>
    <div class='hotel-image'>
        <div class='price-tag'>From " . $d['Price'] . " ₹ /night</div>
    </div>
    
    <div class='hotel-content'>
        <span class='hotel-type'>".$d['Room_type']."</span>
        <h1 class='hotel-name'>".$hd['Hotel_Name']."</h1>
        
        <div class='info-item'>
            <i class='fas fa-map-marker-alt'></i>
            <p>".$hd['Hotel_Address']."</p>
        </div>
      
        <div class='amenities'>
            <div class='amenity-item'>
                <i class='fas fa-wifi'></i>
                <span>Free WiFi</span>
            </div>
            <div class='amenity-item'>
                <i class='fas fa-dumbbell'></i>
                <span>Gym</span>
            </div>
        </div>

        <div class='capacity-box'>
            <div class='capacity-item'>
                <span>ID</span>
                <span>".$id."</span>
            </div>
            <div class='capacity-item'>
                <span>Guests</span>
                <span>".$d['Room_capacity']."</span>
            </div>
            <div class='capacity-item'>
                <span>Type</span>
                <span>".$d['AC / NOAC']."</span>
            </div>
        </div>

        <button class='book-button'>
            <i class='fas fa-concierge-bell'></i>
            Reserve Now
        </button>
    </div>
</div>
</div>";


?> 
    
</body>
</html>