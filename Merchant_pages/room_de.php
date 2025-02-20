<?php
include '../Process/cnn.php';

$id= $_GET['id'];

mysqli_query($cnn,"DELETE FROM `room_list` where Room_id ='$id' && Booking_status = 'Open'");

header("location:../merchant_dash.php");
?>

