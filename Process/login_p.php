<?php

include 'cnn.php';

$tb="c_register";

$name=$_POST['l_name'];
$pass=$_POST['l_pass'];


$li = mysqli_query($cnn,"Select * from `{$tb}` where Username ='$name'");
$r = mysqli_fetch_array($li);
$pass2 = $r['Password'];


echo $pass2;


$no = mysqli_num_rows($li);

    if($no == 1)
    {
        if(password_verify($pass,$pass2))
        {           
            session_start();
            $_SESSION['name']=$name;
            $_SESSION['ucid']=$r['Uc_id'];
            header("location:../index.php");
        }  
        else
        {
            header("location:../login.php?login=no");
        }
       
    }
    else    
    {
        header("location:../login.php?login=no");
    }
?>