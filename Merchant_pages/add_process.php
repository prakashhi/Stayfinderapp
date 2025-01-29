<?php
include '../Process/cnn.php';
session_start();


if ($_POST) {

    $url = $_FILES['img1']['name'];

    $extension = pathinfo($url, PATHINFO_EXTENSION);

    $ui  = uniqid("Img", true) . '.' . $extension;

    echo $target = "../Hotel_img/" . basename($ui);
    move_uploaded_file($_FILES['img1']['tmp_name'], $target);




    $t = $_POST['type'];
    $a = $_POST['ac/noac'];
    $r = $_POST['rent'];
    $c = $_POST['capacity'];
    $i1 = $_POST['img1'];
    $hid =  $_SESSION['h_id'];




    $u = uniqid("R", true);
    mysqli_query($cnn, "INSERT INTO room_list VALUES ('$u','$hid','$t','$a','$r','$c','Open','$ui') ");

    header("location:../merchant_dash.php");
}
?>