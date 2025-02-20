<?php
include '../Process/cnn.php';

$id= $_GET['id'];

mysqli_query($cnn,"DELETE FROM `booking_list` where Room_id ='$id'");

mysqli_query($cnn,"update room_list set Booking_status = 'Open' where Room_id = '$id' ");

header("location:./View_booking.php");



?>

