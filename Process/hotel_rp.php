<?php


include 'cnn.php';
$tb = "m_register";

$u = uniqid("M", true);
$name = $_POST['m_name'];
$email = $_POST['m_email'];
$pass = $_POST['m_pass'];
$pass2 = password_hash($pass, PASSWORD_BCRYPT);

$h = uniqid("H", true);
$hname = $_POST['h_name'];
$hadd = $_POST['h_address'];
$hmobile = $_POST['h_mobile'];
$hbank = $_POST['h_bank'];
$hbno = $_POST['h_bno'];
$hcode = $_POST['h_code'];



$li = mysqli_query($cnn, "Select * from `{$tb}` where Username ='$name' OR Email='$email'");

$no = mysqli_num_rows($li);

if ($no == 1) {
    header("location:../merchant_re.php?li=no");
} else {
    mysqli_query($cnn, "insert into `{$tb}` values('$u','$name','$email','$pass2','$h','$hname','$hadd','$hmobile','$hbank','$hbno','$hcode')");
    header("location:../merchant_l.php");
}


?>