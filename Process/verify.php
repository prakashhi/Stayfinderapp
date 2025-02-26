<?php

require '../Process/cnn.php';
include '../Customer_pages/email.php';

$id = $_GET['id'];
$dv = mysqli_query($cnn,"select * from m_register where Um_id = '$id' ");
$d =  mysqli_fetch_array($dv);

$memail = $d['Email'];
echo $memail;


$send = mysqli_query($cnn,"UPDATE m_register  SET Verify_status='Verified' WHERE Um_id = '$id' ");

 sendSMTPMail($memail,"Verification Account","Dear Merchant,\n\n"
. "We are pleased to inform you that your account has been successfully verified.\n\n"
. "You can now access all the features and benefits available to verified merchants on our platform.\n\n"
. "If you have any questions or need assistance, please feel free to reach out to us.\n\n"
. "Thank you for being a valued part of our community.\n\n"
. "Best regards,\n"
. "The [Stay Finder] Team");

if($send)
{
    header("location:../Admin_dash.php");
}


?>
