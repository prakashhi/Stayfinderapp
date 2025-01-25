<!-- Merchant login 
File name:- loginmer_p.php -->
<?php
include 'cnn.php';

$tb = "m_register";

$name = $_POST['l_name'];
$pass = $_POST['l_pass'];

$li = mysqli_query($cnn, "Select * from `{$tb}` where Username ='$name'");
$r = mysqli_fetch_array($li);
$pass2 = $r['Password'];

$no = mysqli_num_rows($li);

if ($no == 1) {
    if (password_verify($pass, $pass2)) {
        session_start();
         $h = $r['Hotel_id'];

        $_SESSION['mname'] = $name;
        $_SESSION['h_id'] = $h;
        header("location:../merchant_dash.php");
    }
    else{
        header("location:../merchant_l.php?login=no");
    }
} else {
    header("location:../merchant_l.php?login=no");
}


?>