<?php
require '../Process/cnn.php';
require '../Customer_pages/email.php';

$idm = $_GET['idm'];


$dv = mysqli_query($cnn, "select * from m_register where Um_id = '$idm' ");
$d =  mysqli_fetch_array($dv);


$memail = $d['Email'];



$send = sendSMTPMail($memail, "Account Deleted", "Dear Merchant,\n\n"
    . "We are pleased to inform you that your account has been Deleted.\n\n"
    . "The [Stay Finder] Team");

if ($send) {
    $de = mysqli_query($cnn, "DELETE FROM `m_register` WHERE Um_id = '$idm'");

    if ($de) {
        header("location:../Admin_dash.php");
    }
}
?>