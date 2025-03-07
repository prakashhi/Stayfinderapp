<?php
include '../Process/cnn.php';

$id = $_GET['id'];


$d = mysqli_query($cnn, "select * FROM `room_list` where Room_id ='$id' && Booking_status = 'Open' OR Booking_status = 'Canceled' ");

$data = mysqli_fetch_array($d);


 $img1 = $data['Room_img1'];
 $img2 = $data['Room_img2'];
 $img3 = $data['Room_img3'];


$imagePath1 = "../Hotel_img/" . $img1;
$imagePath2 = "../Hotel_img/" . $img2;
$imagePath3 = "../Hotel_img/" . $img3;


if (file_exists($imagePath1) && file_exists($imagePath2) && file_exists($imagePath3)) {
    unlink($imagePath1);
    unlink($imagePath2);
    unlink($imagePath3);
}

$y = mysqli_query($cnn,"DELETE FROM `room_list` where Room_id ='$id' && Booking_status = 'Open' OR Booking_status = 'Canceled' ");

if($y)
{
    header("location:../merchant_dash.php");
}

?>

