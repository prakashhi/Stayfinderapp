<?php
require '../Process/cnn.php';
require '../Customer_pages/email.php';

$cid =$_GET['c_id'];


$dv = mysqli_query($cnn, "select * from c_register where Uc_id  = '$cid' ");
$d =  mysqli_fetch_array($dv);

$memail = $d['Email'];

$send = sendSMTPMail($memail, "Account Deleted", "Dear ".$d['Username'].",\n\n"
    . "We are pleased to inform you that your account has been Deleted.\n\n"
    . "The [Stay Finder] Team");

if ($send) {
    $de = mysqli_query($cnn, "DELETE FROM `c_register` WHERE Uc_id = '$cid'");

    if ($de) {
        header("location:../Admin_dash.php");
    }
}





?>