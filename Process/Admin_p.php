<?php

include 'cnn.php';

$tb="a_register";

$name=$_POST['l_name'];
$pass=$_POST['l_pass'];


$li = mysqli_query($cnn,"Select * from `{$tb}` where Username ='$name'");
$r = mysqli_fetch_array($li);
$pass2 = $r['Password'];

$no = mysqli_num_rows($li);

    if($no == 1)
    {
        if(password_verify($pass,$pass2))
        {           
            session_start();
            $_SESSION['adminname']=$name;
            header("location:../Admin_dash.php");
        }  
		else{
			header("location:../Admin.php?login=no");
			
		}
       
        
    }
    else    
    {
        header("location:../Admin.php?login=no");
    }
?>