<?php
include '../Process/cnn.php';
session_start();


if ($_POST) {

    $url = $_FILES['img1']['name'];
    $url1 = $_FILES['img2']['name'];
    $url2 = $_FILES['img3']['name'];

    $extension = pathinfo($url, PATHINFO_EXTENSION);
    $extension1 = pathinfo($url1, PATHINFO_EXTENSION);
    $extension2 = pathinfo($url2, PATHINFO_EXTENSION);

    $ui  = uniqid("Img", true) . '.' . $extension;
    $ui1  = uniqid("Img", true) . '.' . $extension1;
    $ui2  = uniqid("Img", true) . '.' . $extension2;

    $target = "../Hotel_img/" . basename($ui);
    $target1 = "../Hotel_img/" . basename($ui1);
    $target2 = "../Hotel_img/" . basename($ui2);

    move_uploaded_file($_FILES['img1']['tmp_name'], $target);
    move_uploaded_file($_FILES['img2']['tmp_name'], $target1);
    move_uploaded_file($_FILES['img3']['tmp_name'], $target2);




    $t = $_POST['type'];
    $a = $_POST['ac/noac'];
    $r = $_POST['rent'];
    $c = $_POST['capacity'];
    $i1 = $_POST['img1'];
    $hid =  $_SESSION['h_id'];




    $u = uniqid("R", true);
    mysqli_query($cnn, "INSERT INTO room_list VALUES ('$u','$hid','$t','$a','$r','$c','Open','$ui','$ui1','$ui2') ");

    header("location:../merchant_dash.php");
}
?>