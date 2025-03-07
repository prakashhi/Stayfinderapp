<?php

    session_start();

    if(isset($_GET['admin']))
    {
        if($_GET['admin'] == $_SESSION['expire'])
        {
             unset($_SESSION['adminname']);
            unset($_SESSION['expire']);
            header("location:../Admin.php");
        }
            
    }
   elseif(isset($_GET['customer']))
    {
        if($_GET['customer'] == $_SESSION['expire'])
            
            unset($_SESSION['name']);
            unset($_SESSION['expire_c']);
            header("location:../login.php");
    }
   elseif(isset($_GET['merchant']))
    {
        if($_GET['merchant'] == $_SESSION['expire'])
            unset($_SESSION['mname']);
            unset($_SESSION['expire_m']);
            header("location:../merchant_l.php");
    }
    else{
        session_destroy();
    }


    
?>




