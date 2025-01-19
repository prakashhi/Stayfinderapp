<!-- Customer register process 
File name:register_p.php -->
<?php

include 'cnn.php';
$tb="c_register";

$name = $_POST['r_name'];
$email = $_POST['r_email'];
$mobile = $_POST['r_mobile'];
$pass = $_POST['r_pass'];
$pass2 = password_hash($pass,PASSWORD_BCRYPT);
$u = uniqid("C",true);

$li = mysqli_query($cnn,"Select * from `{$tb}` where Username ='$name'");

$no = mysqli_num_rows($li);

    if($no == 1)
    {
        header("location:../register.php?li=no");
    }
    else
    {
        mysqli_query($cnn,"insert into `{$tb}` values('$u','$name','$email','$mobile','$pass2')");
        header("location:../login.php");
    }
    

?>  